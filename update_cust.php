<?php
include 'connect.php'; 

 $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $sql = "UPDATE tblusers SET firstname='$firstname', lastname='$lastname', email='$email', role='$role' WHERE id='$id'";
    if ($mysqli->query($sql) === TRUE) {
        header("Location: A_cust.php");
        exit();
    } else {
        echo "Error updating product: " . $mysqli->error;
    }

    $mysqli->close();


?>