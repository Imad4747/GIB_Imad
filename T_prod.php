<?php  
include 'connect.php';
$name = $_POST['name'];
$model = $_POST['model'];
$price = $_POST['price'];
$photo = $_POST['photo'];
$year_car = $_POST['year_car'];
$top = $_POST['topspeed'];
$horse = $_POST['horsepower'];
$accel = $_POST['accel'];
$fuel = $_POST['fuel'];
$trans = $_POST['transmission'];
$cartype = $_POST['cartype'];
$sql = "INSERT INTO tblproducts(name, model, price, photo, year_car) VALUES ('$name', '$model', '$price', '$photo', '$year_car')";
$sql2 = "INSERT INTO tblspecs(topspeed, horsepower, accelaration, fuel, transmission, cartype) VALUES ('$top', '$horse', '$accel', '$fuel', '$trans', '$cartype')";
$result = $mysqli->query($sql);
$result2 = $mysqli->query($sql2);
if ($result === false && $result2 === false) {
        die("Error adding : " . $mysqli->error);
    }
    header("Location: A_prod.php");
    
$mysqli->close();

?>