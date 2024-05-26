<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Configurator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <style type="text/css">
    #model-viewer {
        max-height: calc(100vh - 54px); 
        overflow: hidden; 
    }
 .sidebar {
        background-color: #343a40; 
    }

    .paint-option {
        display: flex;
        align-items: center; 
        transition: opacity 0.3s ease-in-out; 
        padding: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .paint-option a {
        text-decoration: none;
        color: #ffffff; 
        display: flex; 
    }

    .paint-option img {
        width: 80px;
        margin-right: 15px; 
        border-radius: 50%; 
    }

    .paint-option:hover {
        opacity: 0.8;
    }

    .paint-option.selected {
        background-color: rgba(255, 255, 255, 0.1); 
    }

    .paint-option h3,
    .paint-option h4 {
        margin: 0; 
    }
</style>
    <script type="importmap">
        {
            "imports": {
                "three": "https://unpkg.com/three@0.164.1/build/three.module.js",
                "three/addons/": "https://unpkg.com/three@0.164.1/examples/jsm/"
            }
        }
    </script>
</head>
<body>
     <header class="bg-dark text-light py-3">
      <div class="container d-flex justify-content-between align-items-center">
            <button onclick="goBack()" class="btn btn-light">Go Back</button>
            <h2>Car configurator</h2>
            <button id="paymentButton" class="btn btn-primary">Proceed to Payment</button>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
              <nav id="sidebar" class="col-md-3 d-md-block sidebar">
                <div class="sidebar-sticky">
                    <h2 class="text-white text-center mt-3">Car Paint</h2>
                    <hr style="background-color: rgba(255, 255, 255, 0.1);"> 
                   <?php 
include 'connect.php';
session_start();

if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    die("Invalid product ID.");
}

$id = $_GET['id'];

if (!isset($_SESSION['prijs'])) {
    die("Price not set in session.");
}

$price = $_SESSION['prijs'];

$sqlPath = "SELECT * FROM tblpaths INNER JOIN tblproducts ON tblproducts.id = tblpaths.id WHERE tblpaths.id = ?";
$stmtPath = $mysqli->prepare($sqlPath);
$stmtPath->bind_param("i", $id);
$stmtPath->execute();
$result_model = $stmtPath->get_result();
$model_row = $result_model->fetch_assoc();
$model_path = $model_row['Modelpath'];
$stmtPath->close();

$sqlPart = "SELECT * FROM tblparts INNER JOIN tblproducts ON tblparts.id = tblproducts.id WHERE tblparts.id = ?";
$stmtPart = $mysqli->prepare($sqlPart);
$stmtPart->bind_param("i", $id);
$stmtPart->execute();
$result_parts = $stmtPart->get_result();
$row_parts = $result_parts->fetch_assoc();
$parts_data = json_decode($row_parts['parts'], true);
$parts_json = json_encode($parts_data);
$stmtPart->close();

$sqlColor = "SELECT * FROM tblcolor";
$stmtColor = $mysqli->prepare($sqlColor);
$stmtColor->execute();
$result = $stmtColor->get_result();

while ($row = $result->fetch_assoc()) {
    echo '<div class="paint-option" data-color="'.$row["hexColor"].'" data-price="'.$row["price"].'">
            <a href="#" class="selected">
                <img src="images/'.$row["sample"].'" alt="Paint Color" class="img-fluid">
                <div>
                    <h3 class="text-white">'.$row["color"].'</h3>
                    <h4 class="text-muted">$'.$row["price"].'</h4>
                </div>
            </a>
          </div>';
}
$stmtColor->close();
?>

                   


                </div>
            </nav>


            <main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-4">
                <div id="model-viewer" class="w-100 vh-100 d-flex justify-content-center align-items-center">
                </div>
            </main>
        </div>
    </div>
    
<div class="modal fade" id="productInfoModal" tabindex="-1" aria-labelledby="productInfoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productInfoModalLabel">Product Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Selected Paint Color:</h5>
        <p id="selectedPaintColor"></p>
        <h5>Product Price:</h5>
        <p id="productPrice"></p>
        <h5>Total Price:</h5>
        <p id="totalPrice"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary" form="paymentForm" id="checkoutButton">Proceed to Payment</button>
      </div>
    </div>
  </div>
</div>

<!-- Login Modal -->
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


<script type="module" src="main.js"></script>
<script>
    var productPrice = parseFloat('<?php echo $price; ?>');
    var modelPath = '<?php echo $model_path; ?>';
    var partsToMakeRed = <?php echo json_encode($parts_json); ?>;
    var productId = '<?php echo $id; ?>';
    
    function updateModal(selectedColor, productPrice, totalPrice) {
        document.getElementById('selectedPaintColor').textContent = selectedColor;
        document.getElementById('productPrice').textContent = '$' + productPrice.toFixed(2);
        document.getElementById('totalPrice').textContent = '$' + totalPrice.toFixed(2);
        
        var myModal = new bootstrap.Modal(document.getElementById('productInfoModal'), {
            keyboard: false
        });
        myModal.show();
    }

    var paymentButton = document.getElementById('paymentButton');
paymentButton.addEventListener('click', function () {
    if ('<?php echo isset($_SESSION['user_id']) ?>') {
        var selectedPaintColor = document.querySelector('.paint-option.selected h3').textContent;
        var paintPrice = parseFloat(document.querySelector('.paint-option.selected').getAttribute('data-price'));
        var totalPrice = productPrice + paintPrice;
        
        updateModal(selectedPaintColor, productPrice, totalPrice);
       

    } else {
        var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
    }
});


var checkoutButton = document.getElementById('checkoutButton');
checkoutButton.addEventListener('click', function () {
    var selectedPaintColor = document.querySelector('.paint-option.selected h3').textContent;
    var paintPrice = parseFloat(document.querySelector('.paint-option.selected').getAttribute('data-price'));

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'pass_data.php?selected_paint_color=' + encodeURIComponent(selectedPaintColor) + '&paint_price=' + encodeURIComponent(paintPrice), true);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText); 
                alert("Session variables set successfully!"); 
                
                window.location.href = "checkout.php?id=" + productId;
            } else {
                console.error("Error setting session variables");
            }
        }
    };
    
    xhr.send();

    console.log('Paint Color:', selectedPaintColor);
    console.log('Paint Price:', paintPrice);

    console.log('Proceeding to checkout...');
});


    var paintOptions = document.querySelectorAll('.paint-option');
    paintOptions.forEach(function (option) {
        option.addEventListener('click', function () {
            event.stopPropagation();
        });
    });
    function goBack() {
        window.location.href = "cars.php?id=" + productId;
    }
</script>



    
</body>
</html>
