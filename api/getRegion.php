<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');

$sql = "SELECT * FROM region";
$result = mysqli_query($conn, $sql);
$outp = "";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
         if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'  . $row["region_id"] . '",';
    $outp .= '"manager":"'  . $row["region_manager"] . '",';
    $outp .= '"name":"'   . $row["name"]        . '"}';
    }
} else {
    echo "None";
}


$outp ='{"records":['.$outp.']}';
echo($outp);




?>