<html>
<head>
    <title>
        Logout
    </title>  
</head>   
<body>
       <?php
          session_start();
          session_destroy();
        include 'header.php';
        Header("Location:index.php");
       ?>
    </body>
</html>
