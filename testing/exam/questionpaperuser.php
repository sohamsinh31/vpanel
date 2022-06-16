<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <title>Question paper page</title>
	<link rel="stylesheet" href="1.css" type="text/css">
		
		<script src="jquery-2.0.3.js">

		</script>
	


</head>
	<body>
<?php	

 include ('header.php');
?> 
<div id="bottom">


<hr>



<?php
include ('connection.php');
$subid=$_SESSION['sub_id'];
if($subid=='1')
{
$subject="Maths";
}
else
{
$subject="English";
}


$qtype=$_POST["qtype"];
if($qtype=='tbq1word')
{
$type="One word questions";
}
else if($qtype=='tbqbrief')
{
$type="Brief questions";
}
else
{
$type="Multiple choise questions";
}
$noofquestions=$_POST["noofquestions"];
$totmarks=$_POST["totmarks"];
$time=$_POST["time"];
$date=$_POST["date"];

echo "<table border='0' align='center' width='800'>";
echo"<tr>";
echo"<td>Subject :$subject</td>";

echo"<td colspan='2'></td>";

echo"<td align='right'>Marks : $totmarks</td>";
 
echo"</tr>";

echo"<tr>";
echo"<td>&nbsp;</td>";

echo"<td colspan='2'></td>";
echo"<td align='right'>Date :$date</td>";
 
echo"</tr>";
echo"<tr>";
echo"<td>&nbsp;</td>";

echo"<td colspan='2'></td>";
echo"<td align='right'>Time :$time</td>";
 
echo"</tr>";

echo"<tr>";
echo"<td>&nbsp;</td>";
echo"<td colspan='2'>&nbsp;</td>"; 
echo"<td>&nbsp;</td>"; 

echo"</tr>";


if ($qtype=="tbq1word")
{

$result=mysql_query("Select * from tbq1word where subid=$subid",$conn);
echo "</table>";
echo"<table border='0' align='center' width='800'>";
echo "<tr><td>Answer the $type:</td></tr>";
echo "<br>";
while($row = mysql_fetch_assoc($result))
{
$num = $row['wordid'];
if(isset($_REQUEST[$num]))
{
echo"<tr>";
echo"<td>";
$val = $_REQUEST[$num];
echo $val;
echo"</td>";
echo"</tr>";
}
}
echo "</table >";
}
else if ($qtype="tbqbrief")
{

$result=mysql_query("Select * from tbqbrief where subid=$subid",$conn);
echo "</table>";
echo"<table border='0' align='center' width='800'>";
echo "<tr><td>Answer the $type:</td></tr>";
echo "<br>";

while($row = mysql_fetch_assoc($result))
{
$num = $row['bid'];
if(isset($_REQUEST[$num]))
{
echo"<tr>";
echo"<td>";
$val = $_REQUEST[$num];
echo $val;
echo"</td>";
echo"</tr>";
}
}

echo "</table >";

}
else
{

$result=mysql_query("Select * from tbqmcw where subid=$subid",$conn);
echo "</table>";

echo"<table border='0' align='center' width='800'>";
echo "<tr><td>Answer the $type:</td></tr>";
echo "<br>";

while($row = mysql_fetch_assoc($result))
{
$num = $row['mcqid'];
if(isset($_REQUEST[$num]))
{
echo"<tr>";
echo"<td>";
$val = $_REQUEST[$num];
echo $val;
echo"</td>";
echo"</tr>";
}
}

echo "</table >";

}






?>
<button onclick="myFunction()">Print this page</button>

<script>
function myFunction()
{
window.print();
}
</script>

</div>

</body>

</html>