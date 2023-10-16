<?php

include('../function.php');

function saveSchedule($data)
{
    
}
function getAllData()
{
    global $con;

    $result = $con->query("SELECT * FROM studentinfo WHERE tag IS NULL");

    if ($result) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return array('success' => true, 'data' => $data);
    } else {
        return array('error' => 'An error occurred while fetching data.');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $response = getAllData();
    echo json_encode($response, JSON_PRETTY_PRINT);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    $response = saveSchedule($data);
    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    echo json_encode(array('error' => 'Invalid request method.'), JSON_PRETTY_PRINT);
}
