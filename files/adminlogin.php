<?php
   include("connection.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myadminname = $_POST["adminname"];
      $mypassword = $_POST["password"];
      
      $sql = "select AdminName FROM admin WHERE AdminName = '$myadminname' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($count == 1) {
         $_SESSION['login_user'] = $myadminname;
         
         header("location: profile.php");
      }
      else {
         echo "<script>alert('Admin Name or Password is invalid');</script>"; 
      }
   }
?>
<html>

<head>
   <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
   <meta charset="utf-8" meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <title>Login Page</title>

   <style type="text/css">
      body{
            background-size: cover;
            background-repeat: no-repeat;
            background-origin: all;
            font-family: sans-serif;
            background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)) ,url(images/408200.jpg);
         }

         *{

          font-family: 'Lato', sans-serif;;

         }
.form-container {
  max-width: 500px;
  padding: 70px;
  
}
.form-container input[type=text] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  border-radius: 5px;
}
.form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  border-radius: 5px;
}
.form-container .btn {
  background-color: #2ECC71;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  width: 38%;
  font-size: 15px;
}
.signup{
  
  font-family: Lato;
  font-size: 25px;
  
}
.form-container .btn:hover{
  color: black;
}
#myForm1{
  margin-left: 320px;
  text-align: center;
}
.para{
  font-size: 65.5px;
  margin-left: 30px;
  color: #D9D9D9;
}
.col-md-4{
  border-bottom: 1px solid white;
}
.col-md-8{
  border-bottom: 1px solid white;

}
    li{
  display: inline-block;
  font-family: Roboto;
  font-size: 20px;
  padding: 20px 10px 20px 10px;
  margin-top: 25px;
}
a{
  color: #D9D9D9;
  text-decoration: none;
}
b{
  font-family: Lato;
}
   </style>

</head>

<body>
   <div class="col-md-4" align="margin-left">
      <p class="para">AVION</p>
   </div>
   <div class="col-md-8" align="margin-left">
      <ul>
         <li><a href="homepage.php">Главная</a></li>
         <li><a href="offers.html">Акции</a></li>
         <li><a href="contact.html">Контакты</a></li>
         <li><a href="pnr.html">Мои билеты</a></li>
         <li><a href="mybookings.html">Мои бронирования</a></li>
         <li style="color: #D0D3D4; font-family: Lato; text-decoration: underline;">Админ</li>

      </ul>
   </div>

   <div id="myForm1">
      <form action="" method="post" class="form-container">
         <label style="font-size: 20px; color: #D0D3D4;"><b>(Применимо только для Администратора)</b></label><br> <br>
         <label style="font-size: 20px; color: #D0D3D4;" for="username"><b>Логин</b></label>
         <input type="text" placeholder="Username" name="adminname" required><br>

         <label style="font-size: 20px; color: #D0D3D4;" for="password"><b>Пароль</b></label>
         <input type="password" placeholder="Password" name="password" required>

         <button type="submit" class="btn" value="Submit">Войти</button>

      </form>
   </div>


</body>

</html>
