<?php
session_start();
$tid = $_SESSION['id'];
include("function.php");
$today = date("Y-m-d");
$q = "SELECT * FROM studentinfo where dob = '$today'";
$r2 = mysqli_query($con, $q);
$r1 = mysqli_num_rows($r2);
if ($r1 > 0) {
    while ($row = mysqli_fetch_assoc($r2)) {
        echo "Today is " . $row['studentname'] . "'s birthday from branch " . $row['branch'] . ".";
    }
} else {
    echo "No birthday's today";
}
?>