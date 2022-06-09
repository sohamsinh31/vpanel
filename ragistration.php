<?php
include('function.php');
$required = array('user','date','age','gender','address','pincode','mobile','email','fileToUpload','fathername','proffesion_father','father_mobile','mothername','proffesion_mother','mother_mobile','physics_theorey','physics_practical','chemistry_practical','english','maths_theorey','chemistry_theorey','percentage');
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
    $date = $_POST['date'];
    $age = $_POST['age'];
    $gender = $_POST['address'];
    $pincode = $_POST['pincode'];
    
}
?>