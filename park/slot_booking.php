<?php
	include 'config.php';


	if(isset($_POST['submit'])) {
		$slot = $_POST['slot'];
		$city = $_POST['city'];
		$userid = $_POST['userid'];
		$plate_number = $_POST['plate'];
		$model = $_POST['model'];
		$Phone = $_POST['Phone'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$status = "Reserved";
		// address,city,  zip code, slot_number,
		$query = "SELECT * FROM booking WHERE city = '$city' and slot = '$slot' and 'status' = 'Reserved'";
		$result = mysqli_query($conn, $query);
		$count = mysqli_num_rows($result);

		if($count == 1) {
			header('location:error-book.php');
		} else {
			$sql = "INSERT INTO booking (`slot`, `userID`, `city`, `PlateNumber`, `model`, `PhoneNumber`, `date`, `time`, `status`) VALUES ('{$slot}','$userid','{$city}','{$plate_number}','{$model}','{$Phone}','{$date}','{$time}','{$status}')";
			$res = mysqli_query($conn, $sql);
			
			if($res) {
				echo "<script>alert('Solt Book Successfully') </script>";
				header('location: success.php');
			}
		}			
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name = 'viewpoint' content = 'width = device-width, initial-scale = 1.0'>
	<title> Slot booking </title>
	<link rel="stylesheet" type="text/css" href	= "style.css">
</head>

<body>
	<div class = "container">
		<form method = "POST" action = "" class = "login-email">
			<h2 align="center"> SLOT BOOKING </h2>
			<br>
			<div class="input-group" align = "center">
				<select name="slot" required> 
					<option selected hidden value="">Select</option>
					<option value = "slot-1">Slot-1</option>
					<option value = "slot-2">Slot-2</option>
					<option value = "slot-3">Slot-3</option>
					<option value = "slot-4">Slot-4</option>
				</select>
			</div>
			<div class="input-group" align = "center">
				<select name="city" required> 
					<option selected hidden value="">Select</option>
					<option value = "Amaravati">Amaravati</option>
					<option value = "Guntur">Guntur</option>
					<option value = "Visakhapatnam">Visakhapatnam</option>
					<option value = "Vijayawada">Vijayawada</option>
				</select>
			</div>
			<div class = "input-group">
				<input type = "number" placeholder="User ID" name= "userid" required>
			</div>
			<div class = "input-group">
				<input type = "text" placeholder="Plate Number" name = "plate" required>
			</div>
			<div class = "input-group">
				<input type = "text" placeholder="Model Name" name = "model"required>
			</div>
			<div class="input-group">
				<input type="number" placeholder="Phone Number" name = "Phone"required>
			</div>
			<div class = "input-group">
				<input type = "date" name = "date" required>
			</div>
			<div class = "input-group">
				<input type = "time" name = "time" required>
			</div>
			<div class = "input-group">
				<button name = "submit" class = "btn" required> SUBMIT </button>
			</div>
		</form>
	</div>

</body>
</html>
