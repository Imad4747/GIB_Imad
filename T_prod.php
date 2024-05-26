<?php  
include 'connect.php';

$name = $_POST['name'];
$model = $_POST['model'];
$price = $_POST['price'];
$year_car = $_POST['year_car'];
$top = $_POST['topspeed'];
$horse = $_POST['horsepower'];
$accel = $_POST['accel'];
$fuel = $_POST['fuel'];
$trans = $_POST['transmission'];
$cartype = $_POST['cartype'];
$desc = $_POST['desc'];
$modelParts = isset($_POST['modelParts']) ? explode("\n", trim($_POST['modelParts'])) : [];
$model3d_subpath = $_POST['model3d'];

$base_dir = "public/";

$model3d = $base_dir . $model3d_subpath;

$photo = isset($_FILES['photo']) ? $_FILES['photo']['name'] : null;
$pic = isset($_FILES['photo1']) ? $_FILES['photo1']['name'] : null;
$pic2 = isset($_FILES['photo2']) ? $_FILES['photo2']['name'] : null;
$pic3 = isset($_FILES['photo3']) ? $_FILES['photo3']['name'] : null;

$uploadOk = true;

if ($uploadOk) {
    $sql = "INSERT INTO tblproducts(name, model, price, photo, year_car) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    if ($stmt === false) {
        die("Error preparing query: " . $mysqli->error);
    }
    $stmt->bind_param("ssdsi", $name, $model, $price, $photo, $year_car);
    $stmt->execute();
    $product_id = $stmt->insert_id;
    $stmt->close();

    $sql2 = "INSERT INTO tblspecs(specID, topspeed, horsepower, accelaration, fuel, transmission, cartype, description, pic, pic2, pic3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt2 = $mysqli->prepare($sql2);
    if ($stmt2 === false) {
        die("Error preparing query: " . $mysqli->error);
    }
    $stmt2->bind_param("iidssssssss", $product_id, $top, $horse, $accel, $fuel, $trans, $cartype, $desc, $pic, $pic2, $pic3);
    $stmt2->execute();
    $stmt2->close();

    $modelPartsJson = json_encode(array_map('trim', $modelParts));

    $sql3 = "INSERT INTO tblparts(id, parts) VALUES (?, ?)";
    $stmt3 = $mysqli->prepare($sql3);
    if ($stmt3 === false) {
        die("Error preparing query: " . $mysqli->error);
    }
    $stmt3->bind_param("is", $product_id, $modelPartsJson);
    $stmt3->execute();
    $stmt3->close();

    $sql4 = "INSERT INTO tblpaths(id, nameModel, Modelpath) VALUES (?, ?, ?)";
    $stmt4 = $mysqli->prepare($sql4);
    if ($stmt4 === false) {
        die("Error preparing query: " . $mysqli->error);
    }
    $stmt4->bind_param("iss", $product_id, $model, $model3d);
    $stmt4->execute();
    $stmt4->close();

    header("Location: A_prod.php");
    exit();
} else {
    echo "File upload failed, product addition aborted.<br>";
}

$mysqli->close();
?>
