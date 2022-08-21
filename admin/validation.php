<?php
session_start([
  'cookie_lifetime' => 86400,
]);
$next = $_POST['next'];
echo $next;
// header('location:login.php');
$con = mysqli_connect('localhost','root');
if($con){
    echo "connection was successfull";
}
else{
    echo "no connection";
}
$required = array('email' , 'password');

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
#$name = $_POST['user'];
$pass = $_POST['password'];
$email = $_POST['email'];
$q = " SELECT * FROM `teacher` WHERE email = '$email' AND password = '$pass'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
if($num == 1){
    #$_SESSION['username2'] = $name;
    
    while($row = mysqli_fetch_assoc($result)){
      $_SESSION['id2'] = $row['id'];
      if($next){
        header('location:'.$next.'');
      }
      header('location:index');
    }
}
else{
    header('location:signup');
}
}
?>