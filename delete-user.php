<?php  
include 'connect.php';

$id = $_POST['id'];
$sql = "DELETE FROM tblusers WHERE id = '$id'";
$result = $mysqli->query($sql);
header("Location: A_cust.php");
?>