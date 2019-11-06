<?php
  session_name( 'Member' );
	session_start(); 
  session_destroy();
  header("Location: https://lit-kits.herokuapp.com/index.html");
?>
