<?php
	include 'connection.php';

	if($_SERVER["REQUEST_METHOD"] == "POST") {
	$flightID = $_POST["flightID"];
	$departure = $_POST["dep_place"];
	$destination = $_POST["des_place"];
	$date = $_POST["date"];
	$time = $_POST["time"];
	$capacity = $_POST["capacity"];
	$price = $_POST["price"];

	if($departure == $destination or $departure == "--" or $destination == "--")
	{
		echo "<script>alert('Введите действительный пункт отправления и назначения'); window.location = './profile.php';</script>";
	}
	else{

	
	 $query = "select * from flights where flightID ='$flightID'";


  //execute the query stored in variable $query and store result in variable $exec
 $exec = mysqli_query($conn,$query); 

// return number of rows

 $result = mysqli_num_rows($exec); 

 if($result == 1){
		echo "<script>alert('Рейс существует'); window.location = './profile.php';</script>";
 }
 else{
 	$query1 = "insert into flights(flightID, departure, destination, Date, Time, Capacity, Price) values ('$flightID', '$departure', '$destination', '$date', '$time', '$capacity', '$price')";
 	$exec1 = mysqli_query($conn,$query1);
 	if ($exec1) {
 		echo "<script>alert('Информация о рейсе успешно добавлена!'); window.location = './profile.php';</script>";
 	}
 	
 }	
}
}

?>


