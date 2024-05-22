<?php
include 'connect.php';

if(isset($_GET['id'])) {
    $contactId = $_GET['id'];

    $sql = "DELETE FROM tblcontact WHERE id = ?";

    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('i', $contactId);

        if ($stmt->execute()) {
            header("Location: A_rep.php");
            exit(); 
        } else {
            echo "Error deleting contact: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
