<?php
   include('connection.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select AdminName from admin where AdminName = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['AdminName'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:adminlogin.php");  
      die();
   }
?>