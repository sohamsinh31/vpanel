<?php
$con = mysqli_connect("localhost","root","","vpanel");
$q = " SELECT * FROM `schedule_list` WHERE description LIKE '%21SE02CS002%'";
$q3 = " SELECT DISTINCT title FROM `schedule_list` WHERE description LIKE '%21SE02CS002%'";
$q2 = " SELECT * FROM `schedule_list` WHERE absent LIKE '%21SE02CS002%'";
$result = mysqli_query($con,$q);
$result2 = mysqli_query($con,$q2);
$num = mysqli_num_rows($result);
$num2 = mysqli_num_rows($result2);
$sum = ($num+$num2);
$avg = ($num+$num2)-$num2;
$percentage = (100*$avg)/$sum."%";
$result3 = mysqli_query($con,$q3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .attandance{
            border:2px solid black;
            border-radius:12px;
            height:40px;
        }
        p{
            
        }
    </style>
</head>
<body>
    <?php
    while($row=mysqli_fetch_assoc($result3)){
        $subject = $row['title'];
        $query="SELECT * FROM `schedule_list` WHERE title='$subject' AND branch='CS' AND degree='BE/BTECH' AND description LIKE '%21SE02CS002%'";
        $query2="SELECT * FROM `schedule_list` WHERE title='$subject' AND branch='CS' AND degree='BE/BTECH' AND absent LIKE '%21SE02CS002%'";
        $resultt = mysqli_query($con,$query);
        $resultt2 = mysqli_query($con,$query2);
        $numm = mysqli_num_rows($resultt);
        $numm2 = mysqli_num_rows($resultt2);
        $summ2 = ($numm+$numm2);
        $avgg2 = ($numm+$numm2)-$numm2;
        $percentage2 = (100*$avgg2)/$summ2."%";
        echo '<div class="attandance"><p style="float:left;position:fixed;">'.$row['title'].'</p><p style="float:right;right:4%;position:absolute;">'.$percentage2.'</div>';
}
echo '<div class="attandance"><p style="float:left;position:fixed;">Total</p><p style="float:right;right:4%;position:absolute;">'.$percentage.'</div>';
    ?>
</body>
</html>