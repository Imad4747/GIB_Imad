<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="contact.css">
    
</head>

<body>
	<div class="navbar">
    <div class="top-navbar">

      <div class="search-bar">
        <input type="text" placeholder="Search">

      </div>

       
    </div>
    <div class="bottom-navbar">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="product.php">Product</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="loguit.php"><i class='bx bx-log-out' ></i></a><li>
            
      </ul>
    </div>
  </div>
    <div class="contact-section">
        <div class="contact-form">
            <h2>Contact Us</h2>
          <?php
include 'connect.php';

if (isset($_POST['control'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $file = $_POST['file'];
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO tblcontact (firstname, lastname, email, message, file, date) VALUES (?,?,?,?,?,?)";
    $resultaat = $mysqli->prepare($sql);

    if (!$resultaat) {
        die("Error in query preparation: " . $mysqli->error);
    }

    $resultaat->bind_param("ssssss", $firstname, $lastname, $email, $message, $file, $date);

    if ($resultaat->execute()) {
        header("Location: contact.php?success=1");
        exit();
    } else {
        echo "Error: " . $resultaat->error;
    }

    $resultaat->close();
    $mysqli->close();
} else {
       echo ' <form action="contact.php" method="post">
                <label>First Name:</label>
                <input type="text" id="firstname" name="firstname" required>

                <label>Last Name:</label>
                <input type="text" id="lastname" name="lastname" required>

                <label>Email:</label>
                <input type="email" id="email" name="email" required>

                <label>Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <label>Upload File:</label>
                <input type="file" id="file" name="file">

                <button type="submit" name="control">Submit</button>
            </form>';
}

if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<div class="alert">
   
  <strong>Succes!</strong> You have been succesfully registered.
</div>';
}
?>

        </div>
    </div>

<footer class="footer-section">
    <div>
      <h3>Our information</h3>
      <ul>
        <li>4747 - Bergenland</li>
        <li>Bergstad 5867</li>
        <li>123-456-789</li>
      </ul>
    </div>

    <div>
      <h3>About Us</h3>
      <ul>
        <li><a href="#">Support Center</a></li>
        <li><a href="#">Customer Support</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Copy Right</a></li>
      </ul>
    </div>

    <div>
      <h3>Product</h3>
      <ul>
        <li><a href="#">Suv cars</a></li>
        <li><a href="#">Coupés </a></li>
        <li><a href="#">Electric</a></li>
        <li><a href="#">Newest</a></li>
      </ul>
    </div>

    <div>
      <h3>Social</h3>
      <ul>
        <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
          <i class='bx bxl-facebook'></i>
        </a>

        <a href="https://twitter.com/" target="_blank" class="footer__social-link">
          <i class='bx bxl-twitter'></i>
        </a>

        <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
          <i class='bx bxl-instagram'></i>
        </a>
      </ul>
    </div>

  </footer>


</body>

</html>
