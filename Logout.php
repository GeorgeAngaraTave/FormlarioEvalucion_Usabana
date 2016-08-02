<?php
 session_start();
 unset($_SESSION['user_session']);
 
 if(session_destroy())
 {
     echo "OFF";
  header("Location: index.php");
 }
?>
