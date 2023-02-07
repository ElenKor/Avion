<?php
	include 'session.php';
 include 'connection.php';
 

 	$departure = $_SESSION["departure"];
	$destination = $_SESSION["destination"];
	$date =  $_SESSION["date"];
	$time = $_SESSION["time"];
	$num = $_SESSION["number"];
	$price =  $_SESSION["finalprice"];
	$payment = $_POST["payment"];

	
	$query = "select flightID from flights where departure ='$departure' and destination = '$destination' and Date = '$date' and Time = '$time' limit 1";
	$exec1= mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($exec1);
	$FlightID = $row["flightID"];
	$status = "confirmed";

	$query1 = "CALL BOOKING('$login_session', '$FlightID', '$num', '$price', '$status', '$payment')";
	$exec2 = mysqli_query($conn, $query1);
	if ($exec2) {
    }
	  
	else {
         echo "<script>alert('An error occured! Please try again'); window.location = './welcome.php';</script>";  
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Booking confirmed</title>
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

	<style>
		p{
			font-size: 20px;
			font-family: Lato;
			text-align: center;
			width: 100%;
		}
		a{
			color: black;
			text-align: center;
			width: 100%;
		}
		td{
			border:0.2px solid black;
			padding: 5px;
		}
		table{
			padding: 5px;
			width: 70%;
			text-align: center;

		}
		       table{
            margin-top:50px;
        }
        .button {
  background-color: #4CAF50; /* Green */
  border: none;
  border-radius:20px;
  color: white;
  padding: 10px 28px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
button,a{
    color:white;
}
.button2 {background-color: #008CBA;} /* Blue */

.para {
      font-size: 65.5px;
      margin-left: 30px;
      color: black;
    }
	</style>
</head>
<body>

<?php
    include 'connection.php';
	$query = "select * from passengers where username = '$login_session'";
  $exec = mysqli_query($conn, $query);

  $num_of_rows = mysqli_num_rows($exec);
  if ($num_of_rows>=1) {
    echo "<p>Информация о бронировании</p>";
    echo '<table>';
    echo '<tr><th>Номер бронирования</th>';
    echo '<th>Рейс</th>';
    echo '<th>Имя пассажира</th>';
    echo '<th>Возраст</th>';
    echo '<th>Пол</th>';
	echo '<th>Телефон</th>';
    echo '</tr>';
    while($row=mysqli_fetch_assoc($exec))
      {
        echo '<tr>';
          echo '<td>'.$row['PNRNumber'].'</td>';
          echo '<td>'.$row['flightID'].'</td>';
          echo "<td>".$row['name']."</td>";
		   echo '<td>'.$row['age'].'</td>';
          echo '<td>'.$row['gender'].'</td>';
          echo "<td>".$row['contact']."</td>";
          echo '</tr>';
      }
	 echo '</table>';
  }
  else{
    echo '<div>Нет бронирований</div>';
  
  }
      ?>
<button class="button button2" onclick="window.print();return false;" >Печать</button>
<button class="button"><a href="homepage.php">Главная страница</a></button>
</body>
</html>




