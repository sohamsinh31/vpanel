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

<form action="oneinsert.php" method="POST">
	
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

			<body>
			<hr>
<?php
$question = $_POST['txtquestion'];
$answer1= $_POST['txtanswer1'];
$answer2= $_POST['txtanswer2'];
$answer3= $_POST['txtanswer3'];
$answer4= $_POST['txtanswer4'];

include ('connection.php');
$email=$_SESSION['currentuser'];
$subid=$_POST["subid"];
$_SESSION['sub_id']=$subid;

$query ="SELECT max(mcqid) FROM tbqmcq";
$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
$row = mysql_fetch_row($result);
$max= $row[0];

$id=$max+1;

if($subid==1)
{
$select="INSERT INTO tbqmcq VALUES('$id','$question','$answer1','$answer2','$answer3','$answer4','$email','1')";
if (!mysql_query($select,$conn))
 {
 die('Error: ' . mysql_error($conn));

 }else
 echo "1 question is added";

}
else
{
$select="INSERT INTO tbqmcq VALUES('$id','$question','$answer1','$answer2','$answer3','$answer4','$email','2')";
if (!mysql_query($select,$conn))
 {
die('Error: ' . mysql_error($conn));

 }else
 echo "1 question is added";

}



?>
<a href ="addpaper.php">Go back to create paper</a>
</body>
</html>
