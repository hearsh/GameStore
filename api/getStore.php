<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');


$sql = "SELECT s.*, e.first_name, e.last_name, e.employee_id, r.*, a.*  FROM store s, address a, region r, employee e where s.address_id = a.address_id and r.region_id = s.region_id and e.employee_id = s.store_manager order by s.store_id desc";
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