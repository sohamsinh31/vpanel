<?php
session_start();
$tid = $_SESSION['id'];
include("function.php");
$q = "SELECT * FROM studentinfo where id = '$tid'";
$r2 = mysqli_query($con,$q);
$r1 = mysqli_num_rows($r2);
if($r1>0){
    while($row2=mysqli_fetch_assoc($r2)){
$branch = $row2['branch'];
$degeee = $row2['degree'];
$sql = "SELECT * FROM classes where degree='$degeee' AND branch='$branch'";
$result = mysqli_query($con, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
  $output = '<table border="0" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
              </tr>';

         while($row = mysqli_fetch_assoc($result)){
                $output .= '<td>
                <a style="color:inherit;" href="classes?id='.$row['id'].'">
                <button class="button1">
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
}
}
?>

