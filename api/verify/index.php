<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Utils/common.php";

// Get parameters from the URL
$email = $_GET['email'];
$type = $_GET['type'];
header('Content-Type: application/json');
// Validate parameters
if (empty($email) || empty($type)) {
    echo json_encode(["error" => "Invalid parameters."]);
    exit;
}

// Create a new instance of the DB class
$db = new DB();
$conn = $db->connect();

// Check if the connection was successful
if (!$conn) {
    echo json_encode(["error" => "Connection to the database failed."]);
    exit;
}

// Sanitize input to prevent SQL injection
$email = mysqli_real_escape_string($conn, $email);
$type = mysqli_real_escape_string($conn, $type);

// Construct the custom query based on the type
$query = "UPDATE {$type} SET is_verified = 1 WHERE email = '{$email}'";

// Execute the query
$result = mysqli_query($conn, $query);

// Close the database connection
mysqli_close($conn);

// Check the result and send a response accordingly
if ($result) {
    // Successful verification
    echo json_encode(["success" => true]);
} else {
    // Verification failed
    echo json_encode(["error" => "Verification failed."]);
}
