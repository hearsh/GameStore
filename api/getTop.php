<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');



$sql = "SELECT order_item.product_id, product.*, SUM(order_item.quantity*order_item.price) AS sales
FROM order_item,product
WHERE order_item.product_id = product.product_id
GROUP BY order_item.product_id, product.name
ORDER BY SUM(order_item.quantity) DESC LIMIT 3";
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