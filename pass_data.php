<?php
session_start();

$selectedPaintColor = $_GET['selected_paint_color'];
$paintPrice = $_GET['paint_price'];

$_SESSION['selected_paint_color'] = $selectedPaintColor;
$_SESSION['paint_price'] = $paintPrice;



echo "Session variables set successfully.";
?>
