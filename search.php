<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php 
	include 'connect.php';
	$input = $_GET['search'];
	$sql = "SELECT * FROM tblproducts, tblspecs WHERE id = specID AND name AND model LIKE '$input%'";
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

</body>
</html>