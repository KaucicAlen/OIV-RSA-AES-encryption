<?php
session_start();
include ("config.php");
include ("functions.php");

$user_data = check_login($con);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Naloga 3</title>
</head>
<body>
<?php   
include ("header.php"); 
include ("navBar.php");
?>




<?php 
include ("desifriranje.php");
?>



<?php include ("footer.php")?>
</body>
</html>