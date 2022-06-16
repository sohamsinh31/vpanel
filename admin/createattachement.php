<?php
$classid = $_POST['classid'];
$file = $_POST['file'];
$type = $_POST['type'];
$title = $_POST['name2'];
$con = mysqli_connect('localhost','root','','vpanel');
if($type=='video' || $type=='image' || $type=='pdf'){
    if($_FILES['file']['name'] != ''){
        $test = explode('.', $_FILES['file']['name']);
        $extension = end($test);    
        $name = rand(100,999).'.'.$extension;
        mkdir('attachements/'.$classid.'');
    
        $location = 'attachements/'.$classid.'/'.$name;
        if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
            $q = "INSERT into attachements(`classid`,`name`,`path`,`type2`) values ('{$classid}','{$title}','{$location}','{$type}')";
            mysqli_query($con,$q) or die("failed");
        } else {
            echo "failed";
        }
    }
}
// else if($type='image'){
//     if($_FILES['file']['name'] != ''){
//         $test = explode('.', $_FILES['file']['name']);
//         $extension = end($test);    
//         $name = rand(100,999).'.'.$extension;
//         mkdir('attachements/'.$classid.'');
    
//         $location = 'attachements/'.$classid.'/'.$name;
//         move_uploaded_file($_FILES['file']['tmp_name'], $location);
//     }
// }
// else if($type='link'){
//     $q = "INSERT into attachements(classid,name,path,type) values ('{$classid}','{$title}',' ','{$type}')";
//     mysqli_query($con,$q) or die("failed");
//     echo "1";
// }
else{
    echo "hi";
}

?>