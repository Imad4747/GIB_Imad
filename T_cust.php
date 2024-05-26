<?php  
include 'connect.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

$password_hashed = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO tblusers (firstname, lastname, email, password, role) VALUES (?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssss", $firstname, $lastname, $email, $password_hashed, $role);

    if ($stmt->execute()) {
        header("Location: A_cust.php");
        exit(); 
    } else {
        die("Error adding user: " . $stmt->error);
    }

    $stmt->close();
} else {
    die("Error preparing statement: " . $mysqli->error);
}

$mysqli->close();
?>
