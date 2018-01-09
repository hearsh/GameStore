<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');



$sql = "SELECT * FROM product p, store s, inventory i where i.product_id = p.product_id and s.store_id = i.store_id order by p.product_id DESC";
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