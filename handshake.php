<?php
header('Access-Control-Allow-Origin: *');

header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$servername = "near-buy.me";
$dbuser = 'admin';
$dbpass = 'password';
$dbname = "nearbuy"

  $connection = mysqli_connect($servername, $dbuser, $dbpass,$dbname);


if (!$connection) {
   	 die("Connection failed: " . mysqli_connect_error());
	}

 $username = $_POST["username"];

$secretKeyQuery = "SELECT `encryptionKey` FROM `user` WHERE `username`='$username'";

$result = mysqli_query($connection, $secretKeyQuery);
$row = $result->fetch_assoc();



$secretKey = $row['encryptionKey'];

echo $secretKey;

?>