<?php
$start = $_POST['start'];
$total = sizeof($start);
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'vpanel');
for($i=0;$i<$total;$i++){
    $startt = $_POST['start'][$i];
    $end = $_POST['end'][$i];
    $class = $_POST['class'][$i];
    $branch = $_POST['branch'][$i];
    $sem = $_POST['sem'][$i];
    $degree = $_POST['degree'][$i];
    $id = $_POST['id'][$i];
    $subj = $_POST['sub'][$i];
    $the_time = date('h:i:s', strtotime($startt));
    $the_time2 = date('h:i:s', strtotime($end));
    echo $the_time.$the_time2;
    $q = "INSERT INTO timetable (`teacherid`,`branch`,`subject`,`sem`,`degree`,`class`,`starttime`,`endtime`) VALUES ('$id','$branch','$subj','$sem','$degree','$class','$the_time','$the_time2')";
    #$con->query($q) or die(mysqli_error($con));
    if($con->query($q)){
        header('location:tables');
    }
    else{
        echo "ERROR";
    }
}
?>