<?php

// Path to the config file
$configFilePath = 'config.php';

// Check if the config.php file already exists
if (file_exists($configFilePath)) {
    die("Installation already completed. To reinstall, delete the config.php file first.\n");
}

// Validate and sanitize input data
function sanitize($data) {
    return htmlspecialchars(trim($data));
}

$db_server = sanitize($_POST['db_server'] ?? '');
$db_username = sanitize($_POST['db_username'] ?? '');
$db_password = sanitize($_POST['db_password'] ?? '');
$db_name = sanitize($_POST['db_name'] ?? '');
$api_key = sanitize($_POST['api_key'] ?? '');
$allowed_origins = sanitize($_POST['allowed_origins'] ?? '');

// Convert allowed origins to an array
$allowed_origins_array = explode(',', $allowed_origins);

// Write configuration to config.php
$configContent = "<?php\n\n";
$configContent .= "define('DB_SERVER', '$db_server');\n";
$configContent .= "define('DB_USERNAME', '$db_username');\n";
$configContent .= "define('DB_PASSWORD', '$db_password');\n";
$configContent .= "define('DB_NAME', '$db_name');\n";
$configContent .= "define('API_KEY', '$api_key');\n";
$configContent .= "define('ALLOWED_ORIGINS', " . var_export($allowed_origins_array, true) . ");\n";
$configContent .= "define('CORS_HEADERS', 'Content-Disposition, Accept-Encoding, Content-Type, Accept, Origin, Authorization, X-Authorization, Redirect, X-CSRFToken');\n";
$configContent .= "define('CORS_METHODS', 'GET, POST, PUT, PATCH, DELETE, OPTIONS');\n";
$configContent .= "define('CORS_CREDENTIALS', 'true');\n";
$configContent .= "define('STORAGE', '/storage/assets/');\n";
$configContent .= "define('AUTH_TABLE', 'users');\n";
$configContent .= "define('AUTH_MODEL', 'User');\n";
$configContent .= "\n?>\n";

// Attempt to write to the config file and check for errors
if (file_put_contents($configFilePath, $configContent) !== false) {
    echo "Configuration saved to $configFilePath.<br>";
    echo "Installation complete. Please delete this script for security reasons.<br>";
    echo '<a href="index.html">Back to form</a>';
} else {
    $error = error_get_last();
    echo "Failed to write configuration to $configFilePath.<br>";
    echo "Error: " . $error['message'] . "<br>";
    echo "Check directory permissions and ensure PHP has write access to the target directory.<br>";
}

?>
