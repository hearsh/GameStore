<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');

$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];
$email = $_REQUEST["email"];
$pass = $_REQUEST["pass"];
$street = $_REQUEST["street"];
$city = $_REQUEST["city"];
$state = $_REQUEST["state"];
$zipcode = $_REQUEST["zipcode"];
$customer_id = $_REQUEST["customer_id"];
$address_id = $_REQUEST["address_id"];

  $sql = "UPDATE address, customer, business SET address.street='$street', address.city='$city', address.state='$state', address.zipcode='$zipcode', customer.first_name='$fname', customer.last_name='$lname', customer.email='$email', customer.password='$pass' WHERE address.address_id='$address_id' and customer.customer_id ='$customer_id'";


if (mysqli_multi_query($conn, $sql)) {
    $response = array(
      "code" => 200,
      "message" => "Account updated succesfully."
    ); 
} else {
    $response = array(
      "code" => 400,
      "message" => mysqli_error($conn)
    ); 
}

echo stripslashes(json_encode($response));




?>