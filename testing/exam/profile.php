<?php
session_start();
if(isset($_SESSION['currentuser']))
{
echo"Welcome ".$_SESSION['currentuser']."this is ur profile";
}
else
echo"please login";


?>