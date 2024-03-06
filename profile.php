<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Favorite Products</h5>
            <ul>
                <li>Product 1</li>
                <li>Product 2</li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Orders</h5>
            <ul>
                <li>Order #1 - Date: [Order Date], Total: [Order Total]</li>
                <li>Order #2 - Date: [Order Date], Total: [Order Total]</li>
            </ul>
        </div>
    </div>
</div>

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
