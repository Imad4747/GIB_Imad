<?php
include 'include.php';
include 'connect.php'; 

$id = $_GET['id'];

$sql = "SELECT * FROM tblproducts WHERE id = $id";
$result = $mysqli->query($sql);

if ($result === NULL) {
    die("Error executing query: " . $mysqli->error);
}

$row = $result->fetch_assoc();

$stripe_key = "sk_test_51Oo51PCD8tQEnwYRNwxU5mymd8eFR2YsMLBQQj04ccjhY9chnU03vBd2wHpyQNOiFGKI0go3CwciDJGvUeHM3SxC00Of5n4EnI";
\Stripe\Stripe::setApiKey($stripe_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://gib/GIB_Imad/succes.php",
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
    ]
]);

$order_id = $checkout_session->id;
$total = $checkout_session->amount_total;
$current_date = date("Y-m-d H:i:s"); 

$sql_order = "INSERT INTO tblorders (order_id, userid, product, model, totalPrice, date_) 
                    VALUES ('$order_id', '$amount_paid', '$current_date', '{$row["name"]}', '{$row["model"]}')";

if ($mysqli->query($sql_insert_order)) {
    echo "order succes.";
} else {
    echo "error: " . $mysqli->error;
}



header("Location: succes.php");
exit();
?>

<!-- <?php
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
"success_url" => "http://gib/GIB_Imad/succes.php",
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
]


]);
http_response_code(303);
header("Location: " . $checkout_session->url);
  ?> -->