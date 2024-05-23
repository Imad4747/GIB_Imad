<?php
include 'connect.php';

if(isset($_POST['searchBar'])) {
    $searchBar = $mysqli->real_escape_string($_POST['searchBar']);

    $sql = "SELECT * FROM tblcontact WHERE firstname LIKE '%$searchBar%' AND lastname LIKE '%$searchBar%'";

    $result = $mysqli->query($sql);

    if ($result === false) {
        echo "Error executing query: " . $mysqli->error;
    } else {
       echo '<table class="table table-striped">';
echo '<thead>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>First Name</th>';
echo '<th>Last Name</th>';
echo '<th>Email</th>';
echo '<th>Message</th>';
echo '<th>File</th>';
echo '<th>Date</th>';
echo '<th>Action</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $message = $row['message'];
    $file = $row['file'];
    $date = $row['date'];

    $fileLink = !empty($file) ? '<a href="' . htmlspecialchars($file) . '" target="_blank">Download</a>' : '';
    $deleteLink = '<a href="D_con.php?id=' . $id . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this record?\')">Delete</a>';

    echo '<tr>';
    echo "<td>$id</td>";
    echo "<td>$firstname</td>";
    echo "<td>$lastname</td>";
    echo "<td>$email</td>";
    echo "<td>$message</td>";
    echo "<td>$fileLink</td>";
    echo "<td>$date</td>";
    echo "<td>$deleteLink</td>";
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';
    }

    $mysqli->close();
} elseif (isset($_POST['searchProd'])) {
     $searchProd = $mysqli->real_escape_string($_POST['searchProd']);

    $sql = "SELECT * FROM tblproducts INNER JOIN tblspecs ON tblproducts.id = tblspecs.specID WHERE tblproducts.name LIKE '%$searchProd%' AND tblproducts.model LIKE '%$searchProd%'";

    $result = $mysqli->query($sql);

    if ($result === false) {
        echo "Error executing query: " . $mysqli->error;
    } else {
       echo '<div class="container-fluid d-flex flex-wrap justify-content-between">';

// Fetch values and display them
 while ($row = $result->fetch_assoc()) {
            $id = ($row['id']);
            $name = ($row['name']);
            $model = ($row['model']);
            $year_car = ($row['year_car']);
            $photo = ($row['photo']);
            $accelaration = ($row['accelaration']);
            $topspeed = ($row['topspeed']);
            $fuel = ($row['fuel']);
            $price = ($row['price']);

            echo '<div class="card mb-3" style="width: 260px;">';
            echo '<h5 class="year position-absolute top-0 start-1" style="margin-left: 5px; margin-start: 5px;">' . $year_car . '</h5>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title text-center">' . $name . '</h5>';
            echo '<h6 class="card-subtitle text-center mb-2 text-muted">' . $model . '</h6>';
            echo '<div class="card-body text-center">';
            echo '<img src="images/' . $photo . '" class="card-img-top img-fluid" style="width: 100px;" alt="Product Image">';
            echo '</div>';
            echo '<div class="datagroup d-flex justify-content-around align-items-center mt-2">';
            echo '<div class="data text-center">';
            echo '<i class="bx bx-stopwatch" style="font-size: 18px; color: #0043ff;"></i>';
            echo '<br>';
            echo '<span class="spec" style="font-weight: bold;">' . $accelaration . 's</span>';
            echo '</div>';
            echo '<div class="data text-center">';
            echo '<i class="bx bx-line-chart" style="font-size: 18px; color: #39ad5e;"></i>';
            echo '<br>';
            echo '<span class="spec" style="font-weight: bold;">' . $topspeed . ' km/h</span>';
            echo '</div>';
            echo '<div class="data text-center">';
            echo '<i class="bx bxs-gas-pump" style="font-size: 18px; color: #dc1e4d;"></i>';
            echo '<br>';
            echo '<span class="spec" style="font-weight: bold;">' . $fuel . '</span>';
            echo '</div>';
            echo '</div>';
            echo '<h5 class="card-text text-center mt-3">$' . $price . '</h5>';
            echo '<div class="text-center">';
            echo '<button class="btn btn-success change-btn btn-sm me-1" data-car-id="' . $id . '" onclick="openModal(' . $id . ')">Change</button>';
            echo '<button class="btn btn-danger delete-btn btn-sm" onclick="deleteP(' . $id . ')" data-car-id="' . $id . '">Delete</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';

    }

    $mysqli->close();
}
?>
