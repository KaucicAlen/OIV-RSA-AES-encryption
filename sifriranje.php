
<form name="form" action="" method="post" enctype="multipart/form-data">
  <label for="">Naloži datoteko:</label> 
  <input type="file" name="targetFile" id="targetFile" value="">
  <br>
  <label for="publicKey">Naloži public key</label>
  <input type="file" name="publicKey" id="">
  <hr>
  <label for="">Izberi ključ</label> 
  <br>
  <input type="submit" name="256" value=" AES 256">
  <input type="submit" name="192" value=" AES 192">
  <input type="submit" name="128" value=" AES 128">
  <br>
  <input type="submit" name="rsaEnc" value="RSA encryption">
</form>


<?php

if(isset($_POST["128"])){

  $file = $_FILES["targetFile"];
  $code = file_get_contents($file["tmp_name"]);

  //Define cipher 
  $cipher = "aes-128-cbc";
  
  //Generate a 128-bit encryption key 
  $encryption_key = openssl_random_pseudo_bytes(16);
  $hexKey = bin2hex($encryption_key);
  echo "Encryption key: " . "<b>" . $hexKey . "</b>" ;

  // Generate an initialization vector 
  $iv_size = openssl_cipher_iv_length($cipher); 
  $iv = openssl_random_pseudo_bytes($iv_size);
  
  $iv = "ba6ca926e139b50d";

  //Data to encrypt 
  $data = $code;
  $encrypted_data = openssl_encrypt($data, $cipher, $hexKey, 0, $iv); 

  file_put_contents("uploads/sifriranaDatoteka.txt", $encrypted_data);
  echo "<br>";
  echo '<a href="uploads/sifriranaDatoteka.txt">Prenesi datoteko</a>';
  }

  if(isset($_POST["192"])){

    $file = $_FILES["targetFile"];
    $code = file_get_contents($file["tmp_name"]);
  
    //Define cipher 
    $cipher = "aes-192-cbc";
    
    //Generate a 192-bit encryption key 
    $encryption_key1 = openssl_random_pseudo_bytes(24);
    $hexKey1 = bin2hex($encryption_key1);
    echo "Encryption key: " . "<b>" . $hexKey1 . "</b>" ;
   
    // Generate an initialization vector 
    $iv_size = openssl_cipher_iv_length($cipher); 
    $iv = openssl_random_pseudo_bytes($iv_size);
    $iv = "ba6ca926e139b50d";
  
    //Data to encrypt 
    $data = $code;
    $encrypted_data = openssl_encrypt($data, $cipher, $hexKey1, 0, $iv); 
  
    file_put_contents("uploads/sifriranaDatoteka.txt", $encrypted_data);
    echo "<br>";
    echo '<a href="uploads/sifriranaDatoteka.txt">Prenesi datoteko</a>';
    }

    if(isset($_POST["256"])){

      $file = $_FILES["targetFile"];
      $code = file_get_contents($file["tmp_name"]);
    
      //Define cipher 
      
      $cipher = "aes-256-cbc";
      
      //Generate a 256-bit encryption key 
      $encryption_key1 = openssl_random_pseudo_bytes(32);
      $hexKey1 = bin2hex($encryption_key1);
      echo "Encryption key: " . "<b>" . $hexKey1 . "</b>" ;
    
      // Generate an initialization vector 
      $iv_size = openssl_cipher_iv_length($cipher); 
      $iv = openssl_random_pseudo_bytes($iv_size);
      $iv = "ba6ca926e139b50d";
    
      //Data to encrypt 
      $data = $code;
      $encrypted_data = openssl_encrypt($data, $cipher, $hexKey1, 0, $iv); 
    
      file_put_contents("uploads/sifriranaDatoteka.txt", $encrypted_data);
      echo "<br>";
      echo '<a href="uploads/sifriranaDatoteka.txt">Prenesi datoteko</a>';
      }


      if(isset($_POST["1024"])){
        
        
        $file = $_FILES["targetFile"];
        $code = file_get_contents($file["tmp_name"]);
        $stringToEncrypt = "Encrypted text here";

        $publicKey = file_get_contents("RSA_keys/1024_key/1024_public_key.txt");

        openssl_public_encrypt($code, $encrypted_data, $publicKey);
        echo $encrypted_data;
        echo "<br>";
        echo bin2hex($encrypted_data);

        file_put_contents("uploads/sifriranaDatoteka.txt", $encrypted_data);
        echo "<br>";
        echo '<a href="uploads/sifriranaDatoteka.txt">Prenesi datoteko</a>';
      }


      if(isset($_POST["2048"])){
        
        $file = $_FILES["targetFile"];
        $code = file_get_contents($file["tmp_name"]);
        $stringToEncrypt = "Encrypted text here";

        $publicKey = file_get_contents("RSA_keys/2048_key/2048_public_key.txt");

        openssl_public_encrypt($code, $encrypted_data, $publicKey);
        echo $encrypted_data;
        echo "<br>";
        echo bin2hex($encrypted_data);

        file_put_contents("uploads/sifriranaDatoteka.txt", $encrypted_data);
        echo "<br>";
        echo '<a href="uploads/sifriranaDatoteka.txt">Prenesi datoteko</a>';
      }


      if(isset($_POST["rsaEnc"])){
        
        $file = $_FILES["targetFile"];
        $publicKeyFile = $_FILES["publicKey"];

        $code = file_get_contents($file["tmp_name"]);
        $key = file_get_contents($publicKeyFile["tmp_name"]);
        //$stringToEncrypt = "Encrypted text here";

        $publicKey = file_get_contents("RSA_keys/2048_key/2048_public_key.txt");

        openssl_public_encrypt($code, $encrypted_data, $key);
        
        file_put_contents("uploads/sifriranaDatoteka.txt", $encrypted_data);
        echo "<br>";
        echo '<a href="uploads/sifriranaDatoteka.txt">Prenesi datoteko</a>';
      }
?>