<?php
include 'session.php';
	include 'connection.php';


	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$_SESSION["numOfPassengers"] =$_SESSION["numOfPassengers"] - 1;
	$name = $_POST["name"];
	$age = $_POST["age"];
	$gender = $_POST["gender"];
	$contact = $_POST["contact"];
	$departure = $_SESSION["departure"];
	$destination = $_SESSION["destination"];
	$date =  $_SESSION["date"];
	$time = $_SESSION["time"];
	
	$query = "select flightID from flights where departure ='$departure' and destination = '$destination' and Date = '$date' and Time = '$time' limit 1";
	$exec1= mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($exec1);
	$FlightID = $row["flightID"];

	$query1 = "insert into passengers(flightID, username, name, age, gender, contact) values ('$FlightID','$login_session', '$name', '$age', '$gender', '$contact')";
	
	$exec = mysqli_query($conn, $query1);
	if ($exec) {
		 $message = "Информация успешно сохранена";
		echo "<script type='text/javascript'>alert('$message');</script>"; 
		header("Location: passDetails.php"); 
     }
	else {
        echo "<script>alert('Информация не сохранена. Повторите попытку'); window.location = './welcome.php';</script>"; 
	}
}

?>


