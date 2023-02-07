<?php
include 'connection.php';


if($_SERVER["REQUEST_METHOD"] == "POST") {
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$query = "select * from users where username = '$user' and password = '$pass'";
    $exec = mysqli_query($conn, $query); 
    $num_of_rows = mysqli_num_rows($exec);

  if($num_of_rows == 1)
  {

  	$sql = "select * from booking where username = '$user'";
  	$result = mysqli_query($conn, $sql);
  	$number = mysqli_num_rows($result);
    if ($number >= 1) {
    	echo "<p>ДЕТАЛИ БРОНИРОВАНИЯ</p>";
    	echo '<table>';
    	echo '<tr><th>Номер бронирования</th>';
    	echo '<th>Имя пользователя</th>';
    	echo '<th>ID Полета</th>';
    	echo '<th>Количество билетов</th>';
    	echo '<th>Стоимость</th>';
    	echo '<th>Статус</th>';
    	echo '</tr>';
    	while($row=mysqli_fetch_assoc($result))
      	{
        	echo '<tr>';
          	echo '<td>'.$row['BookingID'].'</td>';
          	echo '<td>'.$row['username'].'</td>';
          	echo '<td>'.$row['flightID'].'</td>';
          	echo '<td>'.$row['no_of_tickets'].'</td>';
          	echo '<td>'.$row['price'].'</td>';
          	echo '<td>'.$row['status'].'</td>';
          
          	echo '</tr>';
      	}
      
  	}
  	else{
   		echo '<div>Нет бронирований...</div>';
  
  	}
  }
  else{
  	echo "<script>alert('Недействительные учетные данные пользователя'); window.location = './mybookings.php';</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	
	 <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
	<title>My Bookings</title>
	<style>
		*{
			font-family: Lato;
		}
		body{
			background-size: cover;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-image:linear-gradient(rgba(250,250,250,0.6),rgba(250,250,250,0.6)) ,url(images/408134.jpg);
		}
		td{
			border:0.2px solid black;
			padding: 10px;
		}
		table{
			padding: 5px;
			width: 70%;
			text-align: center;
			margin-left: 160px;
		}
		p{
			width: 100%;
			text-align: center;
			font-size: 30px;
			font-weight: bold;

		}
	</style>
</head>
<body>
</body>
</html>
