<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');
session_start();
$user_id = $_SESSION["temp_user"];

$id = $_REQUEST["id"];
$quantity = $_REQUEST["quantity"];
$zipcode = $_REQUEST["zipcode"];
$newQuantity = 0;

$sql_one = "SELECT * FROM product p, inventory i where p.product_id = '$id' and i.product_id = p.product_id";
$result = mysqli_query($conn, $sql_one);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $available = $row["quantity"];
        $store_id = $row["store_id"];
    }
}
$newQuantity = $available - $quantity;

if($newQuantity >= 0) 
{

$sql_two = "SELECT a.zipcode FROM inventory i, store s, address a where i.product_id = '$id' and i.store_id = s.store_id and s.address_id = a.address_id and a.zipcode = '$zipcode'";
$result = mysqli_query($conn, $sql_two);

if (mysqli_num_rows($result) > 0) {


$sql = "INSERT INTO cart (product_id, quantity, user_id, store_id)
VALUES ('$id', '$quantity', '$user_id', '$store_id')";

if (mysqli_query($conn, $sql)) {
    $response = array(
      "code" => 200,
      "message" => "Product Added",
      "id" => $id
    );
} else {
    $response = array(
      "code" => 200,
      "message" => "There was an error"
    ); 
}
}
else
{
  $response = array(
      "code" => 200,
      "message" => "Sorry, we do not deliver to your zipcode."
    ); 
}

}
else
{
  $response = array(
      "code" => 200,
      "message" => "The quantity requested is not present."
    ); 
}


echo stripslashes(json_encode($response));




?>