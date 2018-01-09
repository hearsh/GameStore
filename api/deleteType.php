<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');
$id = $_REQUEST["id"];
$type = $_REQUEST["type"];

if($type == 'console')
{
	$sql = "DELETE FROM console_type WHERE console_id=$id";
}
if($type == 'genre')
{
	$sql = "DELETE FROM genre WHERE genre_id=$id";
}


$result = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    $response = array(
      "code" => 200,
      "message" => $type." Deleted"
      );
} else {
    $response = array(
      "code" => 200,
      "message" => $type." could not be deleted"
    ); 
}



echo stripslashes(json_encode($response));




?>