<?php
session_start();
if(!isset($_SESSION['id2'])){
    header('location:http://'.$_SERVER['SERVER_NAME'].'/admin/login?next='.$_SERVER['REQUEST_URI']);
}
include('../header.php');
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'vpanel');
$query = "SELECT * FROM teacher";
$result = $con->query($query);
$output1 = '
<table class="table table-bordered">
<tr class="success">
<th>Teacherid</th>
<th>Name</th>
</tr>
';
while($row = $result->fetch_assoc()){
    $output1 .= '<tr><td>'.$row['id'].'</td><td>'.$row['teachername'].'</td></tr>';
}
$output1.='</table>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
    <style>
        .nopadding {
    padding: 0 !important;
}

.content {
    padding: 20px;
}
.scrolll{
    overflow:scroll;
}
body{
  background-color:black;
  color:black;
}
    </style>
    <title>Document</title>
</head>
<body>
<div id="row">
  <div class="col-sm-4"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Show teachers</button>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Teacher</h4>
      </div>
      <div class="modal-body">
        <p><?php echo $output1; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="scrolll">
<form method='post' action='insert' enctype='multipart/form-data'>
        <table id="addMe" class="table table-bordered text-dark" border='1' width='25%'>
            <tr class="success text-white">
            <th>Starttime</th>
            <th>Endtime</th>
            <th>Class</th>
            <th>Teacherid</th>
            <th>Subject</th>
            <th>Branch</th>
            <th>Sem</th>
            <th></th>
            </tr>
<!--  $output .= " -->
            <tr>
            <td><input type='time' value="16:32:55"  name='start[]' required/></td>
            <td><input type='time' value="17:32:55"  name='end[]' required/></td>
            <td><input type='text' name='class[]'required/></td>
            <td><input type='text' name='id[]' required/></td>
            <td><input type='text' name='sub[]' required/></td>
            <td>
            <?php
            $q="SELECT * FROM `branches`";
            $result=$con->query($q);
            $row = $result->fetch_all(MYSQLI_ASSOC);
            $branches=array();
            $branchesn=array();
            $degree = array();
            foreach($row as $r){
                array_push($degree,$r['degree']);
                 array_push($branches,$r['name']);
                array_push($branchesn,$r['id']);
            }
$outputt= '<select class="form-control selectpicker"  name="branch[]" data-live-search="true">';
for($i=0;$i<sizeof($branches);$i++){
    $outputt.= '<option value="'.$branchesn[$i].'">'.$degree[$i].'-'.$branches[$i].'</option>';
}

    $outputt.= '</select>';
    echo $outputt;
    ?>
            </td>
            <td><input type='text' name='sem[]'required/></td>
            <td><button style="background-color:red;color:white;" type="button" onclick="deletefun(1)">Delete</button></td>
            </tr>
            
            <tr>
            <td><input type='time' value="16:32:55" name='start[]'required/></td>
            <td><input type='time' value="17:32:55" name='end[]'required/></td>
            <td><input type='text' name='class[]'required/></td>
            <td><input type='text' name='id[]' required/></td>
            <td><input type='text' name='sub[]' required/></td>
            <td>
            <?php
            echo $outputt;
    ?>
            </td>
            <td><input type='text' name='sem[]'required/></td>
            <td><button style="background-color:red;color:white;" type="button" onclick="deletefun(2)">Delete</button></td>
            </tr>
            </table>
            <button class="btn btn-primary" id='clickme'>Add</button>
            <button class="btn btn-success" type='submit'>Submit</button>
            </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    let i = 3;

    $("#clickme").on("click",function(e){ 
      e.preventDefault();
      let table1 = document.getElementById("addMe");
      let row = table1.insertRow(3);
      let cell1 = row.insertCell(0);
      let cell2 = row.insertCell(1);
      let cell3 = row.insertCell(2);
      let cell4 = row.insertCell(3);
      let cell5 = row.insertCell(4);
      let cell6 = row.insertCell(5);
      let cell7 = row.insertCell(6);
      let cell8 = row.insertCell(7);

      cell1.innerHTML=`<input type='time' value="16:32:55"  name='start[]' required/>`;
      cell2.innerHTML=`<input type='time' value="17:32:55" name='end[]'required/>`;
      cell3.innerHTML=`<input type='text' name='class[]'required/>`;
      cell4.innerHTML=`<input type='text' name='id[]' required/>`;
      cell5.innerHTML=`<input type='text' name='sub[]' required/>`;
      cell6.innerHTML='<?php echo $outputt ?>';
      cell7.innerHTML=`<input type='text' name='sem[]'required/>`;
      cell8.innerHTML=`<button style="background-color:red;color:white;" onclick="deletefun(${i})">Delete</button>`;

      i++;
    
    });
//     $("#deletefun").on("click",function(e){
//   e.preventDefault();
//   console.log("hi")
//   document.getElementById("addMe").deleteRow(1);
// })
function deletefun(e){
  
  document.getElementById("addMe").deleteRow(e);
}

</script>
</html>
