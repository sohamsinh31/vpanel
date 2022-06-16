<!DOCTYPE html>
<html>
<head>
    <title>Sign up page</title>
   
    <style type="text/css">
        .style3
        {
            width: 224px;
            text-align: left;
        }
        .style4
        {
            font-size: medium;
        }
        #Text1
        {
            width: 444px;
        }
        #Text2
        {
            width: 444px;
        }
        #Text3
        {
            width: 444px;
        }
        #Text4
        {
            width: 444px;
        }
        #Text5
        {
            width: 444px;
        }
        #Text6
        {
            width: 444px;
        }
        #Text7
        {
            width: 444px;
        }
        #Text8
        {
            width: 444px;
        }
        #Text9
        {
            width: 444px;
        }
        #Reset1
        {
            width: 65px;
        }
        #Button1
        {
            width: 66px;
        }
        #Submit1
        {
            width: 66px;
        }
        #Text10
        {
            width: 444px;
        }
        #TextArea1
        {
            width: 443px;
        }
        #Password1
        {
            width: 444px;
        }
        #Radio1
        {
            width: 24px;
        }
    </style>
   
 
</head>
<body>
<?php
 include ('header.php');
 include ('connection.php');?>

	<form action="signupscript.php" method="post">

       
<div id = bottom>
 <hr />
 <center><h1>SIGNUP FORM</h1>
     </center>
 <hr />
     <strong>
     <br class="style4" />
     <span class="style4">Personal details:<br />
     </span>
     <hr />
     </strong>
     <table style="width: 100%; height: 78px;">
         <tr>
             <td class="style3">
                 First Name:</td>
             <td>
                 <input name="Fname" id="Text1" type="text" />*</td>
         </tr>
         <tr>
             <td class="style3">
                 Last Name</td>
             <td>
                 <input name="Lname" id="Text2" type="text" /></td>
         </tr>
         <tr>
             <td class="style3">
                 Contact number:</td>
             <td>
                 <input name="contact" id="Text3" type="text" /></td>
         </tr>
         <tr>
             <td class="style3">
                 Collage name:</td>
             <td>
                 <input name="collg" id="Text4" type="text" /></td>
         </tr>
         <tr>
             <td class="style3">
                 Board/university name:</td>
             <td>
                 <input name="board" id="Text5" type="text" /></td>
         </tr>
         <tr>
             <td class="style3">
                 Email address:</td>
             <td>
                 <input name="email" id="Text6" type="text" /></td>
         </tr>
         <tr>
             <td class="style3">
                 Password:</td>
             <td>
                 <input name="passwd" id="Password1" type="password" />*</td>
         </tr>
         <tr>
             <td class="style3">
                 Address:</td>
             <td>
                 <textarea name="address" id="TextArea1" name="S1" rows="2"></textarea></td>
         </tr>
         <tr>
             <td class="style3">
                 Country:</td>
             <td>
                 <input name="country" id="Text7" type="text" /></td>
         </tr>
         <tr>
             <td class="style3">
                 Description:</td>
             <td>
                 <input name="desc" id="Text8" type="text" /></td>
         </tr>
         <tr>
             <td class="style3">
                 User type:</td>
             <td>
                 <input value="student" type="radio" name="type" />Student.&nbsp;
                 <input value="teacher" type="radio" name="type"/>Teacher.</td>
         </tr>
         <tr>
             <td class="style3">
                 &nbsp;</td>
             <td>
                 &nbsp;</td>
         </tr>
     </table>
     <hr />
     <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input id="Submit1" type="submit" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input id="Reset1" type="reset" value="Reset" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input id="Button1" type="button" value="Cancel" /><br />
     <hr />
     <br />
     <br />
     <br />

   <br/> </div>
   </form>

</body>
</html>
