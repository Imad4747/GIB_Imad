<?php

include 'connect.php';

$id = $_GET['id'];

$sql_specs = "DELETE FROM tblspecs WHERE specID IN (SELECT id FROM tblproducts WHERE id = ?)";
$stmt_specs = $mysqli->prepare($sql_specs);
$stmt_specs->bind_param("i", $id);
$stmt_specs->execute();
$result_specs = $stmt_specs->affected_rows;
$stmt_specs->close();

$sql_products = "DELETE FROM tblproducts WHERE id = ?";
$stmt_products = $mysqli->prepare($sql_products);
$stmt_products->bind_param("i", $id);
$stmt_products->execute();
$result_products = $stmt_products->affected_rows;
$stmt_products->close();

$sql_parts = "DELETE FROM tblparts WHERE id = ?";
$stmt_parts = $mysqli->prepare($sql_parts);
$stmt_parts->bind_param("i", $id);
$stmt_parts->execute();
$result_parts = $stmt_parts->affected_rows;
$stmt_parts->close();

$sql_paths = "DELETE FROM tblpaths WHERE id = ?";
$stmt_paths = $mysqli->prepare($sql_paths);
$stmt_paths->bind_param("i", $id);
$stmt_paths->execute();
$result_paths = $stmt_paths->affected_rows;
$stmt_paths->close();

if ($result_specs > 0 && $result_products > 0 && $result_parts > 0 && $result_paths > 0) {
    header("Location: A_prod.php");
} else {
    echo "Error deleting records: " . $mysqli->error;
}

$mysqli->close();

?>
