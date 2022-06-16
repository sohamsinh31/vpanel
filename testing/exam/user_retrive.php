<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <title>users page</title>
</head>
	<body>
<?php	

 include ('header.php');
?> 
<form action="users.php" method="POST">
<div id="bottom">

<div id="content">
 <hr>
 <h4>Welcome to ADMIN DASHBORD</h4>
 <hr>
<div id="menu">
<ul type="none">
<li><a href="users.php"> Manage Users</a> </li>
<li><a href="papers.php"> Manage Papers</a></li>
</ul>
<hr>
</div>

<?php
include ('connection.php');
$selected_email = $_POST['Email'];
$query="DELETE FROM tbuser where uemail= '$selected_email'";
$result=mysql_query($query,$conn) or die("Error");
echo $selected_email." is deleted from the accounts..!!";
?>


</div>
</div>

</form>
</body>
</html>
