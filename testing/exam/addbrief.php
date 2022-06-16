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

<form action="briefinsert.php" method="POST">
	
<?php	

 include ('header.php');
?> 

<div id="bottom">

<div id="content">
 <hr>
 <h4>Welcome to ADMIN DASHBORD</h4>
 <hr>
<div id="menubar">
			<div id="menu1" class="menu_single_container"> <div class="padded_menu">Users</div> 
				<div id="drop1" class="drop">
					<ul>
						<li><a href ="users.php">Show Users</a></li>
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
			</div>
	
<table border="2">

<tr>
		<td>Select the subject :</td>
		<td>
		<select name="subid">
			<option value="1">Maths</option>
			<option value="2">English</option>
		</select>	
		</td>		
	</tr>	

<tr>
<td>Enter the brief question :</td>
<td><input type="text" size="100" name="txtquestion"/></td>

</tr>
<tr>
<td>Enter the prefered answer :</td>
<td><input type="text" size="100" name="txtanswer"/></td>


</table>
<input type="submit" />


<hr>
</div>

</body>
</html>
