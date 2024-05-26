<?php
include 'connect.php';
session_start();

if (isset($_POST['control'])) {
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

    $userid = $_SESSION['user_id'];

    $deleteQuery = "DELETE FROM tblfav WHERE userid = ? AND product_id = ?";
    $stmt = $mysqli->prepare($deleteQuery);

    if ($stmt) {
        $stmt->bind_param("ii", $userid, $product_id);

        if ($stmt->execute()) {
            header("Location: profile.php");
            exit(); 
        } else {
            echo "Error deleting favorite: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
