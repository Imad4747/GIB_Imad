<?php
include 'include.php';
include 'connect.php';
session_start();

$userid = $_SESSION['user_id'];
$id = $_GET['id'];

$sql = "SELECT * FROM tblproducts WHERE id = $id";
$result = $mysqli->query($sql);

if ($result === FALSE) {
    die("Error executing query: " . $mysqli->error);
}

$row = $result->fetch_assoc();

$stripe_key = "sk_test_51Oo51PCD8tQEnwYRNwxU5mymd8eFR2YsMLBQQj04ccjhY9chnU03vBd2wHpyQNOiFGKI0go3CwciDJGvUeHM3SxC00Of5n4EnI";
\Stripe\Stripe::setApiKey($stripe_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://gib/GIB_Imad/succes.php?session_id={CHECKOUT_SESSION_ID}",
    "cancel_url" => "http://gib/GIB_Imad/product.php",
    "billing_address_collection" => "required",
    "allow_promotion_codes" => true,
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => $row["price"],
                "product_data" => [
                    "name" => $row["name"],
                    "description" => $row["model"],
                    "images" => ["http://gib/GIB_Imad/images/h.jpg"]
                ]
            ]
        ]
    ],
    "metadata" => [
        "product_id" => $row['id']  
    ]
]);

header("Location: " . $checkout_session->url);
exit;
?>
