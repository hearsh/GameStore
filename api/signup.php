<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');
session_start();
$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];
$email = $_REQUEST["email"];
$pass = $_REQUEST["pass"];
$street = $_REQUEST["street"];
$city = $_REQUEST["city"];
$state = $_REQUEST["state"];
$zipcode = $_REQUEST["zipcode"];
$choice = $_REQUEST["choice"];
$address_id = uniqid();
$user_id = uniqid();
if($choice == "business")
{
  $bname = $_REQUEST["bname"];
  $income = $_REQUEST["income"];
  $sql = "INSERT INTO address (address_id, street, city, state, zipcode)
VALUES ('$address_id', '$street', '$city', '$state', '$zipcode');";
  $sql .= "INSERT INTO customer (customer_id, first_name, last_name, email, password, address_id, customer_type)
VALUES ('$user_id', '$fname', '$lname', '$email', '$pass', '$address_id', '$choice');";
  $sql .= "INSERT INTO business (customer_id, name, annual_income)
VALUES ('$user_id', '$bname', '$income')";


}
if($choice == "home")
{
  $age = $_REQUEST["age"];
  $income = $_REQUEST["income"];
  $martial = $_REQUEST["martial"];
  $gender = $_REQUEST["gender"];
    $sql = "INSERT INTO address (address_id, street, city, state, zipcode)
VALUES ('$address_id', '$street', '$city', '$state', '$zipcode');";
  $sql .= "INSERT INTO customer (customer_id, first_name, last_name, email, password, address_id, customer_type)
VALUES ('$user_id', '$fname', '$lname', '$email', '$pass', '$address_id', '$choice');";
  $sql .= "INSERT INTO home (customer_id, age, income, martial_status, gender)
VALUES ('$user_id', '$age', '$income', '$martial', '$gender')";
}


if (mysqli_multi_query($conn, $sql)) {
  $_SESSION["user_login"] = 1;
      $_SESSION["user_id"] = $user_id;
      $_SESSION["fname"] = $fname;
      $_SESSION["lname"] = $lname;
      $_SESSION["email"] = $email;
      $_SESSION["address_id"] = $address_id;
    $response = array(
      "code" => 200,
      "message" => "Account created succesfully. We have sent you an email verification link. Please login after verification."
    ); 
} else {
    $response = array(
      "code" => 400,
      "message" => "Error"
    ); 
}

echo stripslashes(json_encode($response));




?>