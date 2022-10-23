<?php
session_start();
if(!isset($_SESSION['id2'])){
    header('location:http://'.$_SERVER['SERVER_NAME'].'/admin/login?next='.$_SERVER['REQUEST_URI']);
}
include('../../function.php');
mysqli_select_db($con,'vpanel');
if(isset($_POST['tid'])){
    $startt = $_POST['start'];
    $end = $_POST['end'];
    $class = $_POST['class'];
    $branch = $_POST['branch'];
    $sem = $_POST['sem'];
    // $degree = $_POST['degree'];
    $id = $_POST['id'];
    $tid = $_POST['tid'];
    $subj = $_POST['sub'];
    $the_time = date('H:i:s', strtotime($startt));
    $the_time2 = date('H:i:s', strtotime($end));
    echo $branch;
    $q = "UPDATE timetable SET teacherid='$id',branch='$branch',subject='$subj',sem='$sem',class='$class',starttime='$the_time',endtime='$the_time2' WHERE id='$tid'";
    if($con->query($q)){
        header('location:http://'.$_SERVER['SERVER_NAME'].'/superuser/timetable/update');
    }
    else{
        echo "ERROR";
    }
}
else{
$start = $_POST['start'];
$total = sizeof($start);
for($i=0;$i<$total;$i++){
    $startt = $_POST['start'][$i];
    $end = $_POST['end'][$i];
    $class = $_POST['class'][$i];
    $branch = $_POST['branch'][$i];
    $sem = $_POST['sem'][$i];
    // $degree = $_POST['degree'][$i];
    $id = $_POST['id'][$i];
    $subj = $_POST['sub'][$i];
    $the_time = date('H:i:s', strtotime($startt));
    $the_time2 = date('H:i:s', strtotime($end));
    echo $branch;
    $q = "INSERT INTO timetable (`teacherid`,`branch`,`subject`,`sem`,`class`,`starttime`,`endtime`) VALUES ('$id','$branch','$subj','$sem','$class','$the_time','$the_time2')";
    #$con->query($q) or die(mysqli_error($con));
    if($con->query($q)){
        header('location:index');
    }
    else{
        echo "ERROR";
    }
}
}
?>