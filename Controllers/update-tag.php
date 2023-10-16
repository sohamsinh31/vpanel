<?php

include('../function.php');

function assignTag($tag, $userId)
{
    global $con;

    $updateQuery = "UPDATE studentinfo SET tag='$tag' WHERE id='$userId'";
    $result = $con->query($updateQuery);

    if ($result) {
        return array('success' => 'Tag assigned successfully.');
    } else {
        return array('error' => 'An error occurred while assigning the tag.');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tag = $_POST['tag'];
    $userId = $_POST['user'];

    $response = assignTag($tag, $userId);
    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    echo json_encode(array('error' => 'Invalid request method.'), JSON_PRETTY_PRINT);
}
