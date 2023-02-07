<?php

include 'connection.php';

//declare variables
 $username = $_POST["username"];
 $password = $_POST["password"];
 $firstname = $_POST["firstname"];
 $lastname = $_POST["lastname"];
 $contact = $_POST["contact"];
 $email = $_POST["email"];

//store query in a variable
 $query = "select * from users where username ='$username'";


  //execute the query stored in variable $query and store result in variable $exec
 $exec = mysqli_query($conn,$query); 

// return number of rows

 $result = mysqli_num_rows($exec); 

 if($result == 1){
 	echo "Пользователь уже существует";
 }
 else{
 	$query1 = "insert into users(username, password, Fname, Lname, Contact, email) values ('$username', '$password', '$firstname', '$lastname', '$contact', '$email')";
 	$exec1 = mysqli_query($conn,$query1);
 	echo "<script>alert('Пользователь создан. Войдите, чтобы продолжить.'); window.location = './login.php';</script>";
 }
?>
