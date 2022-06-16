<?php
$student_id = $_GET['id'];
$conn = mysqli_connect("localhost","root","","vpanel") or die("Connection Failed");
$sql = "DELETE FROM attachements WHERE id = {$student_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>