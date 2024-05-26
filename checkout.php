<?php
include 'include.php';
include 'connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("User is not logged in.");
}

$userid = $_SESSION['user_id'];

if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    die("Invalid product ID.");
}

$id = $_GET['id'];

$stmt = $mysqli->prepare("SELECT * FROM tblproducts WHERE id = ?");
$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    die("Error executing query: " . $stmt->error);
}

$result = $stmt->get_result();
if ($result->num_rows === 0) {
    die("Product not found.");
}

$row = $result->fetch_assoc();
$stmt->close();

$selectedPaintColor = isset($_SESSION['selected_paint_color']) ? $_SESSION['selected_paint_color'] : 'default_color';
$paintPrice = isset($_SESSION['paint_price']) ? $_SESSION['paint_price'] : 0;
$totalPrice = $row["price"] + $paintPrice;

$stripe_key = getenv('STRIPE_API_KEY');
if ($stripe_key === false) {
    die("Stripe API key not set in environment variables.");
}

\Stripe\Stripe::setApiKey($stripe_key);

try {
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
                    "unit_amount" => $totalPrice * 100,
                    "product_data" => [
                        "name" => $row["name"],
                        "description" => $row["model"],
                        "images" => ["http://gib/GIB_Imad/images/h.jpg"]
                    ]
                ]
            ]
        ],
        "metadata" => [
            "product_id" => $row['id'],
            "selected_paint_color" => $selectedPaintColor,
            "paint_price" => $paintPrice,
            "total_price" => $totalPrice
        ]
    ]);

    header("Location: " . $checkout_session->url);
    exit;
} catch (\Stripe\Exception\ApiErrorException $e) {
    die("Stripe API error: " . $e->getMessage());
}
?>
