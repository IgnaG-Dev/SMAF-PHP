<?php
  require '../backend/bd/ctconex.php';
  session_destroy();
  $url = "login.php";
  header("Location: $url");
?>
