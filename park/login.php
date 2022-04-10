<?php
	 session_start();
	 if (isset($_SESSION["SESSION_EMAIL"])) {
		 header("Location: index.php");
	 }
 
	 if (isset($_POST["login"])) {
		 include 'config.php';
		 
		 $email = mysqli_real_escape_string($conn, $_POST["email"]);
		 $password = mysqli_real_escape_string($conn, md5($_POST["pass"]));
 
		 $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
		 $result = mysqli_query($conn, $sql);
		 $count = mysqli_num_rows($result);
 
		 if ($count === 1) {
			 $row = mysqli_fetch_assoc($result);
			 $_SESSION["SESSION_EMAIL"] = $email;
			 $_SESSION["userid"] = $row['userid'];
			 header("Location: index.php");
			 
		 }else {
			 echo "<script>alert('Your Login details is incorrect.');</script>";
		 }
	 }
	?>

<!DOCTYPE HTML>
<html>
<head>
	
	<meta charset="UTF-8">
	<meta name = 'viewpoint' content = 'width = device-width, initial-scale = 1.0'>
	<title> Login form for parking </title>
	<link rel="stylesheet" type="text/css" href	= "style.css">
	
</head>

<body>

	<div class = 'container', align = 'center'>
		<h1 align = 'center' method="POST" class = "login-email"> Online Parking system </h1>
		<form action="" method = "POST" class = "login-email">
			<div class="input-group">
				<input type='email' placeholder = "Email id" name = "email"  required> 
			</div>
			<br>
			<div class="input-group">
				<input type='password' placeholder = "Password" name = "pass" required>
			</div>
			<br>
			<div class="input-group">
				<button class = "btn" name = "login"> Login </button>
			</div>
			<p> Create Account! <a href='register.php'class = "login-email" > Register </a>. </p>
		</form>
	</div>
 
</body>

</html>

