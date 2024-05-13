<?php

include 'connect.php';
$id = $_GET['id'];

$sql_specs = "DELETE FROM tblspecs WHERE specID IN (SELECT id FROM tblproducts WHERE id = '$id')";
$result_specs = $mysqli->query($sql_specs);

$sql_products = "DELETE FROM tblproducts WHERE id = '$id'";
$result_products = $mysqli->query($sql_products);
$sql_parts = "DELETE FROM tblparts WHERE id = '$id'";
$result_parts = $mysqli->query($sql_parts);
$sql_paths = "DELETE FROM tblpaths WHERE id = '$id'";
$result_paths = $mysqli->query($sql_paths);

if ($result_specs && $result_products && $result_parts && $result_paths) {
    header("Location: A_prod.php");
} else {
    echo "Error deleting records: " . $mysqli->error;
}

?>
