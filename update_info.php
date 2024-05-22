<?php
session_start();
include 'connect.php';

if (isset($_POST['control'])) {
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $userId = $_SESSION['user_id'];

    $stmt = $mysqli->prepare("UPDATE tblusers SET email = ?, firstname = ?, lastname = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("sssi", $email, $firstName, $lastName, $userId);

        if ($stmt->execute()) {
            header("Location: profile.php");
            exit();
        } else {
            echo "Error updating user information: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing the update statement: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
