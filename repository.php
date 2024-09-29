<?php
session_start();
if(!isset($_SESSION['id'])){
  header('location:http://'.$_SERVER['SERVER_NAME'].'/login?next='.$_SERVER['REQUEST_URI']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta content="text/html; charset=ISO-8859-1"
 http-equiv="content-type">
  <title>Student repository</title>
  <style>
      body{
          background-color:#0e0e0e;
          color:white;
      }
      table{
          color:white;
      }
  </style>
</head>
<body>
    <?php include('header.php'); ?>
<?php
    include('function.php');
$id = $_SESSION['id'];
    $q = "SELECT * FROM `studentinfo` where id = '$id'";
    $result = mysqli_query($con,$q);
    $num = mysqli_num_rows($result);
    if($num>0){
        while($row = mysqli_fetch_assoc($result)){
echo "<table style='text-align: left; width: 100%;' border='1' cellpadding='2' cellspacing='2'>";
 echo "<tbody>";
   echo "<tr>";
     echo "<td>Name of student:".$row['studentname']."</td>";
     echo "<td>Image:<img style='width: 75px; height: 80px;'
 alt='' src='".$row['photourl']."'></td>";
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
  echo "</tbody>";
echo "</table>";
}
}
?>
</body>
</html>
