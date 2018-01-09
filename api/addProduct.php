<?php
header("Access-Control-Allow-Origin: *");
include('config/config.php');


$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$desc = $_REQUEST["description"];
$console_id = $_REQUEST["console_id"];
$class = $_REQUEST["class"];
$price = $_REQUEST["price"];
$quantity = $_REQUEST["quantity"];
$genre_id = $_REQUEST["genre_id"];
$store_id = $_REQUEST["store"];
$imagemain = isset($_REQUEST['image']) ? $_REQUEST['image'] : '';


if($imagemain == '')
{
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["FileUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["FileUpload"]["tmp_name"], $target_file)) {
        $image = $target_file;
        if($id != '')
        {
            $sql = "UPDATE product SET name='$name',price='$price',console_id='$console_id',description='$desc',class='$class',genre_id='$genre_id',image='$image' WHERE product_id = '$id'";
            if (mysqli_query($conn, $sql)) {
                $sql_two = "UPDATE inventory SET quantity='$quantity' WHERE product_id = '$id' and store_id = '$store_id'";
                if (mysqli_query($conn, $sql_two)) {
            echo "New record Updated successfully";
            header('Location: ../admin/inventory.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
            
        }
        else{
            $product_id = uniqid();
        $sql = "INSERT INTO `product` (`product_id`, `name`, `price`, `console_id`, `description`, `class`, `genre_id`, `image`) 
        VALUES ('$product_id', '$name', '$price', '$console_id', '$desc', '$class', '$genre_id', '$image')";
        if (mysqli_query($conn, $sql)) {
            $sql_three = "SELECT * FROM store where store_id = '$store_id'";
        $result = mysqli_query($conn, $sql_three);

        if (mysqli_num_rows($result) > 0) {
    // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $region_id = $row["region_id"];
            }
        }
            $sql_two = "INSERT INTO `inventory` (`store_id`, `product_id`, `quantity`, `region_id`) 
        VALUES ('$store_id', '$product_id', '$quantity', '$region_id')";
        if (mysqli_query($conn, $sql_two)) {
            echo "New record created successfully";
            header('Location: ../admin/inventory.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    } 
}

}

}

if($imagemain != '')
{

    $sql = "UPDATE product SET name='$name',price='$price',console_id='$console_id',description='$desc',class='$class',genre_id='$genre_id',image='$imagemain' WHERE product_id = '$id'";
            if (mysqli_query($conn, $sql)) {
                $sql_two = "UPDATE inventory SET quantity='$quantity' WHERE product_id = '$id' and store_id = '$store_id'";
                if (mysqli_query($conn, $sql_two)) {
            echo "New record Updated successfully";
            header('Location: ../admin/inventory.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}




?>