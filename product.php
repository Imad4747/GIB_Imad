<!DOCTYPE html>
<html>
<head>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="auto.css">
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
    <div class="sidebar">
      <form class="filter" action="" method="get">
    <h3>Fuel</h3>
    <?php 
    include "connect.php";
    $sql = "SELECT * FROM tblfuel";
    $sql2 = "SELECT * FROM tblmodels";

    $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo '
        <input type="checkbox" name="fuel" value="'.$row['fuel'].'">
        <label>'.$row['fuel'].'</label><br>';
    }

    $result2 = $mysqli->query($sql2);
    echo "<h3>Car type</h3>";
    while ($row2 = $result2->fetch_assoc()) {
        echo '
        <input type="checkbox" name="models[]" value="'.$row2['model'].'">
        <label>'.$row2['model'].'</label><br>';
    }
    ?>
       
    <input type="submit" value="Filter">
</form>

    </div>
    <div class="content">
        <h1>Product Page</h1>
        <div class="products">
          <?php 
         include "connect.php"; 
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['models']) && !isset($_GET['fuel'])) {
        $selectedModels = $_GET['models'];

        $placeholders = str_repeat('?,', count($selectedModels) - 1) . '?';

        $sql = "SELECT * 
                FROM tblproducts 
                JOIN tblmodels ON (tblproducts.modeltype = tblmodels.model)
                JOIN tblspecs ON (tblproducts.id = tblspecs.specID)
                WHERE tblmodels.model IN ($placeholders)";
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param(str_repeat('s', count($selectedModels)), ...$selectedModels);
        $stmt->execute();
        $result = $stmt->get_result();

      

        while ($row = $result->fetch_assoc()) {
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
';
        }
    } elseif (!isset($_GET['models']) && isset($_GET['fuel'])) {
        $selectedFuel = $_GET['fuel'];

        $sql = "SELECT * 
                FROM tblproducts 
                JOIN tblfuel ON (tblproducts.fueltype = tblfuel.fuel)
                JOIN tblspecs ON (tblproducts.id = tblspecs.specID)
                WHERE tblfuel.fuel = ?";
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $selectedFuel);
        $stmt->execute();
        $result = $stmt->get_result();

       

        while ($row = $result->fetch_assoc()) {
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
';
        }
    } elseif (isset($_GET['models']) && isset($_GET['fuel'])) {
          $selectedFuel = $_GET['fuel'];
        $selectedModels = $_GET['models'];

        $placeholders = str_repeat('?,', count($selectedModels) - 1) . '?';

        $sql = "SELECT * 
                FROM tblproducts 
                JOIN tblfuel ON (tblproducts.fueltype = tblfuel.fuel)
                JOIN tblmodels ON (tblproducts.modeltype = tblmodels.model)
                JOIN tblspecs ON (tblproducts.id = tblspecs.specID)
                WHERE tblfuel.fuel = ? AND tblmodels.model IN ($placeholders)";

        $stmt = $mysqli->prepare($sql);

      
        $bindParams = array_merge([$selectedFuel], $selectedModels);

        $stmt->bind_param(str_repeat('s', count($selectedModels) + 1), ...$bindParams);
        $stmt->execute();
        $result = $stmt->get_result();

      

        while ($row = $result->fetch_assoc()) {
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
    } else {
           $sql = "SELECT * FROM tblproducts,tblspecs WHERE id = specID ";
          $result = $mysqli -> query($sql);
          while ($row = $result -> fetch_assoc()) {
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
';
          }
    }
}

           ?>
            
        </div>
    </div>
</body>
</html>
