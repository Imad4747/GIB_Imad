<?php
session_start(); 
unset($_SESSION['selected_paint_color']);
unset($_SESSION['paint_price']);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <title>Product Page</title>
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    #content {
      flex: 1;
      display: flex;
      overflow-y: auto;
    }

    #sidebar {
      width: 200px;
      background-color: #343a40;
      color: white;
      padding: 15px;
    }

    #main-content {
      flex: 1;
      padding: 15px;
    }

    #footer {
      background-color: #f8f9fa;
      padding: 15px;
      margin-top: auto;
    }
  </style>
</head>
<body>

  <header data-bs-theme="dark">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark border-bottom p-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="" alt="GIB" width="30" height="24">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contacts</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          </form>
          <div class="dropdown text-end">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu dropdown-menu-end text-small">
              <?php  
      if (isset($_SESSION['user_id'])) {
        echo '
    <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="loguit.php">Sign out</a></li>';
      }else{
        echo '<li><a class="dropdown-item" href="login.php">Sign In</a></li>
              <li><a class="dropdown-item" href="register.php">Sign Up</a></li>';
      }
      ?>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <div class="container-fluid">
    <div id="content" class="row">
      <!-- Sidebar---------------------------------------------------- -->
      <nav id="sidebar" class="col-md-3 col-lg-2 sidebar" style="padding-top: 56px;">
        <h4 class="sidebar-heading mt-4 mb-3 text-light">
          Filters
        </h4>
        <ul class="nav flex-column mb-4">
          <li class="nav-item mb-2">
            <h6 class="sidebar-heading mb-1 text-light">
              Car Brands
            </h6>
            <label for="selectedBrand">Select Brand:</label>
<select class="form-select" id="selectedBrand" name="selectedBrand">
    <option value=""></option>
    <?php
    include "connect.php";
    $sql = "SELECT * FROM tblbrands";
    $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()) { 
        echo '<option value="'.$row["id"].'">'.$row["brands"].'</option>';
    }
    ?>
</select>


          </li>
          <li class="nav-item mb-2">
            <h6 class="sidebar-heading mb-1 text-light">
              Car Types
            </h6>
            <div class="btn-group-vertical">
              <?php include "connect.php";
                $sql = "SELECT * FROM tblcartype";
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()) { 
                  echo '<button type="button" class="btn btn-primary">'.$row["model"].'</button>';
                }
                ?>
            </div>
          </li>
          <li class="nav-item mb-2">
            <h6 class="sidebar-heading mb-1 text-light">
              Price Range
            </h6>
            <div class="input-group mb-2">
              <span class="input-group-text" id="minPriceLabel">Min</span>
              <input type="number" id="minPrice" class="form-control" placeholder="Min Price" aria-label="Min Price" aria-describedby="minPriceLabel" value="0">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="maxPriceLabel">Max</span>
              <input type="number" id="maxPrice" class="form-control" placeholder="Max Price" aria-label="Max Price" aria-describedby="maxPriceLabel">
            </div>
          </li>
          <li class="nav-item mb-2">
            <h6 class="sidebar-heading mb-1 text-light">
              Fuel
            </h6>
           <?php
include "connect.php";
$sql = "SELECT * FROM tblfuel";
$result = $mysqli->query($sql);
while ($row = $result->fetch_assoc()) { 
    echo '<div class="form-check">
            <input class="form-check-input" type="checkbox" value="" name="fuelCheckbox" id="fuelCheckbox_'.$row["id"].'">
            <label class="form-check-label text-white">
                '.$row["fuel"].'
            </label>
          </div>';
}
?>

          </li>
          <li class="nav-item mb-2">
            <h6 class="sidebar-heading mb-1 text-light">
              Transmission
            </h6>
            <?php include "connect.php";
                $sql = "SELECT * FROM tbltransmission";
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()) { 
                  echo '<div class="form-check">
              <input class="form-check-input" type="radio" name="radioTransmission" >
              <label class="form-check-label text-white">
                '.$row["transmission"].'
              </label>
            </div>';
                }
                ?>
          </li>
        </ul>
      </nav>
      <!-- Main content -->
      <main id="main-content" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Product Page</h1>
        </div>

        <!-- Centered Search Bar ---------------------------------->
     <div class="d-flex justify-content-center mb-4">
        <input type="text" class="form-control mr-2" style="width: 930px;" placeholder="Search..." name="search" id="searchinput">
    
</div>




        

        <div class="container">
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="filteredResultsContainer">
    
    
  </div>
</div>

      </main>
    </div>
  </div>

  <footer id="footer" class="text-center p-3 bg-dark text-light">
     <div class="row">
      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
        </ul>
      </div>

      <div class="col-md-5 offset-md-1 mb-3">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of what's new and exciting from us.</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
      <p>&copy; 2023 Company, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
      </ul>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script>
    $(document).ready(function() {
        function applyFilters() {
            var searchBar = $("#searchinput").val();
            var selectedBrand = $("#selectedBrand option:selected").text();
            var selectedType = $(".btn-group-vertical .btn.active").text();
            var minPrice = $("#minPrice").val();
            var maxPrice = $("#maxPrice").val();
            var transmission = $("input[name='radioTransmission']:checked").next('label').text();

            var selectedFuelTypes = [];
            $("input[name='fuelCheckbox']:checked").each(function() {
                selectedFuelTypes.push($(this).next('label').text());
            });

            $.ajax({
                url: "filter.php",
                type: "POST",
                data: {
                    selectedType: selectedType,
                    minPrice: minPrice,
                    maxPrice: maxPrice,
                    transmission: transmission,
                    selectedFuelTypes: selectedFuelTypes,
                    selectedBrand: selectedBrand,
                    searchBar: searchBar
                },
                success: function(response) {
                    console.log("AJAX response:", response);
                    $("#filteredResultsContainer").html(response);
                },
                error: function(error) {
                    console.error("AJAX request failed: " + error.statusText);
                }
            });
        }

      
        $("#selectedBrand").change(applyFilters);
        $(".btn-group-vertical .btn").click(function() {
            $(".btn-group-vertical .btn").removeClass("active");
            $(this).addClass("active");
            applyFilters();
        });

        $("#minPrice, #maxPrice").on('input', function() {
            applyFilters();
        });

        $("#searchinput").on('input', function() {
            applyFilters();
        });

        $("input[name='fuelCheckbox']").change(applyFilters);
        $("input[name='radioTransmission']").change(applyFilters);

        $("#filteredResultsContainer").on('click', '.btn-primary', function() {
            var carId = $(this).data('car-id');
            window.location.href = 'cars.php?id=' + carId;
        });
          window.addFavorite = function(productId, userId) {
            $.ajax({
                url: "insert-fav.php",
                type: "POST",
                data: { productId: productId, userId: userId },
                success: function(response) {
                    console.log("Favorite added successfully");
                    $("#star-" + productId).toggleClass("text-warning");
                },
                error: function(error) {
                    console.error("Failed to add favorite: " + error.statusText);
                }
            });
        };

        applyFilters();
    });
</script>



</body>
</html>
