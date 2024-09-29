<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

// Include database connection and configuration loading
include('config_loader.php');

// Fetch admin configuration
$adminConfig = loadConfig('admin');

// Function to sanitize input data
function sanitize($data)
{
    return htmlspecialchars(trim($data));
}

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = sanitize($_POST['action']);
    $name = sanitize($_POST['name']);
    $value = sanitize($_POST['value']);

    switch ($action) {
        case 'create':
            addConfig('admin', $name, $value);
            break;
        case 'update':
            updateConfig('admin', $name, $value);
            break;
        case 'delete':
            deleteConfig('admin', $name);
            break;
    }

    // Reload configurations
    $adminConfig = loadConfig('admin');
}

function addConfig($type, $name, $value)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO {$type}_config (name, value) VALUES (?, ?)");
    $stmt->bind_param('ss', $name, $value);
    $stmt->execute();
    $stmt->close();
}

function updateConfig($type, $name, $value)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE {$type}_config SET value=? WHERE name=?");
    $stmt->bind_param('ss', $value, $name);
    $stmt->execute();
    $stmt->close();
}

function deleteConfig($type, $name)
{
    global $conn;
    $stmt = $conn->prepare("DELETE FROM {$type}_config WHERE name=?");
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $stmt->close();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link href="/vendors/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 border">
        <div class="row">
            <div class="col-lg-2 border-end">
            <?php include_once('sidebar.php');?>
            </div>
            <div class="col p-2">
                <div class="row">
                    <h1>Admin Configuration</h1>
                </div>
                <div class="row">
                    <form method="post" class="form p-2">
                        <input type="hidden" name="action" value="create">
                        <div class="form-group">
                            <label for="name">Config Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="value">Config Value</label>
                            <input type="text" class="form-control" id="value" name="value" required>
                        </div>
                        <button type="submit" class="btn btn-primary m-2">Add Configuration</button>
                    </form>
                </div>
                <div class="row p-2">
                    <h2>Existing Configurations</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Value</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($adminConfig as $name => $value) : ?>
                                <tr>
                                    <td><?= $name ?></td>
                                    <td><?= $value ?></td>
                                    <td>
                                        <form method="post" style="display: inline-block;">
                                            <input type="hidden" name="action" value="update">
                                            <input type="hidden" name="name" value="<?= $name ?>">
                                            <input type="text" name="value" value="<?= $value ?>" required>
                                            <button type="submit" class="btn btn-secondary">Update</button>
                                        </form>
                                        <form method="post" style="display: inline-block;">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="name" value="<?= $name ?>">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="/vendors/js/jquery.min.js"></script>
<script src="/vendors/js/popper.min.js"></script>
<script src="/vendors/js/bootstrap.min.js"></script>
</html>