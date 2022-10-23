<?php
$student_id = $_GET['id'];
include('../function.php');
$sql = "DELETE FROM attachements WHERE id = {$student_id}";

if(mysqli_query($con, $sql)){
  echo 1;
}else{
  echo 0;
}

?>