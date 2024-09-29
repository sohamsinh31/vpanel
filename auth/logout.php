<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require $_SERVER['DOCUMENT_ROOT'] . "/Utils/Auth.php";

$auth = new AuthHandler();

echo $auth->logoutUser();
