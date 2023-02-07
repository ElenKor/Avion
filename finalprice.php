<?php
include 'connection.php';
session_start();
//web price is the price shown on website
// pass price a parameter from database
$departure = $_SESSION["departure"];
    $destination = $_SESSION["destination"];
    $date =  $_SESSION["date"];
    $time = $_SESSION["time"];

$query = "select (1.05 * Price) as webprice from flights where departure ='$departure' and destination = '$destination' and Date = '$date' and Time = '$time' limit 1";
    $exec1= mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($exec1);
    
// create a coupon code variable in database

$coupon = $_SESSION["couponcode"];
// 5% gst on webprice
$_SESSION["finalprice"] = $row["webprice"] * $_SESSION["number"];

switch($coupon)
{
    case "STUD21":
        {
            $_SESSION["finalprice"] = $_SESSION["finalprice"] - ($_SESSION["finalprice"] * 3)/100;
            echo "<p>Ваша скидка по купону составила 3%</p><br>";
            break;
        }
    case "FAM42":
        {
            $_SESSION["finalprice"] = $_SESSION["finalprice"] - ($_SESSION["finalprice"] *4)/100;
            echo "<p>Ваша скидка по купону составила 4%</p><br>";
            break;
        }
    case "WED17":
        {
            $_SESSION["finalprice"] =$_SESSION["finalprice"] - ($_SESSION["finalprice"] * 3) /100;
            echo "<p>Ваша скидка по купону составила 3%<br></p>";
            break;
        }
    case "NEWUSER57":
    {
        $_SESSION["finalprice"] = $_SESSION["finalprice"]- ($_SESSION["finalprice"] * 5)/100;
        echo "<p>Ваша скидка по купону составила 5%</p><br>";
        break;
    }
    case "OLDGOLD60":
        {
            $_SESSION["finalprice"]=$_SESSION["finalprice"] - ($_SESSION["finalprice"] * 4) /100;
            echo "<p>Ваша скидка по купону составила 3%</p><br>";
            break;
        }
    case "FEMALE20":
        {
            $_SESSION["finalprice"] = $_SESSION["finalprice"] - ($_SESSION["finalprice"] * 4.9)/100;
            echo "<p>Ваша скидка по купону составила 5%</p> <br>";
            break;
        }

    default:
    break;
    

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirm price</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <style>
        body{
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-image:linear-gradient(rgba(250,250,250,0.45),rgba(250,250,250,0.45)) ,url(images/878630.jpg);
  }
 label{
      font-weight: bold;
      font-family: Lato;
      font-size: 17px;
      margin-left: 225px;
      padding-left: 150px;
    }
    p{
      font-weight: bold;
      font-family: Lato;
      font-size: 17px;
      margin-left: 285px;
      padding-left: 150px;

    }
    .method{
      width: 18%;
      border: 1px solid black;
      border-radius: 3px;
      height: 40px;
      margin-top: 5px;
      background: none;
      padding-left: 5px;
    }
.btn{
      background: none;
      width: 125px;
      height: 35px;
      border: 1px solid black;
      font-size: 15px;
      font-weight: bold;
      margin-left: 450px;
      margin-top: 20px;
    }
    input[type=text]{
      width: 15%;
      border: 1px solid black;
      border-radius: 3px;
      height: 40px;
      margin-top: 5px;
      background: none;
      padding-left: 5px;
    }
    </style>
</head>
<body><pre>

     <label>Сумма к оплате: </label> <?php
    echo "<input type = 'text' value = '".$_SESSION["finalprice"]."' readonly />";
    ?>
       <form action="bookingConfirmed.php" method="post">
 <label>Способ оплаты: </label> <select class="method" name="payment">
              <option>Debit card</option>
              <option>Yandex.money</option>
              <option>QIWI</option>
    </select>

    <button type="submit" class="btn">Сохранить</button>
</form>
</pre>  
</body>
</html>
