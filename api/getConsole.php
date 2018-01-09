<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');

$sql = "SELECT * FROM console_type order by console_id desc";
$result = mysqli_query($conn, $sql);
$outp = "";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
         if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'  . $row["console_id"] . '",';
    $outp .= '"name":"'   . $row["console_name"]        . '"}';
    }
} else {
    echo "None";
}


$outp ='{"records":['.$outp.']}';
echo($outp);




?>