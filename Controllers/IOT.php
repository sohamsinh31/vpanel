<?php

include('../function.php');

function getDataForTag($tag)
{
    global $con;

    $result = $con->query("SELECT * FROM studentinfo WHERE tag = '$tag'");

    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return array('success' => true, 'data' => $data);
    } else {
        return array('error' => 'Tag not found.');
    }
}

function redirectToAssignTag($tag)
{
    // Redirect to the assign-tag.php page with the tag in the query parameter
    header("Location: /Views/assign-tag.php?tag=$tag");
    exit();
}

// Get tag from Thingspeak
$channelID = 2304789;
$url = "https://api.thingspeak.com/channels/$channelID/feeds.json?results=2";
$data = json_decode(file_get_contents($url), true);

if (isset($data['feeds'][0]['field3'])) {
    $tag = $data['feeds'][0]['field3'];

    $response = getDataForTag($tag);
    if ($response['success']) {
        header("Location: /Views/assign-tag.php?tag=$tag");
        exit();
    } else {
        redirectToAssignTag($tag);
    }
} else {
    echo json_encode(array('error' => 'Tag data not found in Thingspeak.'), JSON_PRETTY_PRINT);
}
