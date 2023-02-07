<?php
include 'connection.php';
include 'session1.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
   $flightID = $_POST["flightID"];

   $query = "delete from flights where flightID = '$flightID'";
   $exec = mysqli_query($conn, $query);
   if ($exec) {
      $message = "Рейс удален";
    echo "<script type='text/javascript'>alert('$message');</script>"; 
   }
   else {
      echo "<script>alert('Ошибка!');</script>";
   }
 }
?>
<html>

<head>
   <title>Welcome Admin </title>
   <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

   <meta charset="utf-8" meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <style>
      body {
         background-size: cover;
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-image: linear-gradient(rgba(250, 250, 250, 0.45), rgba(250, 250, 250, 0.45)), url(images/878630.jpg);
         background-origin: all;
         color: black;
       
      }

      * {

         font-family: 'Lato', sans-serif;
         ;

      }

      input[type=text]{
      width: 250px;
      border: 1px solid black;
      border-radius: 3px;
      height: 40px;
      margin-top: 5px;
      background: none;
    }

      input[type=date] {
         width: 250px;
      border: 1px solid black;
      border-radius: 3px;
      height: 40px;
      margin-top: 5px;
      background: none;
      }

      input[type=time] {
         width: 250px;
      border: 1px solid black;
      border-radius: 3px;
      height: 40px;
      margin-top: 5px;
      background: none;
      }

     
     .btn {
        background: none;
        padding: 6px 10px 6px 10px;
      height: 35px;
      border: 1px solid black;
      font-size: 15px;
      font-weight: bold;

      }

      .abcd {
          width: 250px;
      border: 1px solid black;
      border-radius: 3px;
      height: 40px;
      margin-top: 5px;
      background: none;


      }


      .signup {

         font-family: Lato;
         font-size: 25px;

      }
       .col-md-4{
            border-bottom: 1px solid black;
        }
        .col-md-8{
              border-bottom: 1px solid black;
        }
      .myForm1 {
      border: 1px solid black;
      width: 42%;
      padding-bottom: 25px;
      margin-left: 310px;
      padding-left: 30px;
      }

      .para {
         font-size: 51.5px;
         margin-left: 30px;
         margin-top: 20px;
      }

      li {
         display: inline-block;
         font-family: Lato;
         font-size: 20px;
         padding: 20px 8px 20px 8px;
         margin-top: 25px;
      }
      
    label{
      font-weight: bold;
      font-family: Lato;
      font-size: 17px;
    }
   </style>
</head>

<body>

  <div class="navig">
    <div class="col-md-8" align="margin-left">
  <p class="para">Добро пожаловать <?php echo $login_session; ?></p></div>
  <div class="col-md-4" align="margin-left">
    <ul>
      <li><a style="text-decoration: none; color: black;" href="allflights.php">Рейсы</a></li>
      <li><a style="text-decoration: none; color: black;" href = "logout1.php">Выйти</a></li>
     
     </ul>
  </div>
</div>
   
   <br><br><br><br><br><br><br>
   
   <form action="addflight.php" method="post" class="myForm1">
      <label style="font-family: Lato; font-size: 27px; margin-left: 220px; font-weight: bold;">Добавить рейс</label>
     
         <pre style="background: none; border: none;margin-right: 200px; font-family: Lato; color: black;">
           <label> ID Полета:            </label> <input type="text" name="flightID" required><br>
      <label>Пункт вылета:         </label><select name="dep_place" class="abcd">
              <option value="--">--</option>
              <option value="Moscow">Москва</option>
              <option value="Saint-Petersburg">Санкт-Петербург</option>
              <option value="Khabarovsk">Хабаровск</option>
              <option value="Irkutsk">Иркутск</option>
            </select><br>
   <label>Пункт прилета:        </label> <select name="des_place" class="abcd">
              <option value="--">--</option>
            <option value="Moscow">Москва</option>
            <option value="Saint-Petersburg">Санкт-Петербург</option>
            <option value="Khabarovsk">Хабаровск</option>
            <option value="Irkutsk">Иркутск</option>
            </select><br> 
                       <label>Дата:                  </label><input type="date" id="InputDate" name="date" required> <br><script>
    let dateInput = document.getElementById('InputDate');
 
 const cur_date = new Date();
 const cur_month = cur_date.getMonth() > 9 ? cur_date.getMonth() + 1 : '0' + (cur_date.getMonth() + 1);
 const cur_day = cur_date.getDate() > 9 ? cur_date.getDate() : '0' + cur_date.getDate();
  
 const dateStr = cur_date.getFullYear() + '-' + cur_month + '-' + cur_day;
  
 dateInput.setAttribute('min', dateStr);
</script>
                        <label>Время:              </label> <input type="time" name="time" required> <br>
             <label>Вместимость:      </label> <input type="text" name="capacity" required> <br>
                        <label>Стоимость:     </label> <input type="text" name="price" required><br>
  <button style="margin-left: 250px;" type="submit" name="submit" class="btn">Добавить</button>
      </pre>
    </form>
   <br><br>
   <form method="post" action="details.php" class="myForm1">
  <label style="font-family: Lato; font-size: 27px; margin-left: 150px; font-weight: bold;">Проверить бронирования</label><br><br>
  <label>Введите ID полета: </label> <input type="text" name="flightID" required><br><br>
   <button style=" margin-left: 250px;" type="submit" name="checkbook" class="btn">Проверить</button>
   </form>
   <br><br>

  <form action="" method="post" class="myForm1">
    <label style="font-family: Lato; font-size: 27px; margin-left: 220px; font-weight: bold;">Удалить рейс</label><br><br>
    <label>Введите ID полета: </label> <input type="text" name="flightID" required><br><br>
    <button style="margin-left: 250px;" class="btn" name="submit" type="submit">Удалить</button>
  </form>
</body>

</html>
