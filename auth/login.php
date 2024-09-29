<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once $_SERVER['DOCUMENT_ROOT'] . "/Utils/constants.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Utils/Auth.php";

// print_r($_SERVER);

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    $allowedOrigin = getAllowedOrigin($_SERVER);
    print_r($allowedOrigin);
    if ($allowedOrigin) {
        header("Access-Control-Allow-Origin: " . $allowedOrigin);
        header("Access-Control-Allow-Headers: " . CORS_HEADERS);
        header("Access-Control-Allow-Methods: " . CORS_METHODS);
        header("Access-Control-Allow-Credentials: " . CORS_CREDENTIALS);
    } else {
        header("HTTP/1.1 403 Forbidden");
        echo 'Origin not allowed';
    }
    exit();
}

// Handle actual request
$allowedOrigin = getAllowedOrigin($_SERVER);
if ($allowedOrigin) {
    header("Access-Control-Allow-Origin: " . $allowedOrigin);
    header("Access-Control-Allow-Headers: " . CORS_HEADERS);
    header("Access-Control-Allow-Methods: " . CORS_METHODS);
    header("Access-Control-Allow-Credentials: " . CORS_CREDENTIALS);
} else {
    header("HTTP/1.1 403 Forbidden");
    echo 'Origin not allowed';
}

function extractData()
{
    $contentType = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';
    $requestData = '';

    if ($contentType === 'application/json') {
        $requestData = json_decode(file_get_contents("php://input"), true);
    } elseif ($contentType === 'application/x-www-form-urlencoded') {
        $requestData = $_POST;
    } else {
        // echo "Unsupported request";
        return false;
    }

    return $requestData;
}

$auth = new AuthHandler();
$data = extractData();
if ($data) {
    $auth->authenticate($data);
}else{
    $auth->respondWithHtml("Provide login data or go to <a href='/login.php'>Login</a> page");
}
