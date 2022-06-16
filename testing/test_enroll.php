<?php
$con = mysqli_connect("localhost","root","","vpanel");
$degree = "BE/BTECH";
$q2 = " SELECT * FROM `studentinfo` WHERE branch = 'cs' AND degree='$degree'";
$result2 = mysqli_query($con,$q2);
$i = 001;
$enrollment = "";
while($test2 = mysqli_fetch_assoc($result2)){
  if($degree=='BE/BTECH'){
  echo "<br>";
  $enrollment = $test2['year'].'SE02'.$test2['branch'].str_pad($i,3,'0',STR_PAD_LEFT);
  echo $enrollment;
  echo "<br>";


}
if($degree=='BSC'){
 $enrollment = $test2['year'].'SC01'.$test2['branch'].$i;
 echo $enrollment;
}
if($degree=='DIPLOMA'){
  $enrollment = $test2['year'].'SD03'.$test2['branch'].$i;
}
$sid = $test2['id'];
$q = "UPDATE studentinfo SET enrollment = '$enrollment' WHERE id = '$sid'";
// $result =mysqli_query($con,$q)
if(mysqli_query($con,$q)){
  echo "success";
}
else {
  echo "kuchh or try karo bhai";
}
$i++;
}
?>