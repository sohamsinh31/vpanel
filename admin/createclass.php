<?php
session_start();
include('../function.php');
$teacherid = $_SESSION['id2'];
$subject = $_POST['subject'];
$teachername = $_POST['name'];
$degree = $_POST['degree'];
$branch = $_POST['branch'];
$sem = $_POST['sem'];
$q = "INSERT into `classes`(`subject`,`teachername`,`degree`,`branch`,`sem`,`teacherid`) values ('$subject','$teachername','$degree','$branch','$sem','$teacherid')";
$result = mysqli_query($con,$q) or ('Error: '. mysqli_error($con) );
if($result){
    echo "hi";
}
else{
    echo "error";
    echo $result;
}
?>