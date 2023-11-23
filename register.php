<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	
</head>
<body style="background-image: linear-gradient(231deg, rgba(233, 233, 233, 0.01) 0%, rgba(233, 233, 233, 0.01) 25%,rgba(10, 10, 10, 0.01) 25%, rgba(10, 10, 10, 0.01) 50%,rgba(237, 237, 237, 0.01) 50%, rgba(237, 237, 237, 0.01) 75%,rgba(200, 200, 200, 0.01) 75%, rgba(200, 200, 200, 0.01) 100%),linear-gradient(344deg, rgba(2, 2, 2, 0.03) 0%, rgba(2, 2, 2, 0.03) 20%,rgba(10, 10, 10, 0.03) 20%, rgba(10, 10, 10, 0.03) 40%,rgba(100, 100, 100, 0.03) 40%, rgba(100, 100, 100, 0.03) 60%,rgba(60, 60, 60, 0.03) 60%, rgba(60, 60, 60, 0.03) 80%,rgba(135, 135, 135, 0.03) 80%, rgba(135, 135, 135, 0.03) 100%),linear-gradient(148deg, rgba(150, 150, 150, 0.03) 0%, rgba(150, 150, 150, 0.03) 14.286%,rgba(15, 15, 15, 0.03) 14.286%, rgba(15, 15, 15, 0.03) 28.572%,rgba(74, 74, 74, 0.03) 28.572%, rgba(74, 74, 74, 0.03) 42.858%,rgba(175, 175, 175, 0.03) 42.858%, rgba(175, 175, 175, 0.03) 57.144%,rgba(16, 16, 16, 0.03) 57.144%, rgba(16, 16, 16, 0.03) 71.42999999999999%,rgba(83, 83, 83, 0.03) 71.43%, rgba(83, 83, 83, 0.03) 85.71600000000001%,rgba(249, 249, 249, 0.03) 85.716%, rgba(249, 249, 249, 0.03) 100.002%),linear-gradient(122deg, rgba(150, 150, 150, 0.01) 0%, rgba(150, 150, 150, 0.01) 20%,rgba(252, 252, 252, 0.01) 20%, rgba(252, 252, 252, 0.01) 40%,rgba(226, 226, 226, 0.01) 40%, rgba(226, 226, 226, 0.01) 60%,rgba(49, 49, 49, 0.01) 60%, rgba(49, 49, 49, 0.01) 80%,rgba(94, 94, 94, 0.01) 80%, rgba(94, 94, 94, 0.01) 100%),linear-gradient(295deg, rgba(207, 207, 207, 0.02) 0%, rgba(207, 207, 207, 0.02) 25%,rgba(47, 47, 47, 0.02) 25%, rgba(47, 47, 47, 0.02) 50%,rgba(142, 142, 142, 0.02) 50%, rgba(142, 142, 142, 0.02) 75%,rgba(76, 76, 76, 0.02) 75%, rgba(76, 76, 76, 0.02) 100%),linear-gradient(73deg, rgba(81, 81, 81, 0.03) 0%, rgba(81, 81, 81, 0.03) 12.5%,rgba(158, 158, 158, 0.03) 12.5%, rgba(158, 158, 158, 0.03) 25%,rgba(136, 136, 136, 0.03) 25%, rgba(136, 136, 136, 0.03) 37.5%,rgba(209, 209, 209, 0.03) 37.5%, rgba(209, 209, 209, 0.03) 50%,rgba(152, 152, 152, 0.03) 50%, rgba(152, 152, 152, 0.03) 62.5%,rgba(97, 97, 97, 0.03) 62.5%, rgba(97, 97, 97, 0.03) 75%,rgba(167, 167, 167, 0.03) 75%, rgba(167, 167, 167, 0.03) 87.5%,rgba(22, 22, 22, 0.03) 87.5%, rgba(22, 22, 22, 0.03) 100%),linear-gradient(90deg, hsl(137,0%,23%),hsl(137,0%,23%));">
	<?php 
	include 'connect.php';
if (isset($_POST['control'])) {
	$firstname= $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$role = "guest";
	$password =  password_hash($password, PASSWORD_DEFAULT);
	$sql = "INSERT INTO tblUsers(firstname, lastname, email, password, role) VALUES (?, ?, ?, ?, ?)";
	
	$resultaat = $mysqli->prepare($sql);
		 if (!$resultaat) {
        die("Error in query preparation: " . $mysqli->error);
    }
    $resultaat->bind_param("sssss", $firstname, $lastname, $email, $password, $role);
    if ($resultaat->execute()) {
    	session_start();
    	$_SESSION['register-succes'] = true;
        header("Location: login.php");
        exit();
} else {
    echo "Error: " . $resultaat->error;
}
$resultaat->close();
$mysqli->close();
}else{
	echo'<div class="login"><form action="register.php" method="post">
	<h1>Register</h1>
	
		<div class="input-group">
		<input type="text" name="firstname" placeholder="Firstame" required>
		<i class="bx bxs-user"></i>
		</div>
		<br><br>
		<div class="input-group">
		<input type="text" name="lastname" placeholder="Lastname" required>
		<i class="bx bxs-user"></i>
		</div>
		<br><br>
		<div class="input-group">
		<input type="email" name="email" placeholder="Email" required>
		<i class="bx bxs-envelope"></i>
		</div>
		<br><br>
		<div class="input-group">
		<input type="password" name="password" placeholder="Password" required>
		<i class="bx bxs-lock-alt"></i>
		</div>
		<br><br>
		<button type="submit" name="control" class="btn">Verzenden</button>
		 <div class="register">
			      <p>Do you have an account? click<a href="login.php"> here</a> to login.</p>
			      </div>
	</form>
';
}
	 ?>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

				*{

			margin: 0;
			padding:0;
			box-sizing: border-box;
			font-family: "Poppins", sans-serif;
		}
	body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
   
}

.login {
    background-color: transparent;
    border: 2px solid rgba(255, 255, 255, .2);
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, .2);
    border-radius: 10px;
    width: 400px;

    color: white;
    padding: 30px 40px;   
}
.login h1{
	font-size: 36px;
	text-align: center;
}

.login .input-group{
	position: relative;
	width: 100%;
	height: 50px;
	margin: 15px 0;
}
.input-group input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, .2);
    border-radius: 40px;
    font-size: 16px;
    color: white;
    padding: 20px 45px 20px 20px;
}
.input-group input::placeholder{
	color: white;
}
.input-group i{
	position: absolute;
	right: 20px;
	top: 50%;
	transform: translateY(-50%);
	font-size: 20px;

	}
.login .btn{
	width: 100%;
	height: 45px;
	background: white;
	border: none;
	outline: none;
	border-radius: 40px;
	box-shadow: 0 0 10px rgba(0, 0, 0, .1);
	cursor: pointer;
	font-size: 16px;
	color: #333;
	font-weight: 600;
}
.login .register{
	font-size: 14.5px;
	text-align: center;
	margin: 20px 0 15px;
}
.register p a{
	color: #fff;
	text-decoration: none;
	font-weight: 600;
}
.register p a:hover{
	text-decoration: underline;
}



	</style>
</body>
</html>