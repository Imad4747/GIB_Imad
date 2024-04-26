<?php

include 'connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM tblorder WHERE order_id = '$id'";
$result = $mysqli->query($sql);
header("Location: A_order.php");



  ?>