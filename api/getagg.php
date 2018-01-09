<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');

$gen = $_REQUEST["gen"];

if($gen == "top")
{
  $sql = "SELECT SUM(o.quantity) as sum, p.name FROM order_item o, product p where p.product_id = o.product_id group by o.product_id order by sum DESC limit 5";
}
if($gen == "sales")
{
$sql = "SELECT order_item.product_id, product.name, SUM(order_item.quantity*order_item.price) AS sales
FROM order_item,product
WHERE order_item.product_id = product.product_id
GROUP BY order_item.product_id, product.name
ORDER BY SUM(order_item.quantity) DESC LIMIT 3";
}
if($gen == "process")
{
$sql = "SELECT COUNT(transaction.transaction_id) as total
FROM transaction ";
}
if($gen == "level")
{
$sql = "SELECT inventory.product_id AS prodid,SUM(inventory.quantity) as sum
FROM inventory,product
WHERE inventory.product_id = product.product_id
GROUP BY inventory.product_id
ORDER BY SUM(inventory.quantity) LIMIT 3";
}
if($gen == "today")
{
$sql = "SELECT count(transaction_id) as count from transaction where DATE(date) = CURDATE()";
}

if($gen == "msale")
{
$sql = "SELECT order_item.product_id, SUM(order_item.quantity) AS Sales
FROM order_item
WHERE order_item.product_id IN (SELECT tab1.prodid AS prodid2
FROM (SELECT inventory.product_id AS prodid,SUM(inventory.quantity)
FROM inventory,product
WHERE inventory.product_id = product.product_id
GROUP BY inventory.product_id
ORDER BY SUM(inventory.quantity) LIMIT 3) AS tab1)
GROUP BY order_item.product_id";
}

if($gen == "region")
{
$sql = "SELECT DISTINCT region.name ,COUNT(order_item.order_id) as sum
FROM order_item,store,region
WHERE order_item.store_id = store.store_id AND region.region_id = store.region_id 
GROUP BY order_item.store_id, region.name";
}

if($gen == "topList")
{
  $sql = "SELECT * 
FROM transaction t, customer c where t.customer_id = c.customer_id";
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
      "message" => "GotTop",
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