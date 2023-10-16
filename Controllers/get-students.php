<?php
include('../function.php');
global $con;

$semester = $_GET['semester'];
$branch = $_GET['branch'];

$result = $con->query("SELECT * FROM studentinfo WHERE semester = $semester AND branchid = '$branch'");

if (!$result) {
    die(json_encode(array('error' => 'Error fetching students: ' . $con->error)));
}

$students = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($students);
