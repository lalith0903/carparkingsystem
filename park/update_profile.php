<?php
include 'config.php';
session_start();
$user_id = $_SESSION["userid"];
if (!isset($_SESSION["SESSION_EMAIL"])) {
	header("Location: index.php");
}

if (isset($_POST["update"])) {
	
	$uname = mysqli_real_escape_string($conn, $_POST["uname"]);
	$uemail = mysqli_real_escape_string($conn, $_POST["email"]);
	$uphone = mysqli_real_escape_string($conn, $_POST["phone"]);
	$ucarno = mysqli_real_escape_string($conn, $_POST["carno"]);

	mysqli_query($conn, "UPDATE `users` SET name = '$uname', email = '$uemail', phone  = '$uphone', plate_no = '$ucarno' WHERE userid = '$user_id'");

	
	$update_image = $_FILES['update_image']['name'];
	$update_image_size = $_FILES['update_image']['size'];
	$update_image_tmp_name = $_FILES['update_image']['tmp_name'];
	$update_image_folder = 'uploaded_img/'.$update_image;
 
	if(!empty($update_image)){
	   if($update_image_size > 2000000){
		  echo "<script> alert('image is too large') </script>";
	   }else{
		  $image_update_query = mysqli_query($conn, "UPDATE users SET image = '$update_image' WHERE userid = '$user_id'");
		  if($image_update_query){
			 move_uploaded_file($update_image_tmp_name, $update_image_folder);
		  }
		  echo "<script> alert('image updated succssfully!') </script>";
	   }
	}
	//$cur_pass = $_POST(["old_pass"]);
	$password = mysqli_real_escape_string($conn, md5($_POST["pass"]));
	$cpassword = mysqli_real_escape_string($conn, md5($_POST["cpass"]));

	if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE userid = '$user_id'")) > 0) {
		if ($password === $cpassword) {
			$result = mysqli_query($conn, "UPDATE `users` SET password = '$password' WHERE id = '$user_id'");
			if ($result) {
				echo "<script> alert('Update Sucessfully') </script>";
				header("Location: profile.php");
			}else {
				echo "<script>Error: ".$result.mysqli_error($conn)."</script>";
			}
		} else {
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
	<title> UPDATE PROFILE </title>
	<style>
		body {
			margin: 5px;
			padding: 10px;
		}
		.btn,
		.delete-btn{
		width: 100%;
		border-radius: 5px;
		padding:10px 30px;
		color:var(--blue);
		display: block;
		text-align: center;
		cursor: pointer;
		font-size: 20px;
		margin-top: 10px;
		}

		.btn{
		background-color: purple;
		}

		.btn:hover{
		background-color: white;
		}

		.delete-btn{
		background-color: var(--red);
		}

		.delete-btn:hover{
		background-color: var(--dark-red);
		}
		.update-profile form img{
		height: 200px;
		width: 200px;
		border-radius: 50%;
		object-fit: cover;
		margin-bottom: 5px;
		align: center;
		}

		.update-profile form .flex{
		display: flex;
		justify-content: space-between;
		margin-bottom: 20px;
		gap:15px;
		}

		.update-profile form .flex .inputBox{
		width: 49%;
		}

		.update-profile form .flex .inputBox span{
		text-align: left;
		display: block;
		margin-top: 15px;
		font-size: 1.2rem;
		color:var(--black);
		}

		.update-profile form .flex .inputBox .box{
		width: 100%;
		border-radius: 5px;
		background-color: var(--light-bg);
		padding:12px 14px;
		font-size: 17px;
		color: black;
		margin-top: 10px;
		}

		@media (max-width:650px){
		.update-profile form .flex{
			flex-wrap: wrap;
			gap:0;
		}
		.update-profile form .flex .inputBox{
			width: 70%;
		}
	}
	</style>
	
</head>

<body>
	<div class = "update-profile">
    <h1 align ="center"> Update Profile </h1>
		<?php
			$select = mysqli_query($conn, "SELECT * FROM `users` WHERE userid = '{$_SESSION["userid"]}'");
			$row = mysqli_num_rows($select);
			if($row > 0){
				$fetch = mysqli_fetch_assoc($select);
			}
		?>
		<form action="" method= "POST" enctype="multipart/form-data">
			<?php
					if( $fetch['image'] == '') {
						echo '<img align="center" src="images/default.png">';
					} else {
						echo '<img  align = "center" src="uploaded_img/'.$fetch['image'].'">';
					}
			?>
			<div class = "flex">
				<div class="inputBox">
				<span>username :</span>
					<input type="text" placeholder = "Update_name" name="uname" value = "<?php echo $fetch['name']; ?>" class = "box">
				</div>
				<br>
				<div class="inputBox">
				<span>your email :</span>
					<input type="email" placeholder= "Update Email ID" name="email" value = "<?php echo $fetch['email']; ?>" class="box">
				</div>
				<br>
				<div class="inputBox">
				<span>Phone Nuumber</span>
					<input type="number" placeholder= "Phone Number" name="phone" value = "<?php echo $fetch['phone']; ?>" class="box">
				</div>
				<br>
				<div class="inputBox">
				<span>Car plate Number</span>
					<input type="text" placeholder= "Car Plate Number" name="carno" value = "<?php echo $fetch['plate_no']; ?>" class="box">
				</div>
				<br>
				<div class="inputBox">
				<span>update your pic :</span>
            		<input type="file" placeholder= "Update Image" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
				</div>
				<br>
				<div class="inputBox">
					<span> Current Password :</span>
					<input type="password" name="old_pass" value="<?php echo $fetch['password']; ?>" class="box">
				</div>
				<div class="inputBox">
					<span>New Passowrd</span>
					<input type="password" placeholder="New Password" name="pass" class="box">
				</div>
				<br>
				<div class="inputBox">
					<span>Confirm Password</span>
					<input type="password" placeholder = "Confirm Password" name= "cpass" class="box">
				</div>
				<br>
				<div class="inputBox">
					<input type="submit" class = "btn" name = "update" value = "Register" class="box">
				</div>
			</div>
		</form>
	</div>
</body>
</html>