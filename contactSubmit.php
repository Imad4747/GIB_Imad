<?php  
include 'connect.php';

if (isset($_POST['control'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $current_date = date("Y/m/d");

    // Handle file upload
    $file = ''; // Placeholder for file name
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $file = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit(); // Exit to prevent further execution in case of an error
        }
    }

    // Prepare an SQL statement
    $sql = "INSERT INTO tblcontact (firstname, lastname, email, message, file, date_current) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("ssssss", $firstname, $lastname, $email, $message, $file, $current_date);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to a success page
            header("Location: contact_success.php");
            exit(); // Ensure no further code execution after redirection
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $mysqli->error;
    }
} else {
    // If control parameter is not set, redirect to contact page
    header("Location: contact.php");
    exit(); // Ensure no further code execution after redirection
}
?>
