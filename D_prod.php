<?php

include 'connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM tblproducts INNER JOIN tblspecs ON tblproducts.id = tblspecs.specID WHERE id = '$id'";
$result = $mysqli->query($sql);
header("Location: A_prod.php");



  ?>