<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$servername = "near-buy.me";
$dbuser = 'admin';
$dbpass = 'password';
$dbname = "nearbuy";

$connection = mysqli_connect($servername, $dbuser, $dbpass,$dbname);




if (!$connection) {
   	 die("Connection failed: " . mysqli_connect_error());
	}


$username = $_POST["username"];
$password = $_POST["password"];

$sessionID = getSessionID();
$memberID = retrieveMemberId();
$passQuery = "SELECT `password` FROM `user` WHERE `username`='$username'";


$result = mysqli_query($connection, $passQuery);
$row = $result->fetch_assoc();

$encryptedPassword = $row['password'];


if($encryptedPassword == $password){

createSession();

<<<<<<< HEAD
echo "<!DOCTYPE html>
<html>
<head>
    <link href='css/style.css' rel='stylesheet'>
    <script src='js/jquery-2.1.1.min.js'></script>
         <script src='varAssign.js'></script>
              <script src='example.js'></script>
    <title>SPLASH</title>
</head>
<body>
<div class='large'>
	<h1>Login success</h1>
	<button class='lgbutton' onclick='phptest.php'><img src='img/list.png' class='lgicon'>Manage your listings</button>
	<button class='lgbutton' onclick='getMap()'><img src='img/map.png' class='lgicon'>Find out what's nearbuy</button>
</div>
</body>
</html>";


//header("Location: splash.html");


} else if($encryptedPassword != $password) {


echo "false";
=======
	

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head> ";
    echo "<link href='css/style.css' rel='stylesheet'>";
    echo "<script src='js/jquery-2.1.1.min.js'></script>";
     echo "<script src='varAssign.js'></script>";
    echo "<title>SPLASH</title>";
echo "</head>";
echo "<body>";
	echo "<h1>Logged in successfully</h1>";
	echo "<button>Manage your listings</button>";
	echo "<button onclick='getAddress()'>Find out what's nearbuy</button>";
echo "</body>";
echo "</html>";
	

} else {

	echo "<!DOCTYPE html>";
echo "<html>";
echo "<head> ";
    echo "<link href='css/style.css' rel='stylesheet'>";
    echo "<script src='js/jquery-2.1.1.min.js'></script>";
     echo "<script src='varAssign.js'></script>";
    echo "<title>SPLASH</title>";
echo "</head>";
echo "<body>";
	echo "<h1>Wrong Username or password</h1>";
	echo "<a href='www.near-buy.me'<button>Go Back</button></a>";
echo "</body>";
echo "</html>";
>>>>>>> 790ca3915c530dfe3f66392daed262407457251a
	
}


function createSession(){

global $memberID, $sessionID, $connection;
	
$query = "INSERT INTO `session`(`id`, `sessionID`) VALUES ('$memberID' , '$sessionID') " ;

mysqli_query($connection, $query);

}


function getSessionID(){

global  $connection, $username;

$id = retrieveMemberId();

$query = "SELECT `sessionID` FROM `session`";

$result = mysqli_query($connection, $query);

$sessionID = mysqli_num_rows($result) + 1;


return $sessionID;
}



function retrieveMemberId(){

global  $connection, $username, $keyArray;

  $result ='';

	$query = "SELECT id FROM `user` WHERE username='$username'";
	
	$result = mysqli_query($connection, $query);
	
	if(mysqli_num_rows($result) > 0){

	while ($row = $result->fetch_assoc()){
		
		return $row['id'];
		
			}
			
		} else {

    			return  NULL; 

    		}
	
	}



?>