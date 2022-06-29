<form name="form" action="" method="post" enctype="multipart/form-data">
Naloži datoteko:
  <input type="file" name="targetFile1" id="targetFile" value="">
  <hr>
  Naloži Ključ
  <br>
  <label for="key">AES Key</label>
  <br>
  <input type="text" name="key" id="">
  <br>
  <label for="targetFile2">RSA Private Key</label>
  <input type="file" name="targetFile2">
  <br>
  <input type="submit" name="decrypt" value="decrypt">  
</form>


<?php

//decryption with AES
if(isset($_POST["decrypt"])){

    $file = $_FILES["targetFile1"];
    $encrypted_data = file_get_contents($file["tmp_name"]);

    $key = $_POST["key"];
    $encryption_key = $key;
    $len = strlen($encryption_key);

    if($len == 0){
      
      $privateKeyFile = $_FILES["targetFile2"];
      $privateKey = file_get_contents($privateKeyFile["tmp_name"]);


      //$privateKey = file_get_contents("RSA_keys/1024_key/1024_private_key.txt");

      openssl_private_decrypt($encrypted_data, $decrypted_data, $privateKey);
      file_put_contents("decrypt/desifriranaDatoteka.txt", $decrypted_data);
      echo "<br>";
      echo '<a href="decrypt/desifriranaDatoteka.txt">Prenesi datoteko</a>';

    }

    if($len == 32){
      //Define cipher 
      $cipher = "aes-128-cbc";
      
      $iv_size = openssl_cipher_iv_length($cipher); 
      $iv = openssl_random_pseudo_bytes($iv_size);
      $iv = "ba6ca926e139b50d";

      //Decrypt data 
      $decrypted_data = openssl_decrypt($encrypted_data, $cipher, $encryption_key, 0, $iv); 

      file_put_contents("decrypt/desifriranaDatoteka.jpg", $decrypted_data);
      echo "<br>";
      echo '<a href="decrypt/desifriranaDatoteka.jpg">Prenesi datoteko</a>';
    }
    if(strlen($len == 48)){
      //Define cipher 
      $cipher = "aes-192-cbc"; 
      
      $iv_size = openssl_cipher_iv_length($cipher); 
      $iv = openssl_random_pseudo_bytes($iv_size);
      $iv = "ba6ca926e139b50d";

      //Decrypt data 
      $decrypted_data = openssl_decrypt($encrypted_data, $cipher, $encryption_key, 0, $iv); 
      
      file_put_contents("decrypt/desifriranaDatoteka.jpg", $decrypted_data);
      echo "<br>";
      echo '<a href="decrypt/desifriranaDatoteka.jpg">Prenesi datoteko</a>';
    }

    if(strlen($len == 64)){
      //Define cipher 
      $cipher = "aes-256-cbc"; 

      $iv_size = openssl_cipher_iv_length($cipher); 
      $iv = openssl_random_pseudo_bytes($iv_size);
      $iv = "ba6ca926e139b50d";

      //Decrypt data 
      $decrypted_data = openssl_decrypt($encrypted_data, $cipher, $encryption_key, 0, $iv);
       
      file_put_contents("decrypt/desifriranaDatoteka.jpg", $decrypted_data);
      echo "<br>";
      echo '<a href="decrypt/desifriranaDatoteka.jpg">Prenesi datoteko</a>';
    }
  }
    

?>