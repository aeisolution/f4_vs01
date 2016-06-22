<?php
   include('dbconfig.php');
   session_start();

   if(isset($_SESSION['login_user'])) {
     $user_check = $_SESSION['login_user'];
     $sql_query = "SELECT username FROM utenti WHERE username = '$user_check' ";
     /*
     // Utilizzo metodi mysqli_
     $result = mysqli_query($connection,$sql_query);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     */
     $result = $connection->query($sql_query);
     $row = $result->fetch_array();
     $login_session = $row['username'];
   } else {
     header("location:login.php");
   }
?>
