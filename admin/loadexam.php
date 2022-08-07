<?php
session_start();
//$tid = $_SESSION['id2'];
include("../function.php");

$sql = "SELECT * FROM examtable";
$result = mysqli_query($con, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
  $output = '<table border="0" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
              </tr>';

         while($row = mysqli_fetch_assoc($result)){
                $rrr = $row['pdfurl'];
                $output .= '<td>
                <a href="'.$row['pdfurl'].'" style="color:inherit;">
                <button>
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
?>

