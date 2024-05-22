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
}
?>
