<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

// Path to the config file
$configFilePath = 'db_config.php';

// Check if the config.php file already exists
if (file_exists($configFilePath)) {
    die("Installation already completed. To reinstall, delete the config.php file first.\n");
}

// Display form if no data has been submitted or on connection error
if ($_SERVER['REQUEST_METHOD'] != 'POST' || isset($_GET['retry'])) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Installation</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-5">
            <h1>Application Setup</h1>
            <?php
            if (isset($_GET['retry'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                echo 'Connection failed. Please check your database connection details and try again.';
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                echo '<span aria-hidden="true">&times;</span>';
                echo '</button>';
                echo '</div>';
            }
            ?>
            <form method="post">
                <div class="form-group">
                    <label for="db_server">Database Server</label>
                    <input type="text" class="form-control" id="db_server" name="db_server" required>
                </div>
                <div class="form-group">
                    <label for="db_username">Database Username</label>
                    <input type="text" class="form-control" id="db_username" name="db_username" required>
                </div>
                <div class="form-group">
                    <label for="db_password">Database Password</label>
                    <input type="password" class="form-control" id="db_password" name="db_password">
                </div>
                <div class="form-group">
                    <label for="db_name">Database Name</label>
                    <input type="text" class="form-control" id="db_name" name="db_name" required>
                </div>
                <button type="submit" class="btn btn-primary">Install</button>
            </form>
        </div>
    </body>

    </html>

<?php
    exit;
}

// Validate and sanitize input data
function sanitize($data)
{
    return htmlspecialchars(trim($data));
}

$db_server = sanitize($_POST['db_server']);
$db_username = sanitize($_POST['db_username']);
$db_password = sanitize($_POST['db_password']);
$db_name = sanitize($_POST['db_name']);

try {
    // Attempt database connection
    $conn = new mysqli($db_server, $db_username, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        // Redirect back to install.php with retry flag
        header("location: index.php?retry=true");
        exit;
    }
} catch (Exception $e) {
    header("location: index.php?retry=true");
    exit;
}

// Write configuration to config.php
$configContent = "<?php\n\n";
$configContent .= "define('DB_SERVER', '$db_server');\n";
$configContent .= "define('DB_USERNAME', '$db_username');\n";
$configContent .= "define('DB_PASSWORD', '$db_password');\n";
$configContent .= "define('DB_NAME', '$db_name');\n";
$configContent .= "\n?>\n";

// Attempt to write to the config file and check for errors
if (file_put_contents($configFilePath, $configContent) !== false) {
    header("location: admin_panel.php");
} else {
    $error = error_get_last();
    echo "Failed to write configuration to $configFilePath.<br>";
    echo "Error: " . $error['message'] . "<br>";
    echo "Check directory permissions and ensure PHP has write access to the target directory.<br>";
}

?>