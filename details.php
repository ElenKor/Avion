<?php

 include 'connection.php';

 $flightID = $_POST['flightID'];

  $query = "select * from booking where flightID='$flightID'";
  $exec = mysqli_query($conn, $query);

  $num_of_rows = mysqli_num_rows($exec);
  if ($num_of_rows>=1) {
  	echo "<p>BOOKING DETAILS</p>";
		echo '<table>';
		echo '<tr><th>Booking ID</th>';
		echo '<th>Username</th>';
		echo '<th>Ticket count</th>';
		echo '<th>Price</th>';
		
		echo '</tr>';
		while($row=mysqli_fetch_assoc($exec))
    	{
    		echo '<tr>';
        	echo '<td>'.$row['BookingID'].'</td>';
        	echo '<td>'.$row['username'].'</td>';
        	echo '<td>'.$row['no_of_tickets'].'</td>';
        	echo '<td>'.$row['price'].'</td>';
        	
        	echo '</tr>';
    	}
    	
	}
	else{
		echo '<div>No bookings...</div>';
	
  }
?>
<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
 
  <title>Booking Details</title>
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