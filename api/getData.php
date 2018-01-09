<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');
$id = $_REQUEST["id"];
$sort = isset($_REQUEST['sort']) ? $_REQUEST['sort'] : '';
if($sort != '')
{
  $sql = "SELECT * FROM product where class = '$id' order by $sort";
}
else
{
$sql = "SELECT * FROM product where class = '$id' ";
}
$result = mysqli_query($conn, $sql);
$data = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		array_push($data, $row);
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