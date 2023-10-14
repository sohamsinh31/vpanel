<?php

include('../function.php');

function saveSchedule($data) {
    global $con;

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        return array('error' => 'No data to save.');
    }

    $present = isset($data['present']) ? $data['present'] : array();
    $absent = isset($data['absent']) ? $data['absent'] : array();
    $presentEnrollments = implode(',', $present);
    $absentEnrollments = implode(',', $absent);
    $startt = isset($data['start1']) && isset($data['start2']) ? $data['start1'] . ' ' . $data['start2'] : '';
    $endd = isset($data['end1']) && isset($data['end2']) ? $data['end1'] . ' ' . $data['end2'] : '';
    $branch = isset($data['branch']) ? $data['branch'] : '';
    $sem = isset($data['sem']) ? $data['sem'] : '';
    $degree = isset($data['degree']) ? $data['degree'] : '';
    $sub = isset($data['sub']) ? $data['sub'] : '';

    $sql = "INSERT INTO `schedule_list` (`title`,`description`,`absent`,`degree`,`branch`,`semester`,`start_datetime`,`end_datetime`) 
            VALUES ('$sub','$presentEnrollments','$absentEnrollments','$degree','$branch','$sem','$startt','$endd')";

    $save = $con->query($sql);

    if ($save) {
        return array('success' => 'Schedule successfully saved.');
    } else {
        return array('error' => 'An error occurred.', 'details' => $con->error, 'sql' => $sql);
    }
}

function getAllData() {
    global $con;

    $result = $con->query("SELECT * FROM schedule_list");

    if ($result) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return array('success' => true, 'data' => $data);
    } else {
        return array('error' => 'An error occurred while fetching data.');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $response = getAllData();
    echo json_encode($response);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    $response = saveSchedule($data);
    echo json_encode($response);
} else {
    echo json_encode(array('error' => 'Invalid request method.'));
}

$con->close();

?>
