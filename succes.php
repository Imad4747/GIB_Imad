<?php
include 'include.php';
include 'connect.php';
session_start();

$session_id = $_GET['session_id'];

$stripe_key = "sk_test_51Oo51PCD8tQEnwYRNwxU5mymd8eFR2YsMLBQQj04ccjhY9chnU03vBd2wHpyQNOiFGKI0go3CwciDJGvUeHM3SxC00Of5n4EnI";
\Stripe\Stripe::setApiKey($stripe_key);

$checkout_session = \Stripe\Checkout\Session::retrieve($session_id);

if ($checkout_session->payment_status === 'paid') {

    $userid = $_SESSION['user_id'];
    $id = $checkout_session->metadata['product_id'];

    $sql = "SELECT * FROM tblproducts WHERE id = $id";
    $result = $mysqli->query($sql);

    if ($result === FALSE) {
        die("Error executing query: " . $mysqli->error);
    }

    $row = $result->fetch_assoc();

    $total = $checkout_session->amount_total;
    $current_date = date("Y-m-d H:i:s");

    $sql_order = "INSERT INTO tblorder (userid, product, model, totalPrice, date_order) 
                  VALUES ('$userid', '{$row["name"]}', '{$row["model"]}', '$total', '$current_date')";

    if ($mysqli->query($sql_order)) {
        unset($_SESSION['selected_paint_color']);
        unset($_SESSION['paint_price']);

        header("Location: W_prod.php");
        exit();
    } else {
        echo "Error inserting order: " . $mysqli->error;
    }
} else {
    echo "Payment failed.";
}
?>
