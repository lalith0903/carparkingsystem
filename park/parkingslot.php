<!DOCTYPE HTML>
<html>
    <head>
        <title> Parking Zones </title>
        <meta conten="text/html; charset=iso-8859-1">
        
        <?php
            include 'config.php';
        ?>
        <style>
            body {
                margin: 0;
                padding: 0;
                background: linear-gradient(
					255deg,
					#6f6df4,
					#4c46f5
				);
            }
            header {
                padding: 20px 20px black;
                color: white;
                text-align: center;
                font-size: 2rem;

            }
            .box {
                background: white;
                margin: 60px  70px;
                padding: 5px 70px;
                border: 2px solid black;
                border-radius: 10px;
                text-align: center;
            }
            table tr td{
                background: yellow;
                text-align: center;
                padding: 20px 20px;
                position: flex;
                border: 1px solid gray;
            }
            .box .boxes .boxes1{
                margin: 10px 10px;
                position: flex;
                padding: 40px 25px;
                background: red;
            }
            .box .boxes .boxes2{
                margin: 10px 10px;
                position: flex;
                padding: 40px 25px;
                background: green;
            }
            h3 {
                font-size: 1.5rem;
            }
        </style>
    </head>
    <body>
        <header>
            <h2> Parking Lot Status </h2>
        </header>
        <div class="box">
            <h3> Visakhapatnam </h3>
                <?php $city = "Visakhapatnam";?>
                <div class = "boxes"> <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-1' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";;
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-1</div>
                </div>
                <div class = "boxes"> <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-2' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-2</div>
                </div>
                <div class = "boxes">
                    <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-3' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-3</div>
                </div>
                <div class = "boxes"> 
                    <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-4' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-4</div>
                </div>
        </div>
        <div class="box">
            <h3> Vijayawada </h3>
                <?php $city = "Vijayawada";?>
                <div class = "boxes"> <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-1' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-1</div>
                </div>
                <div class = "boxes"> <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-2' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-2</div>
                </div>
                <div class = "boxes">
                    <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-3' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-3</div>
                </div>
                <div class = "boxes"> 
                    <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-4' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-4</div>
                </div>
        </div>
        <div class="box">
            <h3> Amaravati </h3>
                <?php $city = "Amaravati";?>
                <div class = "boxes"> <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-1' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-1</div>
                </div>
                <div class = "boxes"> <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-2' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-2</div>
                </div>
                <div class = "boxes">
                    <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-3' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-3</div>
                </div>
                <div class = "boxes"> 
                    <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-4' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-4</div>
                </div>
        </div>
        <div class="box">
            <h3> Guntur </h3>
                <?php $city = "Guntur";?>
                <div class = "boxes"> <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-1' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-1</div>
                </div>
                <div class = "boxes"> <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-2' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-2</div>
                </div>
                <div class = "boxes">
                    <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-3' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-3</div>
                </div>
                <div class = "boxes"> 
                    <?php
                    $sql = "SELECT * FROM booking WHERE city='$city' and slot = 'slot-4' and status = 'Reserved'";
                    $resullt = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($resullt);
                    if($count == 1) {
                        echo "<div class=boxes1>";
                    }
                    else {
                        echo "<div class=boxes2>";
                    }?>SLOT-4</div>
                </div>
        </div>       
        <div>
            <p align="center" color: "black"> Red -> Reversed/Occupied, Yellow -> Available </p>
        </div>
    </body>    
</html>
