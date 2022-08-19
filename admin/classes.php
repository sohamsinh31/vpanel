<?php 
$class = $_GET['id'];
session_start();
if(!isset($_SESSION['id2'])){
    header('location:login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../styles.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <style>
        .button1{
            background-color: transparent;
            color: white;
            width: 100%;
            border:none;
            float:left;
        }
        #classes{
        width: 85%;
        left: 1.5%;
    padding: 20px;
    position: relative;
    border: 2px solid gold;
    border-radius: 15px;
    font-size: 40px;
    text-align: center;
    background-color: #ffffff10;
    backdrop-filter: blur(12px);
    z-index: -1;
    margin-top:8px;
}
        a{
            color:inherit;
        }
        #createclass{
            width:96%;
            height:125px;
            border:2px solid white;
            border-radius:15px;
            font-size:100px;
            text-align:center;
            background-color:#ffffff10;
            backdrop-filter: blur(12px);
            z-index:1;
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
            z-index: 1;
        }
        #fixed{
            width:100%;
            position: fixed;
            top:0;
        }
    </style>
</head>
<body>
<div id="fixed">
<button class="button1">
    <div id="createclass">
        +
    </div>
    </button>
    </div>
    <div id="toCreate">
        <a href="javascript:void(0)" onclick="document.getElementById('toCreate').style.display='none';" style="float:right;font-size:22px;color:inherit;">X</a>
        <br>
                <label>Title or link:</label>
                <br>
                <input id="name" style="width:100%;float:left;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="text" name="user" class="form-control">
                <br>
                <label>Choose file type:</label> 
                <select style="background-color:black;color:white;" id="type" name="type">
                    <!-- <option value="link">Link</option> -->
                    <option value="pdf">pdf</option>
                    <option value="video">video</option>
                    <!-- <option value="announce">Announcement</option> -->
                    <option value="image">Image</option>
    </select>
    <br>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <button style="background-color:blue;border-radius:12px;width:30%;color:white;" class="btn btn-primary" type="submit" id="save"  name="submit">CREATE</button>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div id="loadData">

    </div>
</body>
<script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
      $(document).ready(function(){
    // // Load Table Records
    function loadTable(){
      $.ajax({
        url : "loadattachement.php",
        type : "POST",
        data:{id:<?php echo $class; ?>},
        success : function(data){
          $("#loadData").html(data);
        }
      });
    }

    loadTable(); // Load Table Records on Page Load

    //new line
    $(document).on("click","#delete",function(e){
        e.preventDefault();
        var studentId = this.getAttribute("data-id");
        console.log(studentId);
        $.ajax({
          url: "delete-class.php",
          type:"GET",
          data: {id: studentId},
          success: function(data){
            //   if(data == 1){
            //     $(element).closest("tr").fadeOut();
            //   }else{
            //     $("#error-message").html("Can't Delete Record.").slideDown();
            //     $("#success-message").slideUp();
            //   }
           
            console.log(data);
            loadTable();
          }
        });
      });
      $('#createclass').on('click',function(){
        $('#toCreate').css("display","block");
        $("#save").on('click',function(e){
        e.preventDefault();
        let file1 = document.getElementById('fileToUpload').files[0];
        let name = $("#name").val();
        let type = $("#type").val();
        var form_data = new FormData();
        form_data.append("file",file1);
        form_data.append("name2",name);
        form_data.append("type",type);
        form_data.append("classid",<?php echo $class; ?>);
        console.log(name+type);
       $.ajax({
        url:"createattachement.php",
        type:"POST",
        data:form_data,
        contentType:false,
        cache:false,
        processData:false,
        success: function(data){
            loadTable();
            console.log(data);
        }
       })
    })
    });
});
    </script>
</html>