<?php  
include 'connect.php';
$userid = $_POST['userid'];
$product = $_POST['product'];
$model = $_POST['model'];
$totalPrice = $_POST['totalprice'];
$date_order = $_POST['date'];
$sql = "INSERT INTO tblorder(userid, product, model, totalPrice, date_order) VALUES ('$userid', '$product', '$model', '$totalPrice', '$date_order')";
echo $sql;
$result = $mysqli->query($sql);
if ($result === false) {
        die("Error adding : " . $mysqli->error);
    }
    header("Location: A_order.php");
    
$mysqli->close();

?>