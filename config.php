<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "oiv_naloga";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

