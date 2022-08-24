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
    $present .= $_POST['absent'][$i].',';
}
echo $absent."<br>".$present;
$conn->close();
?>