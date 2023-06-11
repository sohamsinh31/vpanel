<?php
session_start();
if(!isset($_SESSION['id2'])){
  header('location:http://'.$_SERVER['SERVER_NAME'].'/admin/login?next='.$_SERVER['REQUEST_URI']);
}
include('../../function.php');
include('../header.php');
$q="SELECT DISTINCT degree FROM `branches` ORDER BY degree";
$result=$con->query($q);
$row = $result->fetch_all(MYSQLI_ASSOC);
$branches=array();
$branchesn=array();
$degree = array();
foreach($row as $r){
    array_push($degree,$r['degree']);
}
?>
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
    <title>Exam</title>
    <link id="stylesheet" rel="stylesheet" type="text/css" href="../../styles.css"/>  
    <style>
        body {
            background-color:#0e0e0e;
            color:white;
        }
        #createclass{
            width:100%;
            height:125px;
            border:2px solid white;
            border-radius:15px;
            font-size:100px;
            text-align:center;
            background-color:#ffffff10;
            backdrop-filter: blur(12px);
        }
        button{
            background-color: transparent;
            color: white;
            width: 100%;
            border:none;
            float:left;
        }
        #toCreate{
            border-radius:12px;
            width:97%;
            height:50%;
            border:2px solid white;
            background-color:#ffffff10;
            backdrop-filter: blur(12px);
            display:none;
            position: fixed;
            top:15%;
        }
        #classes{
            width:100%;
            height:125px;
            border:2px solid white;
            border-radius:15px;
            font-size:50px;
            text-align:center;
            background-color:#ffffff10;
            backdrop-filter: blur(12px);
        }
    </style>
</head>
<body>

    <table id="main" border="0" cellspacing="0">
    <tr>
      <td id="header">
        <h1>Exams</h1>
        <button>
    <div id="createclass">
        +
    </div>
    </button>
      </td>
    </tr>
    <tr>
      </td>
    </tr>
    <tr>
      <td id="table-data">
      </td>
    </tr>
  </table>
  </button>
    <div id="toCreate">
        <a href="javascript:void(0)" onclick="document.getElementById('toCreate').style.display='none';" style="float:right;font-size:22px;color:inherit;">X</a>
    <label>Exam time table info:</label>
                <br>
                <input id="pdf" style="width:100%;float:left;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="file" name="pdf" class="form-control">
                <label>Date:</label>
                <input style="width:100%;float:right;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="date" name="date" id="date">
                <br>
    <label>Choose branch:</label>  
    <?php
echo '<select id="degree" class="form-control selectpicker"  name="branch" data-live-search="true">';
for($i=0;$i<sizeof($degree);$i++){
    echo '<option value="'.$degree[$i].'">'.$degree[$i].'</option>';
}

    echo '</select>';
    ?>
                <br>
                <label>Choose sem:</label>
                <select id="sem" name="semester">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                </select>
                <br>
    <button style="background-color:blue;border-radius:12px;width:30%;color:white;" class="btn btn-primary" type="submit" id="save"  name="submit">CREATE</button>

    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
    // Load Table Records
    function loadTable(){
      $.ajax({
        url : "loadexam.php",
        type : "POST",
        success : function(data){
          $("#table-data").html(data);
        }
      });
    }
    loadTable();


    $('#createclass').on('click',function(){
        $('#toCreate').css("display","block");
        $("#save").on('click',function(e){
            e.preventDefault();
        let file1 = document.getElementById('pdf').files[0];
        let date = $("#date").val();
        let degree = $("#degree").val();
        let branch = $("#branch").val();
        let sem = $("#sem").val();
        var form_data = new FormData();
        form_data.append("file",file1);
        form_data.append("date",date);
        form_data.append("degree",degree);
        form_data.append("branch",branch);
        form_data.append("sem",sem);
       $.ajax({
        url:"createexamtable.php",
        type:"POST",
        data:form_data,
        contentType:false,
        cache:false,
        processData:false,
        success: function(data){
            console.log(data);
            loadTable();
        }
       })
    })
    });
});
</script>
<script>
function handleclick(name){
  console.log(name);
}
</script>
</html>