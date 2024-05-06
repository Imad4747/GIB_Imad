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
                tblproducts.name = '$name',
                tblproducts.model = '$model',
                tblproducts.price = '$price',
                tblproducts.year_car = '$year_car',
                tblspecs.topspeed = '$topspeed',
                tblspecs.horsepower = '$horsepower',
                tblspecs.accelaration = '$accel',
                tblspecs.fuel = '$fuel',
                tblspecs.transmission = '$transmission',
                tblspecs.cartype = '$cartype',
                tblspecs.description = '$desc'
                 
              WHERE tblproducts.id = $id"; 

    if ($mysqli->query($query) === TRUE) {
        echo "Product updated successfully";
    } else {
        echo "Error updating product: " . $mysqli->error;
    }

    $mysqli->close();




  ?>