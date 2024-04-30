<?php

include 'connect.php';

if (isset($_POST['control'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $year_car = $_POST['year_car'];
    $topspeed = $_POST['topspeed'];
    $horsepower = $_POST['horsepower'];
    $acceleration = $_POST['acceleration'];
    $fuel = $_POST['fuel'];
    $transmission = $_POST['transmission'];
    $cartype = $_POST['cartype'];
    $photo = $_POST['photo'];
    
    $sql_prod = "UPDATE tblproducts SET 
            name='$name', 
            model='$model', 
            price='$price', 
            year_car='$year_car', 
            photo='$photo' 
            WHERE id=$id";
            
    $sql_specs = "UPDATE tblspecs SET 
                    topspeed='$topspeed', 
                    horsepower='$horsepower', 
                    accelaration='$acceleration', 
                    fuel='$fuel', 
                    transmission='$transmission', 
                    cartype='$cartype' 
                    WHERE specID=$id";
    echo $sql_prod;
    echo $sql_specs;
    if ($mysqli->query($sql_prod) && $mysqli->query($sql_specs)) {
        // header("Location: A_prod.php");
        
    } else {
        echo "Error updating record: " . $mysqli->error;
    } 
}
?>
