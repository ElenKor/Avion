<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  <style>
    body{
      background-size: cover;
      background-repeat: no-repeat;
      font-family: Lato;
      background-attachment: fixed;
      background-image:linear-gradient(rgba(250,250,250,0.9),rgba(250,250,250,0)) ,url(images/185289.jpg);
      
     }
     *{
      font-family: Lato;
     }
    .flight{
      width: 60%;
      margin-left: 250px;
      margin-top: 40px;
      padding-top: 0px;
      padding-bottom: 0px;
      font-family: Lato;
      background: none;
    }
    .btn {
      background-color: grey;
      color: white;
      padding: 12px 20px;
      border: none;
      font-family: Lato;
      border-radius: 3px;
      cursor: pointer;
      width: 25%;
      margin-left: 225px;
    }
    .col-md-4{
      border-bottom: 1px solid black;
    }
    .col-md-8{
      border-bottom: 1px solid black;
    }
    input[type = date]{
      width: 30%;
      height: 39px;
      border: 0.5px solid #B9B9BA;
      padding: 10px;
      border-radius: 5px;
    }
    form{
      border: 1px solid black;
      padding: 20px;
      border-radius: 5px;
    }
    #city{
      width: 30%;
      height: auto;
      border: 0.5px solid #B9B9BA;
      padding: 10px;
      border-radius: 5px;
    }
    .para{
      font-size: 65.5px;
      margin-left: 30px;
      color: black;
      font-family: Lato;
    }
    li{
      display: inline-block;
      font-family: Lato;
      font-size: 20px;
      padding: 20px 10px 20px 10px;
      margin-top: 25px;
    }
    a{
      color: black;
    }
    a:hover{
      color: grey;
    }
    img{
      width: 25px;
      height: auto;
  }

  </style> 
	<title>AIRLINE DATABASE</title>
</head>
<body>
  <div class="col-md-4" align="margin-left">
  <p class="para">AVION</p></div>
  <div class="col-md-8" align="margin-left">
    <ul>
      <li style="color: black; font-family: Lato; text-decoration: underline;">Главная</li>
<li><a href="offers.html">Акции</a></li>
<li><a href="contact.html">Контакты</a></li>
<li><a href="pnr.html">Мои билеты</a></li>
<li><a href="mybookings.html">Мои бронирования</a></li>
<li><a href="adminlogin.php">Админ</a></li>
     
     </ul>
  </div>
  
  <br><br><br><br><br>
  <div class="flight">
    <form style="font-family: Leto" method="post" action="flights.php"><pre style="background: none; border: none; font-weight: bold; font-family: Lato; font-size: 15px;"> Откуда:                                                           Куда:                                                                      ДАТА ПОЛЕТА:</pre>   <?php
                  include 'connection.php' ;
                $sql="SELECT distinct departure FROM flights order by departure asc";
              $result=mysqli_query($conn, $sql);
              if($result == FALSE) {
              die(mysqli_error());  
              }
              ?>
              
              <?php
              echo "<select id = 'city' name = 'from'>";
              while ($row = mysqli_fetch_array($result)) {

              echo "<option value='" . $row['departure'] ."'>" . $row['departure']."</option>";
              }
              echo "</select>";
              ?>
              <img src="images/arrow.jpg"> <?php
                  include 'connection.php' ;
                $sql="SELECT distinct destination FROM flights order by destination asc";
              $result=mysqli_query($conn, $sql);
              if($result == FALSE) {
              die(mysqli_error());  
              }
              ?>
           
              <?php
              echo "<select id = 'city' name = 'to'>";
              while ($row = mysqli_fetch_array($result)) {

              echo "<option value='" . $row['destination'] ."'>" . $row['destination']."</option>";
              }
              echo "</select>";
              ?>
              <img style="width: 20px; height: auto;" src="images/calender.jpg">
              <input id="dateInput" type="date" name="depdate"><br><br>
        <button type="submit" class="btn">Найти</button>
    
            <script>
    let dateInput = document.getElementById('dateInput');
 
 const cur_date = new Date();
 const cur_month = cur_date.getMonth() > 9 ? cur_date.getMonth() + 1 : '0' + (cur_date.getMonth() + 1);
 const cur_day = cur_date.getDate() > 9 ? cur_date.getDate() : '0' + cur_date.getDate();
  
 const dateStr = cur_date.getFullYear() + '-' + cur_month + '-' + cur_day;
  
 dateInput.setAttribute('min', dateStr);
</script>
  </pre>
</form>
  </div>
</body>
</html>
