<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <title>users page</title>
	<link rel="stylesheet" href="1.css" type="text/css">
		
		<script src="jquery-2.0.3.js">

		</script>
	

</head>
	<body>
<?php	

 include ('header.php');
?> 
<form action="user_retrive.php" method="POST">
<div id="bottom">


<div id="content">
 <hr>
 <h4>Welcome to ADMIN DASHBORD</h4>
 <hr>
<div id="menubar">
			<div id="menu1" class="menu_single_container"> <div class="padded_menu">Users</div> 
				<div id="drop1" class="drop">
					<ul>
						<li><a href ="#">Show Users</a></li>
						<li><a href ="delusers.php">Delete users</a></li>
					</ul>
				</div>
			</div>	
			<div id="menu2" class="menu_single_container"> <div class="padded_menu">Papers</div> 
				<div id="drop2" class="drop">
					<ul>
						<li><a href ="papers.php">Show papers</a></li>
						<li><a href ="addpaper.php">Add paper</a></li>
						<li>Delete paper</li>
						
					</ul>
				</div>	
			</div>
		
			</div>

<div id="papers_menu">


</div>
<hr>


</div>
<?php
echo "<h4><u>List of current users..</u></h4>";
include ('connection.php');

$result=mysql_query("Select * from tbuser",$conn);
$rows = mysql_num_rows($result);
echo "<table border='1'><tr> <th>Fname</th> <th>Lname</th> <th>Contact</th><th>Collg</th><th>board</th><th>Email</th><th>Paswd</th><th>Address</th><th>Country</th><th>Desc</th><th>Type</th></tr>";
for ($j = 0 ; $j < $rows ; ++$j)
	{
		$row = mysql_fetch_row($result); 
		echo "<tr>";   
		for ($k = 0 ; $k < 11 ; ++$k) 
		echo "<td>$row[$k]</td>"; 
		echo "</tr>"; 
	}
echo "</table>"; 
echo "<hr>";
?>
<hr>
</div>
</div>

</form>
</body>
</html>
