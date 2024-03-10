<?php
include 'connect.php';

$userId = trim($_POST['userId'] ?? '');
$productId = trim($_POST['productId'] ?? '');

if ($userId && $productId) {
    $insertQuery = "INSERT INTO tblfav (userid, product_id) VALUES ('$userId', '$productId')";
    $result = $mysqli->query($insertQuery);

    if ($result === false) {
        die("Error adding favorite: " . $mysqli->error);
    }

    echo "Favorite added successfully";
} else {
    echo "error";
}

$mysqli->close();
?>
