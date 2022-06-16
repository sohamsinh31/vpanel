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
<div id="papers_menu">
</div>
<hr>



</div>
</form>
</body>
</html>
