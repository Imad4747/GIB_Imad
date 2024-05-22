<?php

include 'connect.php';

$id = $_POST['id']; 
$name = $_POST['name'];
$model = $_POST['model'];
$price = $_POST['price'];
$year_car = $_POST['year_car'];
$topspeed = $_POST['topspeed'];
$horsepower = $_POST['horsepower'];
$accel = $_POST['accel'];
$fuel = $_POST['fuel'];
$transmission = $_POST['transmission'];
$cartype = $_POST['cartype'];
$desc = $_POST['desc'];

$query = "UPDATE tblproducts 
          INNER JOIN tblspecs ON tblproducts.id = tblspecs.specID
          SET 
            tblproducts.name = ?,
            tblproducts.model = ?,
            tblproducts.price = ?,
            tblproducts.year_car = ?,
            tblspecs.topspeed = ?,
            tblspecs.horsepower = ?,
            tblspecs.accelaration = ?,
            tblspecs.fuel = ?,
            tblspecs.transmission = ?,
            tblspecs.cartype = ?,
            tblspecs.description = ?
          WHERE tblproducts.id = ?"; 

if ($stmt = $mysqli->prepare($query)) {
    $stmt->bind_param("ssdsdssssssi", $name, $model, $price, $year_car, $topspeed, $horsepower, $accel, $fuel, $transmission, $cartype, $desc, $id);

    if ($stmt->execute()) {
        header("Location: A_prod.php");
        exit();
    } else {
        echo "Error updating product: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error preparing the update statement: " . $mysqli->error;
}

$mysqli->close();

?>
