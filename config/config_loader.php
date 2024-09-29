<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

// Include database connection details
include_once 'db_connect.php';

// Function to load configurations from the database
function loadConfig($type)
{
    global $conn;

    try {
        // Sanitize $type to prevent SQL injection
        $tableName = $conn->real_escape_string("{$type}_config");

        // Check if configuration table exists
        $checkTableQuery = "SHOW TABLES LIKE '$tableName'";
        $result = $conn->query($checkTableQuery);

        if ($result->num_rows === 0) {
            // Table does not exist, create it
            $createTableQuery = "CREATE TABLE $tableName (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                value TEXT
            )";

            if ($conn->query($createTableQuery) === FALSE) {
                throw new Exception("Error creating table $tableName: " . $conn->error);
            }
        }

        $config = [];

        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT name, value FROM $tableName");
        if ($stmt === false) {
            throw new Exception("MySQL prepare statement error: " . $conn->error);
        }

        // Execute the statement
        if (!$stmt->execute()) {
            throw new Exception("Error executing query: " . $stmt->error);
        }

        // Bind result variables
        $stmt->bind_result($name, $value);

        // Fetch the results
        while ($stmt->fetch()) {
            $config[$name] = $value;
        }

        // Close the statement
        $stmt->close();

        // Define constants dynamically (only if they are not already defined)
        foreach ($config as $name => $value) {
            if (!defined($name)) {
                if (explode($name, ',')) {
                    $name = '[' . $name . ']';
                }
                define($name, $value);
            }
        }
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }

    return $config;
}
