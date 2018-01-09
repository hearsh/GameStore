<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');

$name = $_REQUEST["name"];
$choice = $_REQUEST["choice"];



if($choice == 1)
{
$sql = "INSERT INTO genre (genre_name)
VALUES ('$name')";
}
if($choice == 2)
{
  $sql = "INSERT INTO console_type (console_name)
VALUES ('$name')";
}

if (mysqli_query($conn, $sql)) {
    $response = array(
      "code" => 200,
      "message" => "Added Succesfully "
    ); 
} else {
    $response = array(
      "code" => 400,
      "message" => "Error, Not added"
    ); 
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




echo stripslashes(json_encode($response));




?>