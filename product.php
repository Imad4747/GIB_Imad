<!DOCTYPE html>
<html>
<head>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="product.css">
    <title>Product Page </title>
    
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
  
 
   
    <div class="content">
        <h1>Product Page</h1>
          <div class="catalog-container">
  <div class="search-bar1">
    <input type="text" id="search1" placeholder="Enter search term">
  </div>

  <div class="search-bar1">
    <input type="text" id="search2" placeholder="Enter search term">
  </div>

  <div class="dropdown-menu">
    <select id="dropdown1">
      <option value="option1">Option 1</option>
      <option value="option2">Option 2</option>
    </select>
  </div>

  <div class="dropdown-menu">
    <select id="dropdown2">
      <option value="optionA">Option A</option>
      <option value="optionB">Option B</option>
      <option value="optionC">Option C</option>
    </select>
  </div>
</div>
 
        <div class="products">
          
            <?php 
            include 'connect.php';
            $sql = "SELECT * FROM tblproducts JOIN tblspecs ON (tblproducts.id = tblspecs.specID)";
            $resultaat = $mysqli->query($sql);
                while ($row = $resultaat->fetch_assoc()) {
                    echo '<div class="product-card">
            <h1 class="title">'.$row['name'].'</h1>
            <h3 class="subtitle">'.$row['model'].'</h3>
                <h3 class="year">'.$row['year'].'</h3>

            <img  class="image" src="images/'.$row['photo'].'" width="160px">
            <div class="datagroup">
           <div class="data"> 
                <i class="bx bx-timer"></i>'.$row['accelaration'].' s
              </div>
              <div class="data">
                <i class="bx bx-line-chart"></i>'.$row['topspeed'].' km/h
              </div>
              <div class="data">
                <i class="bx bxs-gas-pump"></i>'.$row['fuel'].'
              </div>
              </div>
            <h3 class="price">$'.$row['price'].'.00</h3>
            <button><i class="bx bxs-shopping-bag-alt"></i></button>
        </div>
        ';}

             ?>
        </div>
    </div>

<!-- -----footer-------------------------------------------------------------- -->
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
