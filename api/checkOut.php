<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');
session_start();
$login = isset($_SESSION["user_login"]);

if($login != 1)
{
  $response = array(
      "code" => 200,
      "message" => "Please login to checkout."
    ); 
}
else
{
	$response = array(
      "code" => 200,
      "message" => "Please complete the payment."
    ); 
}



echo stripslashes(json_encode($response));




?>