<?php 
include('../function.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No data to save.'); location.replace('./index') </script>";
    $con->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

if(empty($id)){
    $sql = "INSERT INTO `schedule_list` (`title`,`description`,`absent`,`degree`,`branch`,`semester`,`start_datetime`,`end_datetime`) VALUES ('$title','$description','$absent','$degree2','$branch2','$semester2','$start_datetime','$end_datetime')";
}else{
    $sql = "UPDATE `schedule_list` set `title` = '{$title}', `description` = '{$description}',`absent`='{$absent}',`degree`='{$degree2}',`branch`='{$branch2}',`semester`='{$semester2}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' where `id` = '{$id}'";
}
$save = $con->query($sql);
if($save){
    echo "<script> alert('Schedule Successfully Saved.'); location.replace('./index') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$con->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$con->close();
?>