<?php
session_start();
if(!isset($_SESSION['id2'])){
  header('location:http://'.$_SERVER['SERVER_NAME'].'/admin/login?next='.$_SERVER['REQUEST_URI']);
}
include('../header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>classes</title>
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
        <h1>Classes</h1>
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
    <label>Class subject:</label>
                <br>
                <input id="subject" style="width:100%;float:left;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="text" name="user" class="form-control">
                <br>
                <label>Teacher name:</label>
                <br>
                <input id="name" style="width:100%;float:left;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="text" name="user" class="form-control">
                <br>
                <label>Choose degree:</label> 
                <select id="degree" name="degree">
    <option value="BE/BTECH">B.E/B.TECH</option>
    <option value="BSC">B.Sc</option>
    <option value="DIPLOMA">Diploma</option>
    </select>
    <br>
    <label>Choose branch:</label>  
<select id="branch" name="branch">
    <option value="CS">Computer science and engineering</option>
    <option value="ITE">Information technology and engineering</option>
    <option value="IT">Information technology</option>
    <option value="CH">Chemical engineering</option>
    <option value="CV">Civil engineering</option>
    <option value="MH">Mechanical engineering</option>
    <option value="CE">Computer engineering</option>
    <option value="PE">Pharmasutical engineering</option>
    </select>
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
<script type="text/javascript">
      $(document).ready(function(){
    // Load Table Records
    function loadTable(){
      $.ajax({
        url : "load.php",
        type : "POST",
        success : function(data){
          $("#table-data").html(data);
        }
      });
    }
    loadTable();
     // Load Table Records on Page Load
});

    $('#createclass').on('click',function(){
        $('#toCreate').css("display","block");
        $("#save").on('click',function(e){
            e.preventDefault();
        let subject = $("#subject").val();
        let name = $("#name").val();
        let degree = $("#degree").val();
        let branch = $("#branch").val();
        let sem = $("#sem").val();
        console.log(subject+name+degree+branch+sem);
       $.ajax({
        url:"createclass.php",
        type:"POST",
        data:{subject:subject,name:name,degree:degree,branch:branch,sem:sem},
        success: function(data){
            console.log(data);
        }
       })
    })
    });
</script>
</html>