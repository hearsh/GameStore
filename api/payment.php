<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');
session_start();
$total = $_REQUEST["total"];
$transaction_id = uniqid();
$user_id = $_SESSION["user_id"];
$temp_id = $_SESSION["temp_user"];
$address_id = $_SESSION["address_id"];
echo $address_id;

$sql_four = "INSERT INTO transaction (transaction_id, customer_id, total_amount)
VALUES ('$transaction_id', '$user_id', '$total')";

if (mysqli_query($conn, $sql_four)) {
    echo "Transaction updated successfully";


$sql = "SELECT * FROM cart where user_id = '$temp_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$product_id = $row["product_id"];
    	$quantity = $row["quantity"];
		$store_id = $row["store_id"];
		$sql_six = "SELECT * FROM product where product_id = '$product_id'";
$result_two = mysqli_query($conn, $sql_six);

if (mysqli_num_rows($result_two) > 0) {
    // output data of each row
    while($row_two = mysqli_fetch_assoc($result_two)) {
    	$price = $row_two["price"];
    	        $sql_two = "INSERT INTO order_item (transaction_id, quantity, price, product_id, store_id)
VALUES ('$transaction_id', '$quantity', '$price', '$product_id', '$store_id')";

if (mysqli_query($conn, $sql_two)) {
    echo "Order updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
    }
}
		


$sql_five = "UPDATE inventory SET quantity = (quantity - '$quantity') 
		WHERE store_id = '$store_id' 
		AND product_id = '$product_id'";
if (mysqli_query($conn, $sql_five)) {
    echo "Inventory updated successfully";
    $sql_seven = "TRUNCATE `cart`";
if (mysqli_query($conn, $sql_seven)) {
     echo "Cart emptied successfully";
     header('Location: ../cart.php?checkout=yes');
}
else
{
	echo "Error updating record: " . mysqli_error($conn);
}
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
            }

} else {
    echo "Error updating record: " . mysqli_error($conn);
}

} else {
    echo "0 results";
}




/*if (mysqli_multi_query($conn, $sql)) {
      $response = array(
      "code" => 200,
      "message" => "Store Added"
    );
} else {
      $response = array(
      "code" => 200,
      "message" => "There was an error, please try again",
      "SQL Error" => mysqli_error($conn)
    );
}*/



?>