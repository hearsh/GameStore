<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');

$sql = "SELECT * FROM employee WHERE designation = 'Associate'";
$result = mysqli_query($conn, $sql);
$outp = "";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
         if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'  . $row["employee_id"] . '",';
    $outp .= '"first_name":"'  . $row["first_name"] . '",';
    $outp .= '"last_name":"'   . $row["last_name"]        . '"}';
    }
} else {
    echo "None";
}


$outp ='{"records":['.$outp.']}';
echo($outp);




?>