<?php
    include 'config.php';
    session_start();
    $user_id = $_SESSION["userid"];
    if (!isset($_SESSION["SESSION_EMAIL"])) {
        header("Location: index.php");
    }
    if(isset($_POST['payment'])) {
        $select1 = mysqli_query($conn, "SELECT * FROM `booking` WHERE userID = '{$_SESSION["userid"]}'");
        $row1 = mysqli_num_rows($select1);
        if ($row1 > 0) {
            $res = mysqli_query($conn, "UPDATE booking SET status = 'Payment Done' WHERE userID = '$user_id';");
            //$r = mysqli_num_rows($res);
            if ($res) {
                //echo $fetch1['status'];
                echo "<script> alert('Payment Sucessfully done') </script>";
            }
        }
    }
?>
<!DOCTYPE HTML>
<html>
    <head> 
        <title> History </title>
    </head>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            background: linear-gradient(
					90deg,
					green,
					orange
				)
        }
        h2 {
            justify-content: cover;
            
            
        }
        .box table {
            justify-content: center;
            display: center;
            border: 2px solid black;
        }
    </style>
    <body>
        <h2 align = 'center'> HISTORY </h2>
        <div class = "box">
            
            <?php
                $select = mysqli_query($conn, "SELECT * FROM `booking` WHERE userid = '{$_SESSION["userid"]}'");
                $row = mysqli_num_rows($select);
                echo "<table>";
                echo "<tr>";
                echo "<th>"; echo "SLOT"; echo "</th>";
                echo "<th>"; echo "CITY";echo "</th>";
                echo "<th>"; echo "PlateNumber"; echo "</th>";
                echo "<th>"; echo "MODEL"; echo "</th>";
                echo "<th>"; echo "DATE"; echo "</th>";
                echo "<th>"; echo "TIME" ;echo "</th>";
                //echo "<th>"; echo "STATUS"; echo "</th>";
                echo "<th>"; echo "PAYMENT"; echo "</th>";
                echo "</tr>";
                while ($fetch = mysqli_fetch_assoc($select)) {
                    echo "<tr>";
                    echo "<td>"; echo $fetch['slot']; echo "</td>";
                    echo "<td>"; echo $fetch['city']; echo "</td>"; 
                    echo "<td>";echo $fetch['PlateNumber']; echo "</td>";
                    echo "<td>";echo $fetch['model']; echo "</td>";
                    echo "<td>";echo $fetch['date']; echo "</td>";
                    echo "<td>";echo $fetch['time']; echo "</td>";
                    //echo "<td>";echo $fetch['status']; echo "</td>";
                    $sql = mysqli_query($conn, "SELECT * FROM booking WHERE userid = '{$_SESSION["userid"]}' AND status = 'Reserved'");
                    $row1 = mysqli_num_rows($sql);
                    if ($row1 > 0) {
                        ?>
                        <form action="" method="POST">
                            <td> <button name='payment'> Payemnt </button> </td>
                        </form>
                   <?php
                    } else {
                        echo "<td>";echo "Paid"; echo "</td>";
                    }
                    
                     echo "</tr>";
                }
                echo "</table>";
            ?>
            
        </div>
    </body>
</html>