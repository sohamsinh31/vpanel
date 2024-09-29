<?php

// common.php
require $_SERVER["DOCUMENT_ROOT"] . "/Utils/constants.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Utils/ApiHandler.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Utils/Auth.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Utils/Router.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Utils/Model.php";

// // Handle preflight OPTIONS request
// if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
//     $allowedOrigin = getAllowedOrigin($_SERVER);
//     print_r($allowedOrigin);
//     if ($allowedOrigin) {
//         header("Access-Control-Allow-Origin: " . $allowedOrigin);
//         header("Access-Control-Allow-Headers: " . CORS_HEADERS);
//         header("Access-Control-Allow-Methods: " . CORS_METHODS);
//         header("Access-Control-Allow-Credentials: " . CORS_CREDENTIALS);
//     } else {
//         header("HTTP/1.1 403 Forbidden");
//         echo 'Origin not allowed';
//     }
//     exit();
// }

// // Handle actual request
// $allowedOrigin = getAllowedOrigin($_SERVER);
// if ($allowedOrigin) {
//     header("Access-Control-Allow-Origin: " . $allowedOrigin);
//     header("Access-Control-Allow-Headers: " . CORS_HEADERS);
//     header("Access-Control-Allow-Methods: " . CORS_METHODS);
//     header("Access-Control-Allow-Credentials: " . CORS_CREDENTIALS);
// } else {
//     header("HTTP/1.1 403 Forbidden");
//     echo 'Origin not allowed';
// }

error_reporting(E_ALL);
ini_set('display_errors', '1');
