<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Product Details</title>
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

        .carousel-inner img {
            max-width: 100%;
            max-height: 500px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<header data-bs-theme="dark">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark border-bottom p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
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

<main class="container" style="margin-top: 90px;">
    <div class="product-details-container bg-light p-4 rounded shadow border border-dark">
        <table class="table">
            <tr>
                <td class="product-image-slideshow m-3" rowspan="2">
                    <?php 
                    if (isset($_POST['submit'])) {
                        if (!isset($_SESSION['user_id'])) {
                            echo '<script>
                                    document.addEventListener("DOMContentLoaded", function(){
                                        var loginModal = new bootstrap.Modal(document.getElementById("loginModal"));
                                        loginModal.show();
                                    });
                                  </script>';
                        } else {
                            $selectedProductId = $_POST['id'];
                            header("Location: checkout.php?id=" . $selectedProductId);
                            exit();
                        }
                    }
                   include 'connect.php'; 
$id = $_GET['id'];
$_SESSION['prijs'] = 0;

$stmt = $mysqli->prepare("SELECT * FROM tblproducts INNER JOIN tblspecs ON tblproducts.id = tblspecs.specID WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $_SESSION['prijs'] = $row["price"];
    echo '<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/'.$row["pic"].'" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/'.$row["pic2"].'" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/'.$row["pic3"].'" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="product-details">
        <h2>'.$row["name"].' - '.$row["model"].'</h2>
        <div>
            <h4>Specifications:</h4>
            <ul>
                <li><strong>Price:</strong> $'.$row["price"].'</li>
                <li><strong>Make:</strong> '.$row["year_car"].'</li>
                <li><strong>Topspeed:</strong> '.$row["topspeed"].' km/h</li>
                <li><strong>Horsepower:</strong> '.$row["horsepower"].'</li>
                <li><strong>Acceleration:</strong> '.$row["accelaration"].' s</li>
                <li><strong>Car Type:</strong> '.$row["cartype"].'</li>
                <li><strong>Transmission:</strong> '.$row["transmission"].'</li>
                <li><strong>Fuel:</strong> '.$row["fuel"].'</li>
            </ul>
        </div>
        <div>
            <h4>Description:</h4>
            <p>'.$row["description"].'</p>
        </div>';
}

$stmt->close();
$mysqli->close();
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="mt-3">
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <button class="btn btn-primary mr-2" type="submit" name="submit"><i class="bi bi-credit-card-fill"></i> Make Payment</button>
                        </form>
                        <form id="configForm" method="GET" action="config.php">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="price" value="<?php echo $_SESSION['prijs'] ?>">
                            <button type="submit" class="btn btn-secondary"><i class="bi bi-gear-fill"></i> Configure Car</button>
                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</main>

<footer id="footer" class="text-center p-3 bg-dark text-light mt-3">
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

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Please Log In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You need to log in first to proceed with the payment.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="login.php" class="btn btn-primary">Log In</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
