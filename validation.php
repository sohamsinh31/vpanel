<?php
session_start([
  'cookie_lifetime' => 86400,
]);
header('location:login.php');
$con = mysqli_connect('localhost','root');
$next = $_POST['next'];
if($con){
    echo "connection was successfull";
}
else{
    echo "no connection";
}
$required = array('user' , 'password');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
} else {
mysqli_select_db($con,'vpanel');
$name = $_POST['user'];
$pass = $_POST['password'];
$email = $_POST['email'];
$q = " SELECT * FROM `studentinfo` WHERE email = '$name' AND password = '$pass'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
if($num == 1){
    $_SESSION['username'] = $name;
    if($next){
      header('location:http://'.$_SERVER['SERVER_NAME'].$next.'');
    }
    while($row = mysqli_fetch_array($result)){
      $_SESSION['id'] = $row['id'];
    }
}
else{
    header('location:login.php');
}
}
?>