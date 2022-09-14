<?php
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No data to save.'); location.replace('./index') </script>";;
    exit;
}
session_start();
if(!isset($_SESSION['id2'])){
    echo "<script> alert('Bhai login karlo pahele');</script>";
}
$branch = $_POST['branch'];
$sem = $_POST['sem'];
$degree = $_POST['degree'];
$class = $_POST['class'];
$subject = $_POST['sub'];
$startt = $_POST['startt'];
$start1 = explode(" ",$startt)[0];
$start2 = explode(" ",$startt)[1]; 
$endd = $_POST['endd'];
$end1 = explode(" ",$endd)[0];
$end2 = explode(" ",$startt)[1];
include("db-connect.php");
$q = "SELECT * FROM studentinfo WHERE branchid = '$branch' AND semester = '$sem' ORDER BY enrollment ASC";
$result = $conn->query($q);
$num = mysqli_num_rows($result);
$output = '<h4>Your current class is:'.$class.' and subject is:'.$subject.'</h4>
<form id="form1" method="POST" enctype="multipart/form-data" action="savesched">';
if($num>0){
while($row = $result->fetch_assoc()){
    $enrolllment = "'".$row['enrollment']."'";
    $output .= '<p>'.$row['enrollment'].'<p><input style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="checkbox" id="attandance" name="present[]" value="'.$row['enrollment'].'"><label>Present</label><input style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" id="attandance"  type="checkbox" name="absent[]" value="'.$row['enrollment'].'"><label>Absent</label>
    ';
}
$output .= '
<input type="hidden" name="branch" value='.$branch.'>
<input type="hidden" name="sem" value='.$sem.'>
<input type="hidden" name="degree" value='.$degree.'>
<input type="hidden" name="sub" value='.$subject.'>
<input type="hidden" name="start1" value='.$start1.'>
<input type="hidden" name="start2" value='.$start2.'>
<input type="hidden" name="end1" value='.$end1.'>
<input type="hidden" name="end2" value='.$end2.'>
<button type="submit">submit</button>
</form>';
echo $output;
}
else{
    echo "No data aviable";
}
?>