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

    </style>
</head>

<body>
    <?php include 'header.php'; ?>
</body>

</html>