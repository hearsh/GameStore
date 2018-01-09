<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gamestore";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
session_start();
$name=$pass="";

$name=$_REQUEST["email"];
$pass=$_REQUEST["password"];

$sql = "SELECT * FROM employee WHERE employee_id = '$name' AND password = '$pass' AND (designation = 'RM' OR designation = 'SM')";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	$_SESSION["login"] = "ok";
	echo "1";
	}
} 
else {
    echo "0";
}




?>