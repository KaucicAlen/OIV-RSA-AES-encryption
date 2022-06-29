<?php
session_start();
    include ("config.php");
    include ("functions.php");

    $id = $_GET['id'];

    $user_data = check_login($con);
    $uporabnik = uporabnikovProfil($con, $id);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Profil</title>
</head>
<body>
<?php   
include ("header.php"); 
include ("navBar.php");
?>


<?php


foreach($uporabnik as $uporabnik){
        echo "<p style='font-weight: bold;'> Uporabnisko ime: <p /> " . $uporabnik[1] . "<br />";
        echo "<p style='font-weight: bold;'> Email: <p /> " . $uporabnik[2] . "<br />";
        echo '<img src="data:image;base64,'.base64_encode($uporabnik[4]).'"class="img-responsive" style="width:500px; height: 500px;" alt="photo.jpg">';
    
        $link = "'deleteUser.php?id=" . $user_data['user_id'] . "'";

        echo '<button class="btn btn-sm btn-danger btn-block" style="border-width: 2px;"
        onClick="window.location.href='. $link . '">Izbriši profil</button>';
       
}
    
        
?>






<?php include ("footer.php")?>
</body>
</html>