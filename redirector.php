<?php

session_start();

if(!isset($_SESSION['id'])){
  // Dynamically detect the subfolder
  $subfolder = dirname($_SERVER['SCRIPT_NAME']);
  
  // Get the full current URL
  $current_url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  
  // Redirect to login with 'next' parameter
  header('Location: http://' . $_SERVER['SERVER_NAME'] . $subfolder . '/login.php?next=' . urlencode($current_url));
  exit();
}
