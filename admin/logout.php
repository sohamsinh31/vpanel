<?php
session_start();
unset($_SESSION['id2']);
unset($_SESSION['username']);
session_destroy();
header('location:login.php?next=/admin/class');
?>