<?php
  session_destroy();
  unset($_SESSION["name"])
  header("Location: https://lit-kits.herokuapp.com/index.html");
?>
