<?php
include 'connect.php';

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$role = $_POST['role'];

$sql = "UPDATE tblusers SET firstname = ?, lastname = ?, email = ?, role = ? WHERE id = ?";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssssi", $firstname, $lastname, $email, $role, $id);

    if ($stmt->execute()) {
        header("Location: A_cust.php");
        exit();
    } else {
        echo "Error updating user: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error preparing the update statement: " . $mysqli->error;
}

$mysqli->close();
?>
