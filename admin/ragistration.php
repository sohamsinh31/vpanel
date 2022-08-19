<?php
include('../function.php');
$required = array('user','degree','branch');
$error = false;
foreach($required as $field){
    if(empty($_POST[$field])){
        $error = true;
    }
}
if($error){
    echo "All fields are required";
}
else {
    echo "Processed...";
    $name = $_POST['user'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    $degree = $_POST['degree'];
    $branch = $_POST['branch'];
    $prof = $_POST['prof'];
    $q = "SELECT * FROM `teacher` where teachername = '$name'";
    $result = mysqli_query($con,$q);
    $num = mysqli_num_rows($result);
    if($num == 1){
        echo "user already exists";
        header('location:login');
    }
    else{
        $qy = "INSERT into `teacher` (`teachername`,`degree`,`branch`,`email`,`password`,`proffesion`) values ('$name','$degree','$branch','$email','$password','$prof')";
        mysqli_query($con,$qy) or die('Error: '. mysqli_error($con) );
        echo "success";
        header('location:login');
    
    }
}
?>