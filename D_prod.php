<?php

include 'connect.php';
$id = $_GET['id'];

$sql_specs = "DELETE FROM tblspecs WHERE specID IN (SELECT id FROM tblproducts WHERE id = '$id')";
$result_specs = $mysqli->query($sql_specs);

$sql_products = "DELETE FROM tblproducts WHERE id = '$id'";
$result_products = $mysqli->query($sql_products);

if ($result_specs && $result_products) {
    header("Location: A_prod.php");
} else {
    echo "Error deleting records: " . $mysqli->error;
}

?>
