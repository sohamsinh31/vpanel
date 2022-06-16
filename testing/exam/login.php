<?php include 'header.php';?>
<html>
    <head>
        <title>Login Here!!</title>
        <style type="text/css">
            #logindiv
            {
              margin-left: 450px;
            }
        </style>
        <script type="text/javascript">
          function validateLogin()
          {
              var uname=document.forms[login][uname].value;
              if(email==null || password=='')
              {
                  alert("Enter Username ");
                  return false;
              }
          }
        </script>
    </head>
	<div id="bottom">
	<hr/>
	<h1><u>LOGIN HERE !</u></h1>
	<hr/>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
    
        <div id="logindiv">
            <form name="login" action="login_process.php" method="post" class="leftdiv" onsubmit="return validateLogin()">
			<br/><br/><br/><br/>
            <table border="1">
                <tr><th colspan="2">Login Here</th></tr>
                <tr>
                    <td> Email:</td>
                    <td><input type="text" name="email"></td>
                </tr>

                <tr><td>Password:</td><td><input type="password" name="password"></td></tr>
                <tr><td colspan="2"><div align="center"><input  type="submit" value="Login" class="button"></div></td>
                    
                </tr>
                <tr>
                    <td colspan="2"><div align="center"><a href="contactadmin.php">Forgot Password?</a>&nbsp;|&nbsp;<a href="Signup.php">New User?</a></div></td>
                    
                </tr>
            </table>
        </form>
            </div>
			</div>
  
</html>