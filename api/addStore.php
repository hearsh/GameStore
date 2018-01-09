<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');
session_start();

$address_id = uniqid();
$street = $_REQUEST["street"];
$city = $_REQUEST["city"];
$state = $_REQUEST["state"];
$zipcode = $_REQUEST["zipcode"];
$r_id = $_REQUEST["store"];
$m_id = $_REQUEST["manager"];

 $sql = "INSERT INTO address (address_id, street, city, state, zipcode)
VALUES ('$address_id', '$street', '$city', '$state', '$zipcode');";
$sql .= "INSERT INTO store (address_id, store_manager, region_id) VALUES ('$address_id', '$m_id', '$r_id')";


if (mysqli_multi_query($conn, $sql)) {
      $response = array(
      "code" => 200,
      "message" => "Store Added",
      "address_id" => $address_id,
      "m_id" => $m_id
    );
} else {
      $response = array(
      "code" => 200,
      "message" => "There was an error, please try again",
      "SQL Error" => mysqli_error($conn)
    );
}

echo stripslashes(json_encode($response));

?>