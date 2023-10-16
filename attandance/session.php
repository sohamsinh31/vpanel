<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start([
    'cookie_lifetime' => 86400,
  ]);

  $_SESSION['id'] = $_POST['id'];

  header('location: index.php');
  exit(1);

?>