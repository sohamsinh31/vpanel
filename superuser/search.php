<?php 
include('../function.php');
include('header.php');
$search = $_POST['sch'];
$q1 = "SELECT * FROM studentinfo WHERE enrollment = '$search' OR studentname LIKE '%$search%'";
$q2="SELECT * FROM teacher WHERE teachername LIKE '%$search%'";
$rslt = $con->query($q1) or die("mysqli error");
$rslt2 = $con->query($q2) or die("mysqli error");

echo '
<!DOCTYPE html>
<html lang="en">
<head>
<link href="../../js/bootstrap.min.js" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
        $q="SELECT * FROM `branches`";
        $result=$con->query($q);
        $row2 = $result->fetch_all(MYSQLI_ASSOC);
        $branches=array();
        $branchesn=array();
        $degree = array();
        foreach($row2 as $r){
            array_push($degree,$r['degree']);
             array_push($branches,$r['name']);
            array_push($branchesn,$r['id']);
        }
        echo "<form method='post' action='update' enctype='multipart/form-data'>
        <table class='table table-bordered' style='text-align: left; width: 100%;' border='1' cellpadding='2' cellspacing='2'>";
         echo "<tbody>";
           echo "<tr>";
             echo "<td>Name of student:<input type='text' value='".$row['studentname']."' name='studentname'></td>";
             echo "<td>Image:<img style='width: 75px; height: 80px;'
         alt='' src='http://".$_SERVER['SERVER_NAME'].'/'.$row['photourl']."'></td>";
           echo "</tr>";
            echo "<tr>";
              echo "<td>D.O.B:<input type='date' value='".$row['dob']."' name='dob'></td>";
              echo "<td>Age:<input name='age' type='number' value='".$row['age']."'></td>";
            echo "</tr>";
            echo "<tr>";
             echo "<td>Address:<input name='add' type='text' value='".$row['address']."'></td>";
              echo "<td>Gender:".$row['gender']."</td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td>Pincode:<input name='pin' type='number' value='".$row['pincode']."'></td>";
             echo "<td>Mobile:<input name='mob' type='number' value='".$row['mobile']."'></td>";
           echo "</tr>";
            echo "<tr>";
             echo "<td>Email:<input name='email' type='email' value='".$row['email']."'></td>";
              echo "<td>Fathers Name:<input name='fname' type='text' value='".$row['fathername']."'></td>";
            echo "</tr>";
            echo "<tr>";
             echo "<td>Profession of father:".$row['proffesionf']."</td>";
            echo  "<td>Father's Mobile:<input name='fmobile' type='number' value='".$row['mobilef']."'></td>";
            echo "</tr>";
            echo "<tr>";
             echo "<td>Morther's name:<input name='mname' type='text' value='".$row['mothername']."'></td>";
              echo "<td>profession of mother:".$row['proffesionm']."</td>";
            echo "</tr>";
            echo "</tr>
            <td><select value='".$row['branchid']."' class='form-control selectpicker'  name='branch' data-live-search='true'>'";
            for($i=0;$i<sizeof($branches);$i++){
                echo '<option value="'.$branchesn[$i].'">'.$degree[$i].'-'.$branches[$i].'</option>';
            }
            
                 echo "'</select><td>Sem:".$row['semester']."</td></tr>";
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
           <td>Enrollment:".$row['enrollment']."</td>
           <td>Mother's mobile:<input name='mmobile' type='number' value='".$row['mobilem']."'></td></tr>";
          echo "</tbody>";
        echo "</table>
        <input type='hidden' name='id' value='".$row['id']."'>
        <button class='btn btn-success'>UPDATE</button>
        </form>";
        }
}
$output1 = '
<table class="table table-bordered">
<tr class="success">
<th>Teacherid</th>
<th>Name</th>
<th>Email</th>
<th>Proffession</th>
</tr>
';
if($rslt2->num_rows > 0){
    while($row2= mysqli_fetch_assoc($rslt2)){
            $output1 .= '<tr><td>'.$row2['id'].'</td><td>'.$row2['teachername'].'</td><td>'.$row2['email'].'</td><td>'.$row2['profession'].'</td></tr>';
        }
        $output1.='</table>';
        echo $output1;
}
echo '</head>
<body>' ;
?>