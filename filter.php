

<?php
include 'connect.php';
session_start();
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {

    
}
$selectedBrand = trim($_POST['selectedBrand'] ?? '');
$selectedType = trim($_POST['selectedType'] ?? '');
$minPrice = trim($_POST['minPrice'] ?? '');
$maxPrice = trim($_POST['maxPrice'] ?? '');
$search = trim($_POST['searchBar'] ?? '');
$transmission = trim($_POST['transmission'] ?? '');
$selectedFuelTypes = array_map('trim', $_POST['selectedFuelTypes'] ?? []);

$sql = "SELECT * FROM tblproducts
        INNER JOIN tblspecs ON tblproducts.id = tblspecs.specID
        WHERE 1";

$conditions = [];

if ($selectedBrand) {
    $conditions[] = "tblproducts.name = '$selectedBrand'";
}

if ($selectedType) {
    $conditions[] = "tblspecs.cartype = '$selectedType'";
}

if ($minPrice !== '' && $maxPrice !== '') {
    $conditions[] = "tblproducts.price >= $minPrice AND tblproducts.price <= $maxPrice";
}
if ($search !== '') {
    $conditions[] = "tblproducts.name LIKE '%$search%' OR tblproducts.model LIKE '%$search%'";
}

if ($transmission) {
    $conditions[] = "tblspecs.transmission = '$transmission'";
}

if (!empty($selectedFuelTypes)) {
    $inClause = "'" . implode("','", $selectedFuelTypes) . "'";
    $conditions[] = "tblspecs.fuel IN ($inClause)";
}

if (!empty($conditions)) {
    $sql .= " AND " . implode(" AND ", $conditions);
}

$result = $mysqli->query($sql);
if ($result === false) {
    die("Error executing query: " . $mysqli->error);
}

while ($row = $result->fetch_assoc()) {
    echo '<div class="col">
      <div class="card position-relative">
<span  class="favorite position-absolute top-0 end-0" style="margin-right: 5px; margin-end: 5px; cursor: pointer;" onclick="addFavorite(' . $row["id"] . ', ' . $userId . ')"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
        <path d="M8 .753a1 1 0 0 1 1.818 0l1.55 4.744h4.982a1 1 0 0 1 .555 1.832l-4.046 2.937 1.55 4.744a1 1 0 0 1-1.532 1.054l-4.045-2.937-4.047 2.937a1 1 0 0 1-1.532-1.054l1.55-4.744L.655 6.329A1 1 0 0 1 1.21 5.495L5.257 8.43 3.71 3.686a1 1 0 0 1 .287-.918L8 0.753l1.003 2.015a1 1 0 0 1 .287.918l-1.548 4.744 4.047-2.937a1 1 0 0 1 1.532 1.054l-1.55 4.744 4.046-2.937a1 1 0 0 1 .555-1.832h4.982l1.55-4.744a1 1 0 0 1 1.818 0l1.55 4.744h4.982a1 1 0 0 1 .555 1.832l-4.046 2.937 1.55 4.744a1 1 0 0 1-1.532 1.054l-4.045-2.937-4.047 2.937a1 1 0 0 1-1.532-1.054l1.55-4.744L.655 6.329A1 1 0 0 1 1.21 5.495L5.257 8.43 3.71 3.686a1 1 0 0 1 .287-.918L8 0.753l1.003 2.015a1 1 0 0 1 .287.918l-1.548 4.744 4.047-2.937a1 1 0 0 1 1.532 1.054l-1.55 4.744 4.046-2.937a1 1 0 0 1 .555-1.832h4.982l1.55-4.744a1 1 0 0 1 1.818 0l1.55 4.744h4.982a1 1 0 0 1 .555 1.832l-4.046 2.937 1.55 4.744a1 1 0 0 1-1.532 1.054l-4.045-2.937-4.047 2.937a1 1 0 0 1-1.532-1.054l1.55-4.744L.655 6.329A1 1 0 0 1 1.21 5.495L5.257 8.43 3.71 3.686a1 1 0 0 1 .287-.918L8 0.753z"/>
    </svg></span>
        
        <h3 class="year position-absolute top-0 start-1" style="margin-left: 5px; margin-start: 5px;">'.$row["year"].'</h3>


        <div class="card-body">
          <h3 class="card-title text-center">'.$row["name"].'</h3>
          
          <h5 class="card-subtitle text-center mb-2 text-muted">'.$row["model"].'</h5>
          <div class="card-body text-center">
    <img src="images/'.$row["photo"].'" class="card-img-top img-fluid" style="width: 180px;" alt="Product Image">
</div>

<div class="datagroup d-flex justify-content-around align-items-center mt-2">
    <div class="data text-center">
        <i class="bx bx-stopwatch" style="font-size: 24px; color: #0043ff;"></i>
        <br>
        <span class="spec" style="font-weight: bold;">'.$row["accelaration"].'s</span>
    </div>
    <div class="data text-center">
        <i class="bx bx-line-chart" style="font-size: 24px; color: #39ad5e;"></i>
        <br>
        <span class="spec" style="font-weight: bold;">'.$row["topspeed"].' km/h</span>
    </div>
    <div class="data text-center">
        <i class="bx bxs-gas-pump" style="font-size: 24px; color: #dc1e4d;"></i>
        <br>
        <span class="spec" style="font-weight: bold;">'.$row["fuel"].'</span>
    </div>
</div>

          <h5 class="card-text text-center mt-3">$'.$row["price"].'</h5>

          <div class="text-center">
            <button class="btn btn-primary" data-car-id="'.$row["id"].'">View Details</button>
          </div>
        </div>
      </div>
    </div>';
}

$mysqli->close();
?>
