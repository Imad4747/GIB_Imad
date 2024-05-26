<?php  
include 'connect.php';

$userid = $_POST['userid'];
$product = $_POST['product'];
$model = $_POST['model'];
$totalPrice = $_POST['totalprice'];
$date_order = $_POST['date'];

$sql = "INSERT INTO tblorder (userid, product, model, totalPrice, date_order) VALUES (?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    $stmt->bind_param("issss", $userid, $product, $model, $totalPrice, $date_order);

    if ($stmt->execute()) {
        header("Location: A_order.php");
        exit(); 
    } else {
        die("Error adding order: " . $stmt->error);
    }

    $stmt->close();
} else {
    die("Error preparing statement: " . $mysqli->error);
}

$mysqli->close();
?>
