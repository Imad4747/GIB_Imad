<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="product.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
 


</head>
<body>

<header>
   <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="product.php">Product</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="loguit.php"><i class='bx bx-log-out' ></i></a><li>   
      </ul>
</header>


<main>
  <div class="sidebar">
   <button class="collapsible">
    <i class='bx bxs-car'></i>
    <span>Basic Specs</span>
    <i class="fas fa-chevron-down"></i>
</button>
<div class="content">
  <label class="custom-label">Select Brand:</label>
<select class="custom-select" id="brand">
  <?php  

include 'connect.php';
$sql6 = "SELECT DISTINCT name FROM tblproducts";
$result6 = $mysqli->query($sql6);
while ($row6 = $result6->fetch_assoc()) {
  echo '<option>'.$row6['name'].'</option>
';
}
?>
</select>

<label class="custom-label">Select Model:</label>
<select class="custom-select" id="model">
  <?php  

include 'connect.php';
$sql5 = "SELECT model FROM tblproducts";
$result5 = $mysqli->query($sql5);
while ($row5 = $result5->fetch_assoc()) {
  echo '<option>'.$row5['model'].'</option>
';
}
?>
</select>
<label>Car Type: </label>
<div class="car-types">
<?php  

include 'connect.php';
$sql4 = "SELECT * FROM tblcartype";
$result4 = $mysqli->query($sql4);
while ($row4 = $result4->fetch_assoc()) {
  echo '<a href="#">'.$row4['model'].'</a>';
}


?>
        </div>
</div>

<button class="collapsible">
  <i class='bx bxs-calculator'></i>
    <span>Price</span>
    <i id="up-down" class="fas fa-chevron-down"></i>
</button>
<div class="content">
     <label for="price-range">Price Range:</label>
        <input type="range" id="price-range" min="0" max="50000" step="1000" value="25000">
        <div class="price-range-label">
            <span>Min Price: $0</span>
            <spand>Max Price: $50,000</span>
        </div>
</div>

<button class="collapsible">
  <i  class='bx bxs-wrench'></i>
    <span>Motor</span>
    <i id="up-down" class="fas fa-chevron-down"></i>
</button>
<div class="content">
  <div class="fuel-type-checkboxes">
            <label>Fuel Type:</label>
            <br>
     
  <?php  
  include 'connect.php';
$sql2 = "SELECT * FROM tblfuel";
$result2 = $mysqli->query($sql2);
while ($row2 = $result2->fetch_assoc()) {
  echo ' <label><input type="checkbox" name="fuelType"> '.$row2['fuel'].'</label>
             <br>';
}

  ?>
        </div>
        <div class="transmission-type-radio">
            <label>Transmission Type:</label>
             <br>
        <?php 

include 'connect.php';
$sql3 = "SELECT * FROM tbltransmission";
$result3 = $mysqli->query($sql3);
while ($row3 = $result3->fetch_assoc()) {
  echo '  <label><input type="radio" name="transmissionType">'.$row3['transmission'].'</label>
             <br>';
}
         ?>
        </div>
</div>

<button class="collapsible">
  <i class='bx bxs-palette'></i>
    <span>Color</span>
    <i id="up-down" class="fas fa-chevron-down"></i>
</button>
<div class="content">
  <select class="custom-select" id="color">
      <label class="custom-label">Select Color:</label>

  <?php  
  include 'connect.php';
$sql1 = "SELECT * FROM tblcolor";
$result1 = $mysqli->query($sql1);
while ($row1 = $result1->fetch_assoc()) {
  echo '<option>'.$row1['color'].'</option>';
}

  ?>
    
</select>

</div>
  </div>

  <section>
    <div class="search-bar">
      <form action="" method="get">
        <input type="text" placeholder="Search" class="search-input" name="search"> 
      </form>
  
</div>

     

  <div class="product-table">
    <?php
include 'connect.php';

$sql = "SELECT * FROM tblproducts, tblspecs WHERE id = specID";

$searchInput = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($searchInput)) {
    $sql .= " AND (name LIKE '%$searchInput%' OR model LIKE '%$searchInput%')";
}



$result = $mysqli->query($sql);


while ($row = $result->fetch_assoc()) {
    echo '<div class="product-card">
            <span class="favorite">&#9733;</span>
            <h1 class="title">' . $row['name'] . '</h1>
            <h3 class="subtitle">' . $row['model'] . '</h3>
            <h3 class="year">' . $row['year'] . '</h3>
            <img class="image" src="images/' . $row['photo'] . '" width="160px">
            <div class="datagroup">
                <div class="data">
                    <i class="bx bxs-timer" style="color:#0043ff"></i>
                    <h3 class="spec">' . $row['accelaration'] . ' s</h3>
                </div>
                <div class="data">
                    <i class="bx bx-line-chart" style="color:#39ad5e"></i>
                    <h3 class="spec"> ' . $row['topspeed'] . ' km/h</h3>
                </div>
                <div class="data">
                    <i class="bx bxs-gas-pump" style="color:#dc1e4d"></i>
                    <h3 class="spec">' . $row['fuel'] . '</h3>
                </div>
            </div>
            <h3 class="price">$' . $row['price'] . '.00</h3>
            <button class="view-button">View Details</button>
        </div>';
}

?>

   
</div>
  </section>
</main>

<footer>
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
    
    <script src="script.js"></script> 

</body>
</html>
