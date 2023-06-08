<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start([
  'cookie_lifetime' => 86400,
]);
include('function.php');
$next = $_POST['next'];
if ($con) {
  echo "Connection was successful";
} else {
  echo "No connection";
}
$required = array('user', 'password');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach ($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
} else {
  mysqli_select_db($con, 'vpanel');
  $name = $_POST['user'];
  $pass = $_POST['password'];
  $email = $_POST['email'];
  $q = "SELECT * FROM `studentinfo` WHERE email = '$name' AND password = '$pass'";
  $result = mysqli_query($con, $q);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    $_SESSION['username'] = $name;
    if ($next) {
      header('location: ' . $next);
    } else {
      header('location: index.php');
    }
    while ($row = mysqli_fetch_array($result)) {
      $_SESSION['id'] = $row['id'];
    }
  } else {
    header('location: login.php?next=' . urlencode($next) . '&message=1');
  }
}
?>