<?php

session_start();
if (isset($_SESSION["SESSION_EMAIL"])) {
	header("Location: index.php");
}

if (isset($_POST["submit"])) {
	include 'config.php';

	$user_id = rand(1000,9999);
	$name = mysqli_real_escape_string($conn, $_POST["uname"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$password = mysqli_real_escape_string($conn, md5($_POST["pass"]));
	$cpassword = mysqli_real_escape_string($conn, md5($_POST["cpass"]));

	if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
		echo "<script>alert('{$email} - This email has already taken.');</script>";
	}else {
		if ($password === $cpassword) {
			$sql = "INSERT INTO users (userid, name, email, password) VALUES ('{$user_id}','{$name}','{$email}','{$password}')";
			$result = mysqli_query($conn, $sql);

			if ($result) {
				header("Location: index.php");
			}else {
				echo "<script>Error: ".$sql.mysqli_error($conn)."</script>";
			}
		}else {
			echo "<script>alert('Password and confirm password do not match.');</script>";
		}
	}
}
	
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset= "UTF-8">
	<meta name = "viewpoint" content = "width=device-width, initial-scale = 1.0">
	<title> Register Form </title>
	<link rel = "stylesheet" type="text/css" href = "style.css">
	
</head>

<body>
	<div class = "container">
		<form action="" method= "POST" class="login-email">
			<h1 align ="center"> Register </h1>
			<div class="input-group">
				<input type="text" placeholder = "User name" name="uname" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder= "Email ID" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="New Password" name="pass" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder = "Confirm Password" name= "cpass" required>
			</div>
			<div class="input-group">
				<input type="submit" class = "btn" name = "submit" value = "Register">
			</div>
		<p> You have already an account <a href="login.php"> Login </a>. </p>
		</form>
	</div>
</body>
</html>