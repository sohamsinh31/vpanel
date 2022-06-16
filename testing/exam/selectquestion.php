<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <title>Add paper</title>
	<link rel="stylesheet" href="1.css" type="text/css">
	<script src="datetimepicker_css.js"></script>	
		<script src="jquery-2.0.3.js">

		</script>
</head>
	<body>
<?php	
 include ('header.php');
?> 
<form action="questionpaper.php" method="POST">
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
<hr>
 <?php
$subid=$_POST["subid"];
$_SESSION['sub_id']=$subid;
if($subid==1)
echo "You have selected the Maths subject";
else
echo "You have selected the English subject";

echo"<br>";
$qtype=$_POST["qtype"];
echo "<input type='hidden' name='qtype' value='$qtype'>";

if($qtype=="tbq1word")
echo "You have selected one word questions";
else if($qtype=="tbqbrief")
echo "You have selected one brief questions";
else
echo "You have selected one MCQ questions";

echo"<br>";

$noofquestions=$_POST["txtquestion"];
echo "<input type='hidden' name='noofquestions' value='$noofquestions'>";

echo "Total number of questions are :$noofquestions";

echo"<br>";
$totmarks=$_POST["txtmarks"];
echo "<input type='hidden' name='totmarks' value='$totmarks'>";
echo "Total marks are :$totmarks";
echo"<br>";

$time=$_POST["txttime"];
echo "The time of examination is :$time";
echo "<input type='hidden' name='time' value='$time'>";

echo"<br>";
$date=$_POST["edate"];
echo "<input type='hidden' name='date' value='$date'>";

echo "The date of examination is :$date";
echo"<br>";
echo"<hr/>";

include ('connection.php');

echo "<h4><u>List of questions..</u></h4>";

if($qtype=="tbq1word")
{
$result=mysqli_query("Select * from tbq1word where subid=$subid",$conn);

$rows = mysqli_num_rows($result);
echo "<table border='1'><tr> <th>Sr No</th> <th>Question</th> <th>Answer</th><th>Selected question</th></tr>";

for ($j = 0 ; $j < $rows ; ++$j)
	{
		$row = mysqli_fetch_array($result); 
		echo "<tr>";   
	
		echo "<td>".$row['wordid']."</td>";
		echo "<td>".$row['wquestion']."</td>";
		echo "<td>".$row['wanswer']."</td>";
		echo "<td><input type='checkbox' name='$row[wordid]' value='$row[wquestion]'></td>";
		echo "</tr>"; 
	}
echo "</table>";
}

else if($qtype=="tbqbrief")
{

$result=mysqli_query("Select * from tbqbrief where subid=$subid",$conn);

$rows = mysqli_num_rows($result);
echo "<table border='1'><tr> <th>Sr No</th> <th>Question</th> <th>Answer</th><th>Selected question</th></tr>";

for ($j = 0 ; $j < $rows ; ++$j)
	{
		$row = mysqli_fetch_array($result); 
		echo "<tr>";   
		echo "<td>".$row['bid']."</td>";
		echo "<td>".$row['bquestion']."</td>";
		echo "<td>".$row['banswer']."</td>";
		echo "<td><input type='checkbox' name='$row[bid]' value='$row[bquestion]'></td>";
		echo "</tr>"; 
	}

echo "</table>";

}
else
{
$result=mysqli_query("Select * from tbqmcq where subid=$subid",$conn);

$rows = mysqli_num_rows($result);
echo "<table border='1'><tr> <th>Sr No</th> <th>Question</th> <th>Option1</th><th>Option2</th><th>Option3</th><th>Option4</th><th>Selected ans</th></tr>";

for ($j = 0 ; $j < $rows ; ++$j)
	{
		$row = mysqli_fetch_array($result); 
		echo "<tr>";   
		echo "<td>".$row['mcqid']."</td>";
		echo "<td>".$row['mcqquestion']."</td>";
		echo "<td>".$row['mcqanswer1']."</td>";
		echo "<td>".$row['mcqanswer2']."</td>";
		echo "<td>".$row['mcqanswer3']."</td>";
		echo "<td>".$row['mcqanswer4']."</td>";
		echo "<td><input type='checkbox' name='$row[mcqid]' value='$row[mcqquestion]'></td>";
		echo "</tr>"; 
	}

echo "</table>";
}

 
?>
<INPUT TYPE="button" VALUE="Add new one word question" ONCLICK="location.href='add1word.php'"/>
<INPUT TYPE="button" VALUE="Add new brief question" ONCLICK="location.href='addbrief.php'"/>
<INPUT TYPE="button" VALUE="Add new MCQ question" ONCLICK="location.href='addmcq.php'"/>


<input type="submit"/>

</div>
</div>
</form>
</body>
</html>
