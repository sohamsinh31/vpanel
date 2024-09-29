<?php

// Paths to config files
$adminConfigFilePath = 'admin-config.php';
$userConfigFilePath = 'user-config.php';

// Check if config files already exist
if (file_exists($adminConfigFilePath) || file_exists($userConfigFilePath)) {
    die("Installation already completed. To reinstall, delete the config files first.\n");
}

// Display form if no data has been submitted
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    include('install_form.html');
    exit;
}

// Function to sanitize input data
function sanitize($data)
{
    return htmlspecialchars(trim($data));
}

// Prepare form data
$adminConfig = sanitize($_POST['admin_config'] ?? '');
$userConfig = sanitize($_POST['user_config'] ?? '');

// Prepare content for config files
$adminConfigContent = "<?php\n\n" . $adminConfig . "\n?>\n";
$userConfigContent = "<?php\n\n" . $userConfig . "\n?>\n";

// Attempt to write to the admin config file and check for errors
if (file_put_contents($adminConfigFilePath, $adminConfigContent) === false) {
    $error = error_get_last();
    die("Failed to write to $adminConfigFilePath. Error: " . $error['message'] . "\n");
}

// Attempt to write to the user config file and check for errors
if (file_put_contents($userConfigFilePath, $userConfigContent) === false) {
    $error = error_get_last();
    die("Failed to write to $userConfigFilePath. Error: " . $error['message'] . "\n");
}

echo "Configuration saved. Installation complete. Please delete this script for security reasons.\n";
echo '<a href="admin_panel.php">Go to Admin Panel</a>';
echo '<br>';
echo '<a href="user_panel.php">Go to User Panel</a>';
