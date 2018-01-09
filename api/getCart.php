<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');
session_start();
$user_id = $_SESSION["temp_user"];


$sql = "SELECT * FROM product p, cart c where c.user_id = '$user_id' and p.product_id = c.product_id";
$result = mysqli_query($conn, $sql);
$data = array();
$data["rows"] = array();
$data["total"] = array();
$data["quantity"] = array();
$total = 0;
$quantity = 0;

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $total = $total + ($row["price"] * $row["quantity"]);
      $quantity = $quantity + $row["quantity"];
		array_push($data["rows"], $row);
    }
    array_push($data["total"], $total);
    array_push($data["quantity"], $quantity);
    $response = array(
      "code" => 200,
      "message" => "Got it",
      "data" => $data
    );
} else {
     $response = array(
      "code" => 200,
      "message" => "No Product present"
    ); 
}


echo stripslashes(json_encode($response));




?>