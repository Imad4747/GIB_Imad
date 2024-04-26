<?php  
include 'connect.php';
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);
$role = $_POST['role'];
$sql = "INSERT INTO tblusers(firstname, lastname, email, password, role) VALUES ('$firstname', '$lastname', '$email', '$password', '$role')";

$result = $mysqli->query($sql);
if ($result === false) {
        die("Error adding : " . $mysqli->error);
    }
    header("Location: A_cust.php");
    
$mysqli->close();

?>