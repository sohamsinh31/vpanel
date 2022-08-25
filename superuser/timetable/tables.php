<?php
session_start();
$tid = $_SESSION['id2'];
date_default_timezone_set('Asia/Calcutta');
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'vpanel');
$date = date('h:i:s',time());
$q = "SELECT * FROM timetable WHERE teacherid='$tid'";
$json = array();
$result = $con->query($q);
$num = mysqli_num_rows($result);
if($num>0){
while($row = $result->fetch_assoc()){
    $start = $row['starttime'];
    $end = $row['endtime'];
    if($date>$start && $date<$end){
        $branch = $row['branch'];
        $degree = $row['degree'];
        $sem = $row['sem'];
        $ttid = $row['id'];
        $json[] = $row;
        echo $row['subject'];
    }
}
echo json_encode($json);
}
?>