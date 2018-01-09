<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');
session_start();
$id = $_SESSION["user_id"];


$sql = "SELECT * FROM customer c, address a where c.customer_id = '$id' and a.address_id = c.address_id";
$result = mysqli_query($conn, $sql);
$data = array();
$type = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $type_c = $row["customer_type"];
 
        $sql_two = "SELECT * FROM $type_c where customer_id = '$id' ";
        $result_two = mysqli_query($conn, $sql_two);

        if (mysqli_num_rows($result_two) > 0) {
    // output data of each row
        while($row_two = mysqli_fetch_assoc($result_two)) {
          array_push($type, $row_two);
        }

      }

		array_push($data, $row);
    }
    $response = array(
      "code" => 200,
      "message" => "User data is received",
      "data" => $data,
      "type" => $type
    );
} else {
     $response = array(
      "code" => 200,
      "message" => "User is not present"
    ); 
}


echo stripslashes(json_encode($response));




?>