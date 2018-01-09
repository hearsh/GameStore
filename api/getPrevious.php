<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');

session_start();
$id = $_SESSION["user_id"];

$sql = "SELECT * FROM transaction where customer_id='$id'";
$result = mysqli_query($conn, $sql);
$data = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $t_id = $row["transaction_id"];
      $sql_two = "SELECT * FROM order_item o, product p where o.transaction_id='$t_id' and o.product_id = p.product_id";
$result_two = mysqli_query($conn, $sql_two);

if (mysqli_num_rows($result_two) > 0) {
    // output data of each row
    while($row_two = mysqli_fetch_assoc($result_two)) {
      array_push($data, $row_two);
      }
    }
		
    }
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