<?php
include('../function.php');
$required = array('studentname','age','pin','mob','email','fname','fmobile','mmobile','mname','dob');
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
    $name = $_POST['studentname'];
    $name2 = explode(" ",$name);
    $date = $_POST['dob'];
    $age = $_POST['age'];
    $address = $_POST['add'];
    $pincode = $_POST['pin'];
    $mobile = $_POST['mob'];
    $email = $_POST['email'];
    $fathername = $_POST['fname'];
    $mobilef = $_POST['fmobile'];
    $mothername = $_POST['mmobile'];
    $mobilem = $_POST['mmobile'];
    // $degree = $_POST['degree'];
    $branch = $_POST['branch'];
}
?>