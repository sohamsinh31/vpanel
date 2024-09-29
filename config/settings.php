<?php

// Database connection settings
$servername = "localhost";
$username = "root"; // Change this to your MySQL username
$password = "root";     // Change this to your MySQL password
$dbname = "vconfig_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch configuration from the database
$sql = "SELECT name, value FROM sdc_configuration";
$result = $conn->query($sql);

$config = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $value = $row['value'];

        // Convert JSON strings to arrays if necessary
        if ($name == 'ALLOWED_ORIGINS') {
            $value = json_decode($value, true);
        }

        $config[$name] = $value;
    }
} else {
    echo "0 results";
}

$conn->close();

// Define all configuration settings dynamically
foreach ($config as $name => $value) {
    // Define the constant with the name and value from the database
    define($name, $value);
}

print_r($config); // To see the loaded configuration

// Example usage of dynamically defined constants
echo "API Key: " . API_KEY . "\n";
echo "Allowed Origins: " . implode(", ", ALLOWED_ORIGINS) . "\n";
echo "CORS Headers: " . CORS_HEADERS . "\n";
echo "CORS Methods: " . CORS_METHODS . "\n";
echo "CORS Credentials: " . CORS_CREDENTIALS . "\n";
echo "Storage Path: " . STORAGE . "\n";
echo "Auth Table: " . AUTH_TABLE . "\n";
echo "Auth Model: " . AUTH_MODEL . "\n";

// Your other code here...

?>
