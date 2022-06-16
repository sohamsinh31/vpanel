<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <title>users page</title>
		<link rel="stylesheet" href="1.css" type="text/css"/>
		  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="jquery.timepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery.timepicker.css" />


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
						<li><a href ="#">Delete users</a></li>
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
$query = mysql_query("SELECT uemail from tbuser"); 
echo "<h4>Please select the email to delete the user</h4>";
echo '<select name="Email">'; 

while ($row = mysql_fetch_array($query)) {
   echo "<option>" .$row['uemail']. "</option>";
}

echo '</select>';

		 ?>

<input type = "submit" value="Delete user" name="deluser"/> 
<hr>
</div>
</div>

</form>
</body>
</html>
