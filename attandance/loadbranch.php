<?php
$branch = $_POST['branch'];
$sem = $_POST['sem'];
$degree = $_POST['degree'];
include("db-connect.php");
$q = "SELECT * FROM studentinfo WHERE branch = '$branch' AND semester = '$sem' AND degree = '$degree'ORDER BY enrollment ASC";
$result = $conn->query($q);
$num = $result->num_rows;
$output = '<form id="form1" type="POST" name="form1">';
if($num>0){
while($row = $result->fetch_assoc()){
    $enrolllment = "'".$row['enrollment']."'";
    $output .= '<p>'.$row['enrollment'].'<p><input onclick="handlechange('.$enrolllment.')" style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="radio" id="attandance" name="'.$row['id'].'"value="'.$row['enrollment'].'"><label>Present</label><input onchange="Absent('.$enrolllment.')" style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" id="attandance"  type="radio" name="'.$row['id'].'" value="Absent"><label>Absent</label>
    ';
}
$output .= '
<input type="submit">
</form>
<button id="form11">Submit</button>';
echo $output;
}
?>