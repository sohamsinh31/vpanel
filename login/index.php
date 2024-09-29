<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once $_SERVER['DOCUMENT_ROOT'] . "/Utils/Auth.php";

header("Access-Control-Allow-Origin:" . " " . CORS_ORIGIN);
header("Access-Control-Allow-Headers:" . " " . CORS_HEADERS);
header("Access-Control-Allow-Methods:" . " " . CORS_METHODS);
header("Access-Control-Allow-Credentials:" . " " . CORS_CREDENTIALS);

function extractData()
{
    $contentType = $_SERVER['CONTENT_TYPE'];
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
}
