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
        <table class="table table-bordered text-dark" border='1' width='25%'>
            <tr class="success text-white">
            <th>Starttime</th>
            <th>Endtime</th>
            <th>Class</th>
            <th>Teacherid</th>
            <th>Subject</th>
            <th>Branch</th>
            <th>Sem</th>
            <th>Degree</th>
            <th></th>
            </tr>
<!--  $output .= " -->
            <tr id='111'>
            <td><input type='time' value="16:32:55"  name='start[]' required/></td>
            <td><input type='time' value="17:32:55"  name='end[]' required/></td>
            <td><input type='text' name='class[]'required/></td>
            <td><input type='text' name='id[]' required/></td>
            <td><input type='text' name='sub[]' required/></td>
            <td>
            <select name="branch[]">
            <option value="CSE">Computer science and engineering</option>
            <option value="ITE">Information technology and engineering</option>
            <option value="IT">Information technology</option>
            <option value="CH">Chemical engineering</option>
            <option value="CV">Civil engineering</option>
            <option value="MH">Mechanical engineering</option>
            <option value="CE">Computer engineering</option>
            <option value="PE">Pharmasutical engineering</option>
            </select>
            </td>
            <td><input type='text' name='sem[]'required/></td>
            <td>
            <select name="degree[]">
            <option value="BE/BTECH">B.E/B.TECH</option>
            <option value="BSC">B.Sc</option>
            <option value="DIPLOMA">Diploma</option>
            </select>
            </td>
            <td><button style="background-color:red;color:white;" onclick="deletefun(111)">Delete</button></td>
            </tr>
            
 <!-- $output .= " -->
            <tr id='222'>
            <td><input type='time' value="16:32:55" name='start[]'required/></td>
            <td><input type='time' value="17:32:55" name='end[]'required/></td>
            <td><input type='text' name='class[]'required/></td>
            <td><input type='text' name='id[]' required/></td>
            <td><input type='text' name='sub[]' required/></td>
            <td>
            <select name="branch[]">
            <option value="CS">Computer science and engineering</option>
            <option value="ITE">Information technology and engineering</option>
            <option value="IT">Information technology</option>
            <option value="CH">Chemical engineering</option>
            <option value="CV">Civil engineering</option>
            <option value="MH">Mechanical engineering</option>
            <option value="CE">Computer engineering</option>
            <option value="PE">Pharmasutical engineering</option>
            </select>
            </td>
            <td><input type='text' name='sem[]'required/></td>
            <td>
            <select name="degree[]">
            <option value="BE/BTECH">B.E/B.TECH</option>
            <option value="BSC">B.Sc</option>
            <option value="DIPLOMA">Diploma</option>
            </select>
            </td>
            <td><button style="background-color:red;color:white;" onclick="deletefun(222)">Delete</button></td>
            </tr>
            </table>
            <table class="table table-bordered" width="25%" border='1' id='table'>
            </table>
            <button class="btn btn-primary" id='clickme'>Add</button>
            <button class="btn btn-success" type='submit'>Submit</button>
            </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    let i = 0;
    let html = ``;
    $("#clickme").on("click",function(e){ 
        let data =`
        <tr id='${i}'>
            <td><input type='time' value="16:32:55"  name='start[]' required/></td>
            <td><input type='time' value="17:32:55"  name='end[]'required/></td>
            <td><input type='text' name='class[]'required/></td>
            <td><input type='text' name='id[]' required/></td>
            <td><input type='text' name='sub[]' required/></td>
            <td>
            <select name="branch[]">
            <option value="CSE">Computer science and engineering</option>
            <option value="ITE">Information technology and engineering</option>
            <option value="IT">Information technology</option>
            <option value="CH">Chemical engineering</option>
            <option value="CV">Civil engineering</option>
            <option value="MH">Mechanical engineering</option>
            <option value="CE">Computer engineering</option>
            <option value="PE">Pharmasutical engineering</option>
            </select>
            </td>
            <td><input type='text' name='sem[]'required/></td>
            <td>
            <select name="degree[]">
            <option value="BE/BTECH">B.E/B.TECH</option>
            <option value="BSC">B.Sc</option>
            <option value="DIPLOMA">Diploma</option>
            </select>
            </td>
            <td><button style="background-color:red;color:white;" onclick='deletefun(${i})'>Delete</button></td>
            </tr>
            `;
        html+=data;
        i++;
        $("#table").html(
            html
        )
    e.preventDefault();
    
    });
$("#delete").on("click",function(e){
        let i = 0;
        $("#table").html(
            data
        )
        i++;
        e.preventDefault();
    });
function deletefun(dt){
    document.getElementById(`${dt}`).innerHTML="";
    // i = dt-1;
    // console.log(i)
}
// var timepicker = new TimePicker('time', {
//   lang: 'en',
//   theme: 'dark'
// });
// timepicker.on('change', function(evt) {
  
//   var value = (evt.hour || '00') + ':' + (evt.minute || '00');
//   evt.element.value = value;

// });
</script>
</html>
