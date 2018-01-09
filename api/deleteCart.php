<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');
$id = $_REQUEST["id"];


$sql = "DELETE FROM cart WHERE cart_id='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    $response = array(
      "code" => 200,
      "message" => "Product deleted from cart"
      );
} else {
    $response = array(
      "code" => 200,
      "message" => "Product could not be deleted"
    ); 
}



echo stripslashes(json_encode($response));




?>