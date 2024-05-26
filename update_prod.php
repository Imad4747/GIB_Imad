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
$modelpath = $_POST['modelpath'];
$parts = $_POST['parts'];

$photo = isset($_FILES['photo']) ? $_FILES['photo']['name'] : null;
$photo1 = isset($_FILES['photo1']) ? $_FILES['photo1']['name'] : null;
$photo2 = isset($_FILES['photo2']) ? $_FILES['photo2']['name'] : null;
$photo3 = isset($_FILES['photo3']) ? $_FILES['photo3']['name'] : null;

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
            tblspecs.description = ?";

$types = 'ssdsdssssss';
$params = [$name, $model, $price, $year_car, $topspeed, $horsepower, $accel, $fuel, $transmission, $cartype, $desc];

if ($photo) {
    $query .= ", tblproducts.photo = ?";
    $types .= 's';
    $params[] = $photo;
}
if ($photo1) {
    $query .= ", tblspecs.pic = ?";
    $types .= 's';
    $params[] = $photo1;
}
if ($photo2) {
    $query .= ", tblspecs.pic2 = ?";
    $types .= 's';
    $params[] = $photo2;
}
if ($photo3) {
    $query .= ", tblspecs.pic3 = ?";
    $types .= 's';
    $params[] = $photo3;
}

$query .= " WHERE tblproducts.id = ?";

$types .= 'i';
$params[] = $id;

if ($stmt = $mysqli->prepare($query)) {
    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
        echo "Product updated successfully.<br>";
    } else {
        echo "Error updating product: " . $stmt->error . "<br>";
    }

    $stmt->close();
} else {
    echo "Error preparing the update statement: " . $mysqli->error . "<br>";
}

$pathQuery = "UPDATE tblpaths SET Modelpath = ? WHERE id = ?";
$pathStmt = $mysqli->prepare($pathQuery);
if ($pathStmt === false) {
    die("Error preparing path update statement: " . $mysqli->error);
}
$pathStmt->bind_param('si', $modelpath, $id);
if ($pathStmt->execute()) {
    echo "Model path updated successfully.<br>";
} else {
    echo "Error updating model path: " . $pathStmt->error . "<br>";
}
$pathStmt->close();

$partsQuery = "UPDATE tblparts SET parts = ? WHERE id = ?";
$partsStmt = $mysqli->prepare($partsQuery);
if ($partsStmt === false) {
    die("Error preparing parts update statement: " . $mysqli->error);
}
$partsStmt->bind_param('si', $parts, $id);
if ($partsStmt->execute()) {
    echo "Model parts updated successfully.<br>";
} else {
    echo "Error updating model parts: " . $partsStmt->error . "<br>";
}
$partsStmt->close();

header("Location: A_prod.php");
exit();

$mysqli->close();

?>
