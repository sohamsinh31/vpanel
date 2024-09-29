<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:http://' . $_SERVER['SERVER_NAME'] . '/login?next=' . $_SERVER['REQUEST_URI']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .button1 {
            background-color: transparent;
            color: white;
            width: 100%;
            border: none;
            float: left;
        }

        #classes {
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
            z-index: 0;
            margin-top: 8px;
        }

        a {
            color: inherit;
        }
    </style>
</head>

<body>
    <?php
    include('header.php');
    echo "<br>";
    include_once('function.php');
    $class = $_GET['id'];
    $q = "SELECT * FROM attachements where classid = $class";
    $result = mysqli_query($con, $q);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['type2'] == 'image') {
                echo '
                    <div id="classes">
                    <img  width="100%" height="30%" src="admin/' . $row['path'] . '">
                     ' . $row['name'] . '
                 </div>
                 </a>
                 ';
            } else if ($row['type2'] == 'pdf') {
                echo '
              
               <div id="classes">
               <a href="admin/' . $row['path'] . '">
                ' . $row['name'] . '
                </a>
            </div>
            
    
            ';
            } else {
                echo '
                    <div id="classes">
                    <video controls width="100%" height="30%" src="admin/' . $row['path'] . '"></video>
                     ' . $row['name'] . '
                 </div>
                 </a>
                 ';
            }

        }
    } else {
        echo "Sorry there was no attechements found";
    }
    ?>
</body>

</html>