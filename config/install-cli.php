<?php

// Path to the config file
$configFilePath = 'config.php';

// Check if the config.php file already exists
if (file_exists($configFilePath)) {
    die("Installation already completed. To reinstall, delete the config.php file first.\n");
}

// Prompt the user for configuration details
echo "Welcome to the installation script. Please enter the required configuration values.\n";

// Get database details
echo "Enter MySQL server (default: localhost): ";
$server = trim(fgets(STDIN)) ?: 'localhost';

echo "Enter MySQL username (default: root): ";
$username = trim(fgets(STDIN)) ?: 'root';

echo "Enter MySQL password (default: empty): ";
$password = trim(fgets(STDIN)) ?: '';

echo "Enter MySQL database name: ";
$dbname = trim(fgets(STDIN));
if (empty($dbname)) {
    die("Database name cannot be empty.\n");
}

// Get additional configuration values
echo "Enter API Key: ";
$apiKey = trim(fgets(STDIN));

echo "Enter allowed origins (comma-separated): ";
$allowedOriginsInput = trim(fgets(STDIN));
$allowedOrigins = explode(',', $allowedOriginsInput);

// Set CORS and other configurations
$corsHeaders = 'Content-Disposition, Accept-Encoding, Content-Type, Accept, Origin, Authorization, X-Authorization, Redirect, X-CSRFToken';
$corsMethods = 'GET, POST, PUT, PATCH, DELETE, OPTIONS';
$corsCredentials = 'true';
$storagePath = '/storage/assets/';
$authTable = 'users';
$authModel = 'User';

// Write configuration to config.php
$configContent = "<?php\n\n";
$configContent .= "define('DB_SERVER', '$server');\n";
$configContent .= "define('DB_USERNAME', '$username');\n";
$configContent .= "define('DB_PASSWORD', '$password');\n";
$configContent .= "define('DB_NAME', '$dbname');\n";
$configContent .= "define('API_KEY', '$apiKey');\n";
$configContent .= "define('ALLOWED_ORIGINS', " . var_export($allowedOrigins, true) . ");\n";
$configContent .= "define('CORS_HEADERS', '$corsHeaders');\n";
$configContent .= "define('CORS_METHODS', '$corsMethods');\n";
$configContent .= "define('CORS_CREDENTIALS', '$corsCredentials');\n";
$configContent .= "define('STORAGE', '$storagePath');\n";
$configContent .= "define('AUTH_TABLE', '$authTable');\n";
$configContent .= "define('AUTH_MODEL', '$authModel');\n";
$configContent .= "\n?>\n";

// Write to the config file
if (file_put_contents($configFilePath, $configContent) !== false) {
    echo "Configuration saved to $configFilePath.\n";
} else {
    echo "Failed to write configuration to $configFilePath.\n";
}

echo "Installation complete. Please remove this script for security reasons.\n";

?>
