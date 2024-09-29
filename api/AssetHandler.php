<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Utils/common.php";

$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . STORAGE; // Change this to the actual path

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check for the API key in the request headers
    $providedApiKey = isset($_SERVER['HTTP_X_AUTHORIZATION']) ? trim($_SERVER['HTTP_X_AUTHORIZATION']) : '';

    if ($providedApiKey !== API_KEY) {
        respondWithError('Unauthorized');
    }

    // Check if a file is present in the request
    if (!isset($_FILES['asset']) || $_FILES['asset']['error'] !== UPLOAD_ERR_OK) {
        respondWithError('No valid asset file uploaded');
    }

    // Process the uploaded file
    $uploadedFile = $_FILES['asset']['tmp_name'];
    $originalFilename = basename($_FILES['asset']['name']);
    $fileExtension = pathinfo($originalFilename, PATHINFO_EXTENSION);

    // Generate a unique filename to avoid conflicts
    $uniqueFilename = uniqid('file_') . '.' . $fileExtension;

    $destinationPath = $uploadDirectory . '/' . $uniqueFilename;

    if (move_uploaded_file($uploadedFile, $destinationPath)) {
        // File upload successful
        respondWithJson(['filename' => STORAGE .  $uniqueFilename]);
    } else {
        // File upload failed
        respondWithError('Failed to upload the file');
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $providedApiKey = isset($_SERVER['HTTP_X_AUTHORIZATION']) ? trim($_SERVER['HTTP_X_AUTHORIZATION']) : '';

    if ($providedApiKey !== API_KEY) {
        respondWithError('Unauthorized');
    }
    $fp = fopen($_SERVER["DOCUMENT_ROOT"] . $_REQUEST["filename"], "r");
    if ($fp) {
        unlink($_SERVER["DOCUMENT_ROOT"] . $_REQUEST["filename"]);
        echo "File Deleted!";
    }
} else {
    respondWithError('Invalid request method');
}

function respondWithJson($data)
{
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

function respondWithError($message)
{
    $errorResponse = ['error' => $message];
    respondWithJson($errorResponse);
}
