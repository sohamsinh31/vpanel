<?php
date_default_timezone_set('Asia/Calcutta');
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'vpanel');
$date = date('h:i:s',time());
$q = "SELECT * FROM timetable";
$result = $con->query($q);
while($row = $result->fetch_assoc()){
    $start = $row['starttime'];
    $end = $row['endtime'];
    if($date>$start && $date<$end){
        echo $row['subject'];
    }
}
?>