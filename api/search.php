<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');
error_reporting(0);
$name=$genre=$console=$type=$sort="";
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
$genre = isset($_REQUEST['genre']) ? $_REQUEST['genre'] : '';
$console = isset($_REQUEST['console']) ? $_REQUEST['console'] : '';
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '';
$sort = isset($_REQUEST['sort']) ? $_REQUEST['sort'] : '';
$data = array();

if($sort != '')
{
if($name != '' && $genre != '' && $console != '' && $type != '')
{
$sql = "SELECT * FROM product,console_type,genre 
where product.console_id = console_type.console_id 
and genre.genre_id = product.genre_id 
and name like '%$name%' and genre_id = '$genre' and console_id = '$console' and product.class = '$type' order by product.$sort";
}
if($name != '' && $genre != '' && $console != '' && $type == '')
{
$sql = "SELECT * FROM product,console_type,genre 
where product.console_id = console_type.console_id
and genre.genre_id = product.genre_id 
and name like '%$name%' and genre_id = '$genre' and console_id = '$console' order by product.$sort";
}
if($name != '' && $genre != '' && $console == '' && $type != '')
{
$sql = "SELECT * FROM product, genre where genre.genre_id = product.genre_id and
 name like '%$name%' and product.genre_id = '$genre' and product.class = '$type' order by product.$sort";
}
if($name != '' && $genre != '' && $console == '' && $type == '')
{
$sql = "SELECT * FROM product, genre where genre.genre_id = product.genre_id and name like '%$name%' order by product.$sort";
}
if($name != '' && $genre == '' && $console != '' && $type != '')
{
$sql = "SELECT * FROM product, console where product.console_id = console_type.console_id and name like '%$name%' and product.console_id = '$console' and product.class = '$type' order by product.$sort";
}
if($name != '' && $genre == '' && $console != '' && $type == '')
{
$sql = "SELECT * FROM product, console_type where product.console_id=console_type.console_id and name like '%$name%' and product.console_id = '$console' order by product.$sort";
}
if($name != '' && $genre == '' && $console == '' && $type != '')
{
$sql = "SELECT * FROM product where name like '%$name%' and product.class = '$type' order by product.$sort";
}
if($name != '' && $genre == '' && $console == '' && $type == '')
{
$sql = "SELECT * FROM product where name like '%$name%' order by product.$sort";
}
if($name == '' && $genre != '' && $console != '' && $type != '')
{
$sql = "SELECT * FROM product,genre,console_type 
where product.genre_id = genre.genre_id and product.console_id = console_type.console_id and 
product.genre_id = '$genre' and product.console_id = '$console' and product.class = '$type' order by product.$sort";
}
if($name == '' && $genre != '' && $console != '' && $type == '')
{
$sql = "SELECT * FROM product,genre,console_type
where product.genre_id = genre.genre_id and product.console_id = console_type.console_id 
and product.genre_id = '$genre' and product.console_id = '$console' order by product.$sort";
}
if($name == '' && $genre != '' && $console == '' && $type != '')
{
$sql = "SELECT * FROM product,genre 
where product.genre_id = genre.genre_id 
and product.genre_id = '$genre' and product.class = '$type' order by product.$sort";
}
if($name == '' && $genre != '' && $console == '' && $type == '')
{
$sql = "SELECT * FROM product,genre 
where product.genre_id = genre.genre_id 
and product.genre_id = '$genre' order by product.$sort";
}
if($name == '' && $genre == '' && $console != '' && $type != '')
{
$sql = "SELECT * FROM product,console_type 
where product.console_id = console_type.console_id 
and product.console_id = '$console' and product.class = '$type' order by product.$sort";
}
if($name == '' && $genre == '' && $console != '' && $type == '')
{
$sql = "SELECT * FROM product,console_type 
where product.console_id = console_type.console_id 
and product.console_id = '$console' order by product.$sort";
}
if($name == '' && $genre == '' && $console == '' && $type != '')
{
$sql = "SELECT * FROM product where class = '$type' order by product.$sort";
}

}
else
{

if($name != '' && $genre != '' && $console != '' && $type != '')
{
$sql = "SELECT * FROM product,console_type,genre 
where product.console_id = console_type.console_id 
and genre.genre_id = product.genre_id 
and name like '%$name%' and genre_id = '$genre' and console_id = '$console' and product.class = '$type'";
}
if($name != '' && $genre != '' && $console != '' && $type == '')
{
$sql = "SELECT * FROM product,console_type,genre 
where product.console_id = console_type.console_id
and genre.genre_id = product.genre_id 
and name like '%$name%' and genre_id = '$genre' and console_id = '$console'";
}
if($name != '' && $genre != '' && $console == '' && $type != '')
{
$sql = "SELECT * FROM product, genre where genre.genre_id = product.genre_id and
 name like '%$name%' and product.genre_id = '$genre' and product.class = '$type'";
}
if($name != '' && $genre != '' && $console == '' && $type == '')
{
$sql = "SELECT * FROM product, genre where genre.genre_id = product.genre_id and name like '%$name%'";
}
if($name != '' && $genre == '' && $console != '' && $type != '')
{
$sql = "SELECT * FROM product, console where product.console_id = console_type.console_id and name like '%$name%' and product.console_id = '$console' and product.class = '$type' ";
}
if($name != '' && $genre == '' && $console != '' && $type == '')
{
$sql = "SELECT * FROM product, console_type where product.console_id=console_type.console_id and name like '%$name%' and product.console_id = '$console' ";
}
if($name != '' && $genre == '' && $console == '' && $type != '')
{
$sql = "SELECT * FROM product where name like '%$name%' and product.class = '$type'";
}
if($name != '' && $genre == '' && $console == '' && $type == '')
{
$sql = "SELECT * FROM product where name like '%$name%'";
}
if($name == '' && $genre != '' && $console != '' && $type != '')
{
$sql = "SELECT * FROM product,genre,console_type 
where product.genre_id = genre.genre_id and product.console_id = console_type.console_id and 
product.genre_id = '$genre' and product.console_id = '$console' and product.class = '$type'";
}
if($name == '' && $genre != '' && $console != '' && $type == '')
{
$sql = "SELECT * FROM product,genre,console_type
where product.genre_id = genre.genre_id and product.console_id = console_type.console_id 
and product.genre_id = '$genre' and product.console_id = '$console'";
}
if($name == '' && $genre != '' && $console == '' && $type != '')
{
$sql = "SELECT * FROM product,genre 
where product.genre_id = genre.genre_id 
and product.genre_id = '$genre' and product.class = '$type'";
}
if($name == '' && $genre != '' && $console == '' && $type == '')
{
$sql = "SELECT * FROM product,genre 
where product.genre_id = genre.genre_id 
and product.genre_id = '$genre'";
}
if($name == '' && $genre == '' && $console != '' && $type != '')
{
$sql = "SELECT * FROM product,console_type 
where product.console_id = console_type.console_id 
and product.console_id = '$console' and product.class = '$type'";
}
if($name == '' && $genre == '' && $console != '' && $type == '')
{
$sql = "SELECT * FROM product,console_type 
where product.console_id = console_type.console_id 
and product.console_id = '$console'";
}
if($name == '' && $genre == '' && $console == '' && $type != '')
{
$sql = "SELECT * FROM product where class = '$type'";
}

}

$result = mysqli_query($conn, $sql);

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