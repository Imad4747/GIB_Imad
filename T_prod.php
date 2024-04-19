<?php  
include 'connect.php';
$name = $_POST['name'];
$model = $_POST['model'];
$price = $_POST['price'];
$photo = $_POST['photo'];
$year_car = $_POST['year_car'];
$sql = "INSERT INTO tblproducts(name, model, price, photo, year_car) VALUES ('$name', '$model', '$price', '$photo', '$year_car')";

$result = $mysqli->query($sql);
if ($result === false) {
        die("Error adding : " . $mysqli->error);
    }
    header("Location: A_prod.php");
    
$mysqli->close();

?>