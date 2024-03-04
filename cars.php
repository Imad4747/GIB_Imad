<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<title></title>
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
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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

<?php 
include 'connect.php'; 
$id = $_GET['id'];
$sql = "SELECT * FROM tblproducts INNER JOIN tblspecs ON tblproducts.id = tblspecs.specID WHERE id = $id";
$result = $mysqli->query($sql);
if ($result === false) {
    die("Error executing query: " . $mysqli->error);
}

if (isset($_POST['submit'])) {
    if (!isset($_SESSION['user_id'])) {
         echo '<script>
                $(document).ready(function(){
                    $("#loginModal").modal("show");
                });
              </script>';
    } else {
        $selectedProductId = $_POST['id'];
       

        header("Location: checkout.php?id=" . $selectedProductId);
        exit();
    }
}


while ($row = $result->fetch_assoc()) {
    echo '<div align="center" style="position: relative; top: 200px;">
        <form action="" method="post">
            <strong>' . $row["name"] . '</strong><br>
            ' . $row["model"] . '<br>
            $' . $row["price"] . '.00<br>
            <input type="hidden" name="id" value="' . $row["id"] . '">
            <input type="submit" name="submit" value="Buy">
        </form>
    </div>';
}
?>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You must log in to buy the product. Please log in to continue.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="login.php" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>