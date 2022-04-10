<?php
// $-- are variables names
$server = "localhost"; // change
$user = "root";  //change
$pass = "";  //change
$database = "carparkingsystem";  //channge

$conn = mysqli_connect($server,$user,$pass,$database);

if (!$conn) {
	echo "<script>alert('Connection Failed.') </script>";
	die();
}

?>