<?php 
include('../function.php');
$search = $_POST['sch'];
$q1 = "SELECT * FROM studentinfo WHERE enrollment = '$search' OR studentname LIKE '%$search%'";
$q2="SELECT * FROM teacher WHERE teachername LIKE '%$search%'";
$rslt = $con->query($q1) or die("mysqli error");
$rslt2 = $con->query($q2) or die("mysqli error");
echo '
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </head>
<body>';
if($rslt->num_rows > 0){
    while($row = mysqli_fetch_assoc($rslt)){
        echo "<table class='table table-bordered' style='text-align: left; width: 100%;' border='1' cellpadding='2' cellspacing='2'>";
         echo "<tbody>";
           echo "<tr>";
             echo "<td>Name of student:".$row['studentname']."</td>";
             echo "<td>Image:<img style='width: 75px; height: 80px;'
         alt='' src='http://".$_SERVER['SERVER_NAME'].'/'.$row['photourl']."'></td>";
           echo "</tr>";
            echo "<tr>";
              echo "<td>D.O.B:".$row['dob']."</td>";
              echo "<td>Age:".$row['age']."</td>";
            echo "</tr>";
            echo "<tr>";
             echo "<td>Address:".$row['address']."</td>";
              echo "<td>Gender:".$row['gender']."</td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td>Pincode:".$row['pincode']."</td>";
             echo "<td>Mobile:".$row['mobile']."</td>";
           echo "</tr>";
            echo "<tr>";
             echo "<td>Email:".$row['email']."</td>";
              echo "<td>Fathers Name:".$row['fathername']."</td>";
            echo "</tr>";
            echo "<tr>";
             echo "<td>Profession of father:".$row['proffesionf']."</td>";
            echo  "<td>Father's Mobile:".$row['mobilef']."</td>";
            echo "</tr>";
            echo "<tr>";
             echo "<td>Morther's name:".$row['mothername']."</td>";
              echo "<td>profession of mother:".$row['proffesionm']."</td>";
            echo "</tr>";
            echo "</tr>";
              echo "<td colspan='2' rowspan='1'>12th
        information:--</td>";
        echo "</tr>";
            echo "</tr>";
              echo "<td>Physics theorey:".$row['physicst']."</td>";
              echo "<td>Physics practical:".$row['physicsp']."</td>";
              echo "</tr>";
            echo "</tr>";
             echo "<td>Chemistry theory:".$row['chemistryt']."</td>";
             echo "<td>Chemistry practical:".$row['chemistryp']."</td>";
              echo "</tr>";
            echo "</tr>";
             echo "<td>Maths:".$row['mathst']."</td>";
              echo "<td>English:".$row['english']."</td>";
           echo "</tr>";
           echo "<tr>
           <td>".$row['enrollment']."</td><td></td>";
          echo "</tbody>";
        echo "</table>";
        }
}
$output1 = '
<table class="table table-bordered">
<tr class="success">
<th>Teacherid</th>
<th>Name</th>
</tr>
';
if($rslt2->num_rows > 0){
    while($row2= mysqli_fetch_assoc($rslt2)){
            $output1 .= '<tr><td>'.$row2['id'].'</td><td>'.$row2['teachername'].'</td></tr>';
        }
        $output1.='</table>';
        echo $output1;
}
echo '</head>
<body>' ;
?>