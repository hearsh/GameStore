<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');
session_start();
$email = $_REQUEST["email"];
$pass = $_REQUEST["password"];


$sql = "SELECT * FROM customer where email = '$email' and password = '$pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $_SESSION["user_login"] = 1;
      $_SESSION["user_id"] = $row["customer_id"];
      $_SESSION["fname"] = $row["first_name"];
      $_SESSION["lname"] = $row["last_name"];
      $_SESSION["email"] = $row["email"];
      $_SESSION["address_id"] = $row["address_id"];
    $response = array(
      "code" => 200,
      "message" => "Welcome ".$row["first_name"],
      "data" => $row
    ); 

}
} else {
    $response = array(
      "code" => 400,
      "message" => "Error, user not found"
    ); 
}


echo stripslashes(json_encode($response));




?>