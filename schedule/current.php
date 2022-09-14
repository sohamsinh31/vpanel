<?php
if($_SERVER['REQUEST_METHOD'] !='GET'){
    echo "<script> alert('Error: No data to save.'); location.replace('./index') </script>";
    exit;
}
session_start();
if(!isset($_SESSION['id2'])){
    echo "<script> alert('Bhai login karlo pahele');</script>";
}
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
        $datetime =  date('y-m-d',time());
        $startt = $datetime." ".$start;
        $endd = $datetime." ".$end;
        $arr = array(
            "startt"=>$startt,
            "endd"=>$endd
        );
        // echo $startt."<br>";
        // echo $endd;
        $row+= $arr;
        $json[] = $row;
    }
    // else{
    //     echo "No data aviable";
    // }
}
 echo json_encode($json);
}
else {
    echo json_encode($json);
}
?>