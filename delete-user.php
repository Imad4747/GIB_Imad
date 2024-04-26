<?php  
include 'connect.php';

$id = $_GET['iduser'];
$sql = "DELETE FROM tblusers WHERE id = '$id'";
$result = $mysqli->query($sql);
header("Location: A_cust.php");
?>