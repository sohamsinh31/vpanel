<?php
$con = mysqli_connect('localhost','root','','vpanel');
    $q = "SELECT * FROM `studentinfo` where email = 'sohamb2019@gmail.com' && password = '1234567'";
    $result = $con->query($q);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo $row[0]['id'];
    ?>

