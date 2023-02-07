<?php
$host = "localhost";
$user = "root";
$password = "root";
$database = "airlines";

$conn = mysqli_connect($host, $user, $password);   //declare variable to check database connection
$db = mysqli_select_db($conn, $database);     //declare variable to select database if present

/*
if ($conn && $db)
 {
	echo "connected";
}
else
{
	echo "connection failed";
}
*/

?>
