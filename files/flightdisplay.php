<?php
include 'connection.php'
$dep_place = $_POST['from'];
	$des_place = $_POST['to'];
	$date = $_POST['depdate'];


	$query = "select * from flights where departure = '$dep_place' and destination = '$des_place' and Date = '$date'	";
	$result= mysqli_query($conn, $query);

	$num_of_rows = mysqli_num_rows($result);
	if ($num_of_rows >= 1)
	{

		while($row=mysqli_fetch_assoc($result))
    	{
    		echo '<div class="flight">';
    		echo "FLIGHT DETAILS";
    		echo '<pre>';
        	echo '  Flight ID: <input type="text" value='.$row['flightID'].'><br/><br>';
        	echo '  Departure: <input type="text" value='.$row['departure'].'><br><br>';
        	echo 'Destination: <input type="text" value='.$row['destination'].'><br><br>';
        	echo '       Date: <input type="text" value='.$row['Date'].'><br><br>';
        	echo '       Time: <input type="text" value='.$row['Time'].'><br><br>';
        	echo '   Capacity: <input type="text" value='.$row['Capacity'].'><br><br>';
        	echo '      Price: <input type="text" value='.$row['Price'].'><br><br>';
        	echo '<a href="login.php">BOOK TICKETS</a>';
        	echo '</pre>';
        	echo '</div>';	
    	}

	}
	else{
		echo '<div class="flight">Sorry! No Flights available...</div>';
	}

?>