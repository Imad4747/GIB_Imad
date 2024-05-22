<?php
include 'connect.php';

$userId = isset($_POST['userId']) ? intval($_POST['userId']) : 0; 
$productId = isset($_POST['productId']) ? intval($_POST['productId']) : 0; 
if ($userId <= 0 || $productId <= 0) {
    echo "Invalid input";
    exit; 
}

$insertQuery = "INSERT INTO tblfav (userid, product_id) VALUES (?, ?)";
$stmt = $mysqli->prepare($insertQuery);

if ($stmt) {
    $stmt->bind_param("ii", $userId, $productId);

    if ($stmt->execute()) {
        echo "Favorite added successfully";
    } else {
        echo "Error adding favorite";
    }

    $stmt->close();
} else {
    echo "Error preparing statement";
}

$mysqli->close();
?>
