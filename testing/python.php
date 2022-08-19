<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="python2.php" method="post">
        <input type="file" name="download"/>
        <button type="submit">submit</button>
    </form>
    <div id="hello"></div>
</body>
<script src="../admin/js/jquery.js"></script>
<script>
    $(document).ready(function(){
        $.ajax({
            url:'http://127.0.0.1:8000/my',
            type:'GET',
            success:function(data){
                $.each(JSON.parse(data),function(key,value){
                    //console.log(value.id);
                    let hello = document.getElementById("hello");
                    hello.innerHTML="<img src="+${value.picture}+"/>";
                })
            }
        });
    });
</script>
</html>