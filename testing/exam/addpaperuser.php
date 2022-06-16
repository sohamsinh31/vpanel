<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <title>Add paper</title>
		<link rel="stylesheet" href="1.css" type="text/css"/>
		  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="jquery.timepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery.timepicker.css" />


</head>
	<body>
<?php	

 include ('header.php');
?> 
<form action="selectquestionuser.php" method="POST">
<div id="bottom">


<div id="content">
 <hr>
 
<hr/>
<div id="papers_menu">
</div>
<table border="1" align ="center">
	<tr>
		<td colspan="2" align="center"><b>QUESTION PAPER DETAILS</b> </td>
	</tr>
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
		<td>Select the question type:</td>
		<td>
		<select name="qtype">
			<option value="tbq1word">One Word</option>
			<option value="tbqbrief">Brief</option>
			<option value="tbqqmcq">MCQ</option>
		</select>	
		</td>		
	</tr>
	
	<tr>
		<td>Enter total number of marks:</td>
		<td><input type="text" name="txtmarks"/></td>
	</tr>
	<tr>
		<td>Enter total number of questions:</td>
		<td><input type="text" name="txtquestion"/></td>
	</tr>		
	<tr>
		<td>Enter the time of examination:</td>
		<td>    <div class="demo">
                <p><input id="basicExample" name="txttime" type="text" class="time" /></p>
            </div>

            <script>
                $(function() {
                    $('#basicExample').timepicker();
                });
            </script>
	</td>
	</tr>
	<tr>
		<td>Enter the date of examination:</td>
		<td><input type="date" name="edate"/></td>
	</tr>
	<tr>
	<td colspan="2" align="center"><input type="submit"value="Select questions"/></td>
	</tr>

</div>

</form>
</body>
</html>
