<?php
    session_start();
    include 'config.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <style>
            .content {
                min-height: 100vh;
                background-color: red;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .content .profile {
                padding: 20px;
                background-color: white;
                box-shadow: var(--box-shadow);
                text-align: center;
                width: 400px;
                border: 2px solid black;
                border-radius: 5px;
            }
            .content .profile img {
                height: 200px;
                width: 200px;
                border-radius: 50%;
                align: center;
                border-radius: 50%;
                object-fit: cover;
                margin-bottom: 5px;
            }
            .content .profile h3 {
                margin: 5px 0;
                font-size: 20px;
                color: black;
                justify-content: center;
            }
            .content .profile a {
                color: blue;
            }
            .content .profile a:hover {
                text-decoration: underline;
            }
            .btn {
                text-decoration: none;
                margin-top: 10px;
                color: white;
            }
        </style> 
    </head>
<body>
    <div class="content">
        <div class="profile">
        <h1> Profile </h1>


        <?php
			$select = mysqli_query($conn, "SELECT * FROM `users` WHERE userid = '{$_SESSION["userid"]}'");
			$row = mysqli_num_rows($select);
			if($row > 0){
				$fetch = mysqli_fetch_assoc($select);
                if( $fetch['image'] == '') {
                    echo '<img align="center" src="images/default.png">';
                } else {
                    echo '<img  align = "center" src="uploaded_img/'.$fetch['image'].'">';
                }
			}
		?>
                <h3>NAME:         <span><?php  echo $fetch['name'];      ?></span></h3>
                <h3>PHONE:        <span><?php  echo $fetch['phone'];     ?></span></h3>
                <h3>ID. NO:       <span><?php  echo $fetch['userid'];    ?></span></h3>
                 <h3>CAR PLATE NO: <span><?php  echo $fetch['plate_no'];  ?></h3>
                <a href="update_profile.php" class="btn"> UPDATE PROFILE </button>
                <div id="status"></div>
        </div>
    </div>
</body>
</html>