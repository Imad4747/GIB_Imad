<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>User Dashboard</title>
    <style>
        body {
            padding-top: 56px; 
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
              <?php session_start(); 
      if (isset($_SESSION['user_id'])) {
        echo '<li><a class="dropdown-item" href="#">New project...</a></li>
    <li><a class="dropdown-item" href="#">Settings</a></li>
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

<div class="container mt-4">
    <h2>Welcome, <?php include 'connect.php'; 
    $sql = "SELECT firstname FROM tblusers WHERE id=".$_SESSION['user_id']."";
    $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      echo $row["firstname"];
    }

     ?></h2>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Personal Information</h5>
            <p class="card-text">Email: <?php 
            $sql = "SELECT email FROM tblusers WHERE id=".$_SESSION['user_id']."";  
            $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      echo $row["email"];
    } ?><br>Firstname: <?php 
            $sql = "SELECT firstname FROM tblusers WHERE id=".$_SESSION['user_id']."";  
            $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      echo $row["firstname"];
    } ?><br>Lastname: <?php 
            $sql = "SELECT lastname FROM tblusers WHERE id=".$_SESSION['user_id']."";  
            $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      echo $row["lastname"];
    } ?></p>
            <a href="#" class="btn btn-primary" onclick="formModal()">Edit Profile</a>
        </div>
    </div>


<h4>Favorites</h4>
<div class="mb-4">
  <div class="row">
    <?php
    $userid = $_SESSION['user_id']; 

    $sql = "SELECT * FROM tblproducts
        INNER JOIN tblspecs INNER JOIN tblfav ON tblproducts.id = tblspecs.specID 
        WHERE tblfav.userid = $userid AND tblfav.product_id = tblproducts.id ";

$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
  echo ' 
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card position-relative">
            <form method="post" action="delete-fav.php">
             <input type="hidden" name="product_id" value="'.$row["id"].'"/>
                <button type="submit" name="control" class="btn btn-danger position-absolute top-0 end-0" style="margin-right: 5px; margin-top: 8px; cursor: pointer; font-size: 10px">Delete</button></form>

                <h3 class="year position-absolute top-0 start-1" style="margin-left: 5px; margin-start: 5px; font-size: 16px;">'.$row["year"].'</h3>
                <div class="card-body">
                    <h3 class="card-title text-center">Product '.$row["name"].'</h3>
                    <h5 class="card-subtitle text-center mb-2 text-muted">' .$row["model"].'</h5>
                    <div class="card-body text-center">
                        <img src="images/'.$row['photo'].'" class="card-img-top img-fluid" style="width: 120px;" alt="Product Image">
                    </div>
                    <div class="datagroup d-flex justify-content-around align-items-center mt-2">
                        <div class="data text-center">
                            <i class="bx bx-stopwatch" style="font-size: 20px; color: #0043ff;"></i>
                            <br>
                            <span class="spec" style="font-weight: bold;">'.$row["accelaration"].'s</span>
                        </div>
                        <div class="data text-center">
                            <i class="bx bx-line-chart" style="font-size: 20px; color: #39ad5e;"></i>
                            <br>
                            <span class="spec" style="font-weight: bold;">' .$row["topspeed"].' km/h</span>
                        </div>
                        <div class="data text-center">
                            <i class="bx bxs-gas-pump" style="font-size: 20px; color: #dc1e4d;"></i>
                            <br>
                            <span class="spec" style="font-weight: bold;">'.$row["fuel"].' </span>
                        </div>
                    </div>
                    <h5 class="card-text text-center mt-3">$ '.$row["price"].' </h5>
                    <div class="text-center">
                        <button class="btn btn-primary" data-car-id="'.$row["id"].'; ?>">View Details</button>
                    </div>
                </div>
            </div>
        </div>
    ';
}
 ?>
    </div>
</div>





<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">Orders</h5>
        <ul class="list-group">
            <?php
            $sql = "SELECT * FROM tblorder WHERE userid=" . $_SESSION['user_id'];
            $result = $mysqli->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo '<li class="list-group-item">';
                echo '<strong>Order #: </strong>' . $row["order_id"];
                echo ' - <strong>Date: </strong>' . $row["date_order"];
                echo ' - <strong>Total: $</strong>' . $row["totalPrice"];
                echo '<br>';
                echo '<strong>Product: </strong>' . $row["product"];
                echo ' - <strong>Model: </strong>' . $row["model"];
                echo '</li>';
            }
            ?>
        </ul>
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



<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Edit Your Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="update_info.php" method="post">
                    <?php 
                        $sql = "SELECT email, firstname, lastname FROM tblusers WHERE id=".$_SESSION['user_id']."";  
                        $result = $mysqli->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            $email = $row["email"];
                            $firstName = $row["firstname"];
                            $lastName = $row["lastname"];
                        } 
                    ?>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>
                    </div>
                    
                     <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="control">Update Info</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
                </form>
            </div>

        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
  function formModal() {
    $(document).ready(function(){
                    $("#loginModal").modal("show");
                });
  }
</script>
</body>
</html>
