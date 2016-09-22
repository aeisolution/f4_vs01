<?php
   include('dbconfig.php');
   session_start();

   if(isset($_SESSION['login_user'])) {
     $user_check = $_SESSION['login_user'];
     $sql_query = "SELECT username FROM utenti WHERE username = '$user_check' ";
     $result = $connection->query($sql_query);
     $row = $result->fetch_array();
     $login_session = $row['username'];

    // recupero IDOperatore
     $sql_query = "SELECT ID FROM operatori WHERE username = '$user_check' ";
     $result = $connection->query($sql_query);
     
      if($result->num_rows==0) {
        $opSession = 0;
      } else {
         $row = $result->fetch_array();
         $opSession = $row['ID'];
      }
     

   } else {
     header("location:login.php");
   }
?>
