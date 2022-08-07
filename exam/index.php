<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
    <link id="stylesheet" rel="stylesheet" type="text/css" href="../styles.css"/>  
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
      </td>
    </tr>
    <tr>
      <td id="table-data">
      </td>
    </tr>
  </table>
  </button>
</body>
<script src="../admin/js/jquery.js" type="text/javascript"></script>
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
});
</script>
</html>