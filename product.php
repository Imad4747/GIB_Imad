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
    <i id="up-down" class="fas fa-chevron-down"></i>
</button>
<div class="content">
  <label class="custom-label">Select Brand:</label>
<select class="custom-select" id="brand">
    <option value="Toyota">Toyota</option>
    <option value="Honda">Honda</option>
    <option value="Ford">Ford</option>
</select>

<label class="custom-label">Select Model:</label>
<select class="custom-select" id="model">
    <option value="Camry">Camry</option>
    <option value="Civic">Civic</option>
    <option value="Fusion">Fusion</option>
</select>
<label>Car Type: </label>
        <div class="car-types">
            <a href="#sedan">Sedan</a>
            <a href="#">SUV</a>
            <a href="#">Wagon</a>
            <a href="#">Cabrio</a>
            <a href="#">Coupe</a>
         
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
            <label><input type="checkbox" name="fuelType" value="Diesel"> Diesel</label>
             <br>
            <label><input type="checkbox" name="fuelType" value="Benzine"> Benzine</label>
             <br>
            <label><input type="checkbox" name="fuelType" value="Electric"> Electric</label>
        </div>
          <div class="transmission-type-radio">
            <label>Transmission Type:</label>
             <br>
            <label><input type="radio" name="transmissionType" value="Automatic"> Automatic</label>
             <br>
            <label><input type="radio" name="transmissionType" value="Manual"> Manual</label>
        </div>

</div>

<button class="collapsible">
  <i class='bx bxs-palette'></i>
    <span>Color</span>
    <i id="up-down" class="fas fa-chevron-down"></i>
</button>
<div class="content">
      <label class="custom-label">Select Color:</label>
<select class="custom-select" id="color">
    <option value="Toyota">Red</option>
    <option value="Honda">Blue</option>
    <option value="Ford">Green</option>
</select>

</div>
  </div>

  <section>
    <div class="search-bar">
      <form action="searh.php" method="get">
        <input type="text" placeholder="Search" class="search-input"> 
        
      </form>
  
</div>

     

    <div class="product-table">
      <?php
      include 'connect.php'; 
      $sql = "SELECT * FROM tblproducts,tblspecs WHERE id = specID ";
          $result = $mysqli -> query($sql);
          
while ($row = $result->fetch_assoc()) {
    echo '<div class="product-card">
        <span class="favorite">&#9733;</span>
        <h1 class="title">' . $row['name'] . '</h1>
        <h3 class="subtitle">' . $row['model'] . '</h3>
        <h3 class="year">' . $row['year'] . '</h3>
        <img class="image" src="images/' . $row['photo'] . '" width="160px">
        <div class="datagroup">
            <div class="data">
                <i class="bx bx-timer"></i>
                <h3 class="spec">' . $row['accelaration'] . ' s</h3>
            </div>
            <div class="data">
                <i class="bx bx-line-chart"></i>
                <h3 class="spec"> ' . $row['topspeed'] . ' km/h</h3>
            </div>
            <div class="data">
                <i class="bx bxs-gas-pump"></i>
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
<script type="text/javascript">
   var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>
</body>
</html>
