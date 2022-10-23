<?php
session_start();
$tid = $_SESSION['id2'];
include("../function.php");
$sql = "SELECT * FROM classes where teacherid='$tid'";
$result = mysqli_query($con, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
  $output .= '<table border="0" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
              </tr>';

         while($row = mysqli_fetch_assoc($result)){
                $output .= '<td>
                <a style="color:inherit;" href="classes?id='.$row['id'].'">
                <button>
                <div id="classes">
            '.$row['teachername'].'
                </div>
                </button>
                <br>
                '.$row['subject'].'</a>';
              }
    $output .= "</table>";

    mysqli_close($con);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}
?>

