<?php
include 'include.php';
include 'connect.php';
session_start();

if (!isset($_GET['session_id'])) {
    die("Session ID not provided.");
}

$session_id = $_GET['session_id'];

$stripe_key = getenv('STRIPE_API_KEY');
if ($stripe_key === false) {
    die("Stripe API key not set in environment variables.");
}

\Stripe\Stripe::setApiKey($stripe_key);

try {
    $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);

    if ($checkout_session->payment_status === 'paid') {

        if (!isset($_SESSION['user_id'])) {
            die("User is not logged in.");
        }

        $userid = $_SESSION['user_id'];
        $id = $checkout_session->metadata['product_id'];

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

        $total = $checkout_session->amount_total / 100; 
        $current_date = date("Y-m-d H:i:s");

        $stmt_order = $mysqli->prepare("INSERT INTO tblorder (userid, product, model, totalPrice, date_order) VALUES (?, ?, ?, ?, ?)");
        $stmt_order->bind_param("issss", $userid, $row["name"], $row["model"], $total, $current_date);

        if ($stmt_order->execute()) {
            unset($_SESSION['selected_paint_color']);
            unset($_SESSION['paint_price']);

            header("Location: W_prod.php");
            exit();
        } else {
            echo "Error inserting order: " . $stmt_order->error;
        }

        $stmt_order->close();
    } else {
        echo "Payment failed.";
    }
} catch (\Stripe\Exception\ApiErrorException $e) {
    die("Stripe API error: " . $e->getMessage());
}
?>
