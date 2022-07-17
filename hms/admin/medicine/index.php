<?php 

$host = "localhost";
$username = "root";
$password = "";
$db="hms";

// Create connection
$conn = new mysqli($host, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
	echo "sucess";

    //1.add medicine

	?>
}