<?php
  session_start(); 
  session_destroy();
  header("Location: https://lit-kits.herokuapp.com/index.html");
?>
