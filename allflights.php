<?php
	session_start();
	include 'connection.php';


	$query = "select * from flights order by Date asc";
	$result= mysqli_query($conn, $query);
	
	

	$num_of_rows = mysqli_num_rows($result);
	if ($num_of_rows >= 1)
	{
		echo "<p>ДОСТУПНЫЕ РЕЙСЫ</p>";
		echo "<a href='profile.php'>Назад</a>";
		echo '<table>';
		echo '<tr><th>ID Полета</th>';
		echo '<th>Пункт вылета</th>';
		echo '<th>Пункт прилета</th>';
		echo '<th>Дата</th>';
		echo '<th>Время</th>';
		echo "<th>Количество мест</th>";
		echo '<th>Стоимость</th>';
		echo '</tr>';
		while($row=mysqli_fetch_assoc($result))
    	{
    		echo "<form method = 'POST'> ";
    		echo "<tr>";
        	echo "<td>".$row['flightID'].'</td>';
        	echo "<td>".$row['departure']."</td>";
        	echo "<td>".$row['destination']."</td>";
        	echo "<td>".$row['Date']."</td>";
        	echo "<td>".$row['Time']."</td>";
        	echo "<td>".$row['Capacity']."</td>";
        	echo "<td>".$row['Price']."</td>";
        	echo "</tr>";
    	}
    	echo "</table><br>";
	}
	else{
		echo '<div class="flight">Извините! Нет доступных рейсов...</div>';
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Available Flights</title>
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
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
		p{
			width: 100%;
			text-align: center;
			font-size: 30px;
			font-weight: bold;

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
		a{
			text-decoration:none;
			font-size: 20px;
			color: black;
			border:2px solid #16404F;
			border-radius: 2px;
			padding:5px 10px;
			margin-left: 30px;
			
		}
	</style>
</head>
<body>

</body>
</html>
