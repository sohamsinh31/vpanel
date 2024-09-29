<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

include_once 'config_loader.php';

loadConfig('admin');
loadConfig('user');

echo ALLOWED_ORIGINS;
?>
