<?php

$host = "localhost";
 $id = "root";
 $pass = "";
 $database = "dbexam";
 $user = "SiteAdmin";
 $errordb="Unable to select database";
 $error = "Unable to connect to the database check again..!!";
$conn = mysqli_connect($host,$id,$pass) or die ($error);
mysqli_select_db($conn,$database)or die ($errordb);
 ?>