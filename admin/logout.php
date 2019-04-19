<?php
session_start();

unset($_SESSION['logged-in']);
unset($_SESSION['username']);
unset($_SESSION['password']);

session_destroy();
  header('Location: ../index.php')
?>
