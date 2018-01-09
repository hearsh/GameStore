<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');
session_start();

$address_id = $_REQUEST["add"];
$m_id = $_REQUEST["m_id"];


	$sql_searchemp = "SELECT * FROM store WHERE address_id = '$address_id'";
$result = mysqli_query($conn, $sql_searchemp);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$store_id = $row["store_id"];
$sql_makemanager = "UPDATE employee SET store_id = '$store_id', designation = 'SM' WHERE employee.employee_id = '$m_id'";
	if (mysqli_query($conn, $sql_makemanager)) {
$response = array(
      "code" => 200,
      "message" => "success"
      );
  }
  else {
      $response = array(
      "code" => 200,
      "message" => "Error updating employee as SM, please try again",
      "SQL Error" => mysqli_error($conn)
    );
}

  }

} else {
      $response = array(
      "code" => 200,
      "message" => "There was an error, please try again",
      "SQL Error" => mysqli_error($conn)
    );
}

echo stripslashes(json_encode($response));

?>