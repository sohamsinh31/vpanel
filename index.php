<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <style>
        body{
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
        .button1{
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
        table{
            color:white;
        }
        #classes{
            width:100%;
            height:125px;
            border:2px solid gold;
            border-radius:15px;
            font-size:40px;
            text-align:center;
            background-color:#ffffff10;
            backdrop-filter: blur(12px);
        }
        td {
            padding:1px;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <table id="main" border="0" cellspacing="0">
    <tr>
      <td id="header">
        <h1>Classes</h1>
        <!-- <button class="button1">
    <div id="createclass">
        +
    </div>
    </button> -->
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
</body>
<script src="admin/js/jquery.js" type="text/javascript"></script>
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
</script>
</html>