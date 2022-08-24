<?php
$branch = $_POST['branch'];
$sem = $_POST['sem'];
$degree = $_POST['degree'];
$class = $_POST['class'];
$subject = $_POST['sub'];
$startt = $_POST['startt'];
$endd = $_POST['endd'];
include("db-connect.php");
$q = "SELECT * FROM studentinfo WHERE branch = '$branch' AND semester = '$sem' AND degree = '$degree'ORDER BY enrollment ASC";
$result = $conn->query($q);
$num = $result->num_rows;
$output = '<h4>Your current class is:'.$class.' and subject is:'.$subject.'</h4>
<form id="form1" method="POST" enctype="multipart/form-data" action="savesched.php">';
if($num>0){
while($row = $result->fetch_assoc()){
    $enrolllment = "'".$row['enrollment']."'";
    $output .= '<p>'.$row['enrollment'].'<p><input style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="checkbox" id="attandance" name="present[]" value="'.$row['enrollment'].'"><label>Present</label><input style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" id="attandance"  type="checkbox" name="absent[]" value="'.$row['enrollment'].'"><label>Absent</label>
    ';
}
$output .= '
<input type="hidden" name="startt" value='.$startt.'>
<input type="hidden" name="startt" value='.$startt.'>
<input type="hidden" name="startt" value='.$startt.'>
<input type="hidden" name="startt" value='.$startt.'>
<input type="hidden" name="startt" value='.$startt.'>
<input type="hidden" name="endd" value='.$endd.'>
<button type="submit">submit</button>
</form>';
echo $output;
}
else{
    echo "No data aviable";
}
?>