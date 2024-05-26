<?php  
include 'connect.php';

$id = $_GET['iduser'];

$sql = "DELETE tblusers, tblfav FROM tblusers INNER JOIN tblfav ON tblusers.id = tblfav.userid WHERE tblusers.id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

$sql2 = "DELETE FROM tblfav WHERE userid = ?";
$stmt2 = $mysqli->prepare($sql2);
$stmt2->bind_param("i", $id);
$stmt2->execute();
$stmt2->close();

$mysqli->close();

header("Location: A_cust.php");
?>
