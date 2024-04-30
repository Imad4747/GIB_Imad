<?php

include 'connect.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch product details from the database based on the ID
    $sql = "SELECT * FROM tblproducts INNER JOIN tblspecs ON tblproducts.id = tblspecs.specID WHERE id = '$id'";
    $result = $mysqli->query($sql);

    if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Return product details as JSON
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'Product not found'));
    }
} else {
    echo json_encode(array('error' => 'ID parameter is missing'));
}

?>
