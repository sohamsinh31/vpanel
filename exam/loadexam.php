<?php
session_start();
$tid = $_SESSION['id'];
include("../function.php");
$q = "SELECT * FROM studentinfo WHERE id='$tid'";
$r1 = mysqli_query($con,$q);
while($roww=$r1->fetch_assoc()){
    $branch = $roww['branch'];
    $sem = $roww['semester'];
    $degree = $roww['degree'];
$sql = "SELECT * FROM examtable WHERE degree = '$degree' AND sem = '$sem'";
$result = mysqli_query($con, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
  $output = '<table border="0" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
              </tr>';

         while($row = mysqli_fetch_assoc($result)){
                $rrr = $row['pdfurl'];
                $output .= '<td>
                <a href="../admin/'.$row['pdfurl'].'" style="color:inherit;">
                <button class="button">
                <div id="classes">
            '.$row['date'].'
                </div>
                </button>
                <br>
                '.$row['degree'].'</a>';
              }
    $output .= "</table>";

    mysqli_close($con);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}
}
?>

