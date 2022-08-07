<?php
$branch = $_POST['branch'];
$file = $_POST['file'];
$sem = $_POST['sem'];
$date = $_POST['date'];
$degree = $_POST['degree'];

$con = mysqli_connect('localhost','root','','vpanel');
if($_FILES['file']['name'] != ''){
        $test = explode('.', $_FILES['file']['name']);
        $extension = end($test);    
        $name = rand(100,999).'.'.$extension;
        $location = 'attachements/exam/'.$name;
        if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
            $q = "INSERT INTO examtable(`pdfurl`,`date`,`branch`,`sem`,`degree`) values ('{$location}','{$date}','{$branch}','{$sem}','{$degree}')";
            mysqli_query($con,$q) or die("failed");
        } else {
            echo "failed2";
        }
    }
else{
    echo "hi";
}
?>