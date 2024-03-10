<?php
include 'connect.php';
session_start();
if (isset($_POST['control'])) {
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

    $userid = $_SESSION['user_id']; 
    $deleteQuery = "DELETE FROM tblfav WHERE userid = $userid AND product_id = $product_id";

    if ($mysqli->query($deleteQuery)) {
        header("Location: profile.php");

    } else {
        echo "Error deleting favorite: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
