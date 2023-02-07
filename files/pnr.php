

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boarding Pass</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <style>
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

<body >
<div class="col-md-6" align="margin-left">
    <p class="para">AVION</p>
    <h3>Детали бронирования </h3>
  </div>
 
<table class="table table-bordered">
<tr>
<th>Имя</th>
<th>Возраст</th>
<th>Пол</th>
<th>ID Полета</th>
<th>PNR Номер</th>

</tr>
<?php
    include 'connection.php';
    $pnr = $_POST['pnrnum'];
    $sql = "select * from passengers where PNRNumber = $pnr";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
echo "<tr><td> " . $row["name"]. "</td><td>" . $row["age"] . "</td><td>".$row["gender"]. "</td><td>".$row["flightID"]. "</td><td>". $row["PNRNumber"]. "</td>" ;
}
echo "</table>";
} 
else {
     echo "<script> alert('Введите действительные данные');
     window.location.href='pnr.html';</script>";
     
    }
$conn->close();
?>
</table>
<button class="button button2" onclick="window.print();return false;" >Печать</button>
<button class="button"><a href="homepage.php">На главную</a></button>

    

</body>

</html>
