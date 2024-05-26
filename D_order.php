<?php
include 'connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM tblorder WHERE order_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();

$mysqli->close();

header("Location: A_order.php");
exit();
?>
