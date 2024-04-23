<?php

include 'connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM tblproducts WHERE id = '$id'";
$result = $mysqli->query($sql);
header("Location: A_prod.php");



  ?>