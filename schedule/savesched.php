<?php 
require_once('db-connect.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No data to save.'); location.replace('./index') </script>";
    $conn->close();
    exit;
}
if(isset($_POST['present'])){
$pr1 = $_POST['present'];
$prr1 = sizeof($pr1);
}
if(isset($_POST['absent'])){
    $ab1 = $_POST['absent'];
    $abb1 = sizeof($ab1);
}
$absent = '';
$present = '';
for($i=0;$i<$abb1;$i++){
    $absent .= $_POST['absent'][$i].',';
}
for($i=0;$i<$prr1;$i++){
    $present .= $_POST['present'][$i].',';
}
$start1 = $_POST['start1'];
$start2 = $_POST['start2'];
$end1 = $_POST['end1'];
$end2 = $_POST['end2'];
$startt = $start1." ".$start2;
$endd = $end1." ".$end2;
$branch = $_POST['branch'];
$sem = $_POST['sem'];
$degree = $_POST['degree'];
$sub = $_POST['sub'];
echo $startt."<br>".$endd;
$sql = "INSERT INTO `schedule_list` (`title`,`description`,`absent`,`degree`,`branch`,`semester`,`start_datetime`,`end_datetime`) VALUES ('$sub','$present','$absent','$degree','$branch','$sem','$startt','$endd')";
$save = $conn->query($sql);
if($save){
    echo "<script> alert('Schedule Successfully Saved.'); location.replace('./index') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();
?>