<?php
include('function.php');
$required = array('user','date','age','gender','address','pincode','mobile','email','password','fathername','proffesion_father','father_mobile','mothername','proffesion_mother','mother_mobile','physics_theorey','physics_practical','chemistry_practical','english','maths_theorey','chemistry_theorey','percentage');
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
    $name2 = explode(" ",$name);
    $password = $_POST['password'];
    $date = $_POST['date'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $fathername = $_POST['fathername'];
    $proffessionf = $_POST['proffesion_father'];
    $mobilef = $_POST['father_mobile'];
    $mothername = $_POST['mothername'];
    $proffessionm = $_POST['proffesion_mother'];
    $mobilem = $_POST['mother_mobile'];
    $physicst = $_POST['physics_theorey'];
    $physicsp = $_POST['physics_practical'];
    $chemistryt = $_POST['chemistry_theorey'];
    $chemistryp = $_POST['chemistry_practical'];
    $english = $_POST['english'];
    $maths = $_POST['maths_theorey'];
    $percentage = $_POST['percentage'];
    // $degree = $_POST['degree'];
    $branch = $_POST['branch'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $target_dir = "students/".$name2[0]."/";
    $random = round(microtime(true));
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $q = "SELECT * FROM `studentinfo` where email = '$email' && password = '$password'";
    $result = mysqli_query($con,$q);
    $num = mysqli_num_rows($result);
    if($num == 1){
        echo "user already exists";
    }
    else{
        $qy = "INSERT into `studentinfo`(studentname,dob,age,gender,address,pincode,mobile,email,password,photourl,fathername,proffesionf,mobilef,mothername,proffesionm,mobilem,physicst,physicsp,chemistryt,chemistryp,mathst,english,percentage,branchid,year,semester) values ('$name','$date','$age','$gender','$address','$pincode','$mobile','$email','$password','$target_file','$fathername','$proffessionf','$mobilef','$mothername','$proffessionm','$mobilem','$physicst','$physicsp','$chemistryt','$chemistryp','$maths','$english','$percentage','$branch','$year','$semester')";
        mysqli_query($con,$qy);
        userimage();
        enrollment($branch,$degree);
        header('location:login.php');
    }
}
?>