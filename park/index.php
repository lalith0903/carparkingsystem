<?php
	session_start();
	//if (!isset($_SESSION["SESSION_EMAIL"])) {
    //    header("Location: login.php");
    //}
	include 'config.php';
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title>Navigation bar</title>
  </head>
  <style>
	.box {
		margin: 83px 150px;
		text-align: center;
		padding: 20px;
		background-color: lightgreen;
		border: 2px solid green;
		border-radius: 30px;
	}
  h1 {
    background: black;
  }
  </style>
  <body>
    <header>
      <div id="brand"><a href="/">Car Parking System</a></div>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about_us.html">About us</a></li>
          <li><a href="services.html">Services</a></li>
		  <li><a href="contact_us.php">Contact US</a></li>
      <?php 
        if (!isset($_SESSION["SESSION_EMAIL"])) { 
          echo "<li id='login'><a href='login.php' >Login</a></li>";
          echo "<li id='signup'><a href= 'register.php'>Signup</a></li>";
        }
        else {
          echo "<li id='login'><a href='logout.php' >Logout</a></li>";
        } ?>
        </ul>
      </nav>
      <div id="hamburger-icon" onclick="toggleMobileMenu(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <ul class="mobile-menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="about_us.html">About us</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="services.html">Services</a></li>
		      <li><a href="contact_us.php">Contact US</a></li>

          <?php 
        if (!isset($_SESSION["SESSION_EMAIL"])) { 
          echo "<li id='login'><a href='login.php' >Login</a></li>";
          echo "<li id='signup'><a href= 'register.php'>Signup</a></li>";
        }
        else {
          echo "<li id='login'><a href='logout.php' >Logout</a></li>";
        } ?>
        </ul>
      </div>
    </header>
	<div>
        <?php
            $sql = "SELECT * FROM users WHERE email='{$_SESSION["SESSION_EMAIL"]}'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
        ?>
        <h1>Welcome, <?php echo $row["name"]; ?> </h1>
        <?php } ?>
	</div>
	<div class = box >
		<a href ="services.html"> Amaravati</a> 
	</div>
	<div class = box >
		<a href ="services.html"> Guntur </a> 
	</div>
	<div class = box >
		<a href ="services.html"> Tirupati </a> 
	</div>
	<div class = box >
		<a href ="services.html"> Visakhapatnam </a> 
	</div>
    <script src="index.js"></script>
  </body>
</html>
