<?php
$con = mysqli_connect("localhost","root","","vpanel");
$q = " SELECT studentname FROM `studentinfo` WHERE branch = 'cse'";
$result = mysqli_query($con,$q);
$test = array(mysqli_fetch_all($result));
echo print_r($test);
echo "<br>";
 asort($test);
foreach($test as $x => $x_value) {
    foreach($x_value as $y => $x_value2){
        asort($x_value2);
        echo ($x_value2);
        foreach($x_value2 as $z => $x_value3){
          echo "Key=" . $z . ", Value=" . $x_value3;
          echo "<br>";
          echo count($x_value3);
            }
     }
  }

//}
?>