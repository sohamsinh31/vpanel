<?php
session_start();
$tid = $_SESSION['id2'];
include('../../function.php');
$id = $_POST['id'];
$q = "DELETE FROM timetable WHERE id='$id'";
if($con->query($q)){
    echo "Successfully deleted!!";
}
?>