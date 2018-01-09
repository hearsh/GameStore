<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');
$id = $_REQUEST["id"];
$aid = $_REQUEST["aid"];


$sql = "DELETE FROM store WHERE store_id='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {

$sql_two = "DELETE FROM address WHERE address_id='$aid'";
$result = mysqli_query($conn, $sql_two);
if (mysqli_query($conn, $sql_two)) {
    $response = array(
      "code" => 200,
      "message" => "Store Deleted"
      );
}
else {
    $response = array(
      "code" => 200,
      "message" => "Address could not be deleted",
      "SQL Error" => mysqli_error($conn)
    ); 
}
}
 else {
    $response = array(
      "code" => 200,
      "message" => "Store could not be deleted",
      "SQL Error" => mysqli_error($conn)
    ); 
}



echo stripslashes(json_encode($response));




?>