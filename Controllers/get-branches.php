<?php
include('../function.php');
global $con;

$result = $con->query("SELECT * FROM branches");

if (!$result) {
    die(json_encode(array('error' => 'Error fetching branches: ' . $con->error)));
}

$branches = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($branches);
