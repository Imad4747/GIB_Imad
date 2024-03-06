<?php
session_start();
include 'connect.php';
if (isset($_POST['control'])) {
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $userId = $_SESSION['user_id'];

    $sql = "UPDATE tblusers SET email='$email', firstname='$firstName', lastname='$lastName' WHERE id=$userId";

    if ($mysqli->query($sql)) {
        header("Location: profile.php"); 
        exit();
    } else {
        echo "Error updating user information: " . $mysqli->error;
    }

    $mysqli->close(); 
}
?>
