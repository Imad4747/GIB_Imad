<?php
include 'include.php';
include 'connect.php'; 
 $id = $_GET['id'];

$sql = "SELECT * FROM tblproducts WHERE id = $id";
$result = $mysqli->query($sql);
if ($result === NULL) {
    die("Error executing query: " . $mysqli->error);
}
$row = $result -> fetch_assoc();

$stripe_key = "sk_test_51Oo51PCD8tQEnwYRNwxU5mymd8eFR2YsMLBQQj04ccjhY9chnU03vBd2wHpyQNOiFGKI0go3CwciDJGvUeHM3SxC00Of5n4EnI";
\Stripe\Stripe::setApiKey($stripe_key);
$checkout_session = \Stripe\Checkout\Session::create([

"mode" => "payment",
"success_url" => "https://localhost/succes.php",
"line_items" => [
	[
"quantity" => 1,
"price_data" => [
"currency" => "usd",
"unit_amount" => $row["price"],
"product_data" => [
"name" => $row["name"]

] 
]
	]
]


]);
http_response_code(303);
header("Location: " . $checkout_session->url);
  ?>