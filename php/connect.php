<?php

$servername = "near-buy.me";
$dbuser = 'admin';
$dbpass = 'password';
$dbname = "nearbuy";

$connection = mysqli_connect($servername, $dbuser, $dbpass,$dbname);

if (!$connection) {
   	die("Connection failed: " . mysqli_connect_error());
}

?>