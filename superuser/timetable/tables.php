<?php
session_start();
$tid = $_SESSION['id2'];
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'vpanel');
$id = $_POST['id'];
$q = "DELETE FROM timetable WHERE id='$id'";
if($con->query($q)){
    echo "Successfully deleted!!";
}
?>