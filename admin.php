<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
  
</head>
<body>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        ul.tabs {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul.tabs li {
            display: inline-block;
            margin-right: 10px;
            cursor: pointer;
            padding: 8px;
            background-color: #3498db;
            color: #fff;
            border-radius: 5px;
        }

        section {
            margin-top: 20px;
        }

        h2 {
            color: #3498db;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }
    </style>
	
    <ul class="tabs">
        <li onclick="showTab('products')">Products</li>
        <li onclick="showTab('clients')">Clients</li>
        <li onclick="showTab('contact')">Contact</li>
        <a href="loguit.php"><li>Log Out</li></a>
    </ul>

    <section id="products">
        <h2>Product Information</h2>
      
                <?php  
                include 'connect.php';
$sql = "SELECT * FROM tblproducts";
$resultaat = $mysqli->query($sql);
while ($row = $resultaat->fetch_assoc()) {
    echo        '  <table>
             <tr>
                <th>Name</th>
                <th>Model</th>
                <th>Price</th>
                <th>Photo</th>
            </tr>
            <tr>
    <td>'.$row['name'].'</td>
                <td>'.$row['model'].'</td>
                <td>'.$row['price'].'</td>
                <td> <img  class="image" src="images/'.$row['photo'].'" width="160px"></td>
                </tr>
        </table>';
}
    ?>
                
            
    </section>

    <section id="clients" style="display: none;">
        <h2>Client Information</h2>
       <?php  
                include 'connect.php';
$sql = "SELECT * FROM tblusers";
$resultaat = $mysqli->query($sql);
while ($row = $resultaat->fetch_assoc()) {
    echo        '  <table>
             <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>ID</th>
            </tr>
            <tr>
            <td>'.$row['id'].'</td>
    <td>'.$row['firstname'].'</td>
                <td>'.$row['lastname'].'</td>
                <td>'.$row['email'].'</td>
                </tr>
        </table>';
}
    ?>
    </section>

    <section id="contact" style="display: none;">
        <h2>Contact</h2>
          <?php  
                include 'connect.php';
$sql = "SELECT * FROM tblcontact";
$resultaat = $mysqli->query($sql);
while ($row = $resultaat->fetch_assoc()) {
    echo        '  <table>
             <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Message</th>
                <th>File</th>
                <th>Date</th>
            </tr>
            <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['firstname'].'</td>
            <td>'.$row['lastname'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['message'].'</td>
            <td>'.$row['file'].'</td>
            <td>'.$row['date'].'</td>
                </tr>
        </table>';
}
    ?>
      
    </section>
      

    <script>
        function showTab(tabId) {
            document.querySelectorAll('section').forEach(section => {
                section.style.display = 'none';
            });

            document.getElementById(tabId).style.display = 'block';
        }
    </script>

</body>
</html>
