<?php
include('../function.php');

function getDataForTag($tag)
{
    global $con;

    $result = $con->query("SELECT * FROM studentinfo WHERE tag = '$tag'");

    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data;
    } else {
        return null;
    }
}

// Get tag from Thingspeak
$channelID = 2304789;
$url = "https://api.thingspeak.com/channels/$channelID/feeds.json?results=2";
$data = json_decode(file_get_contents($url), true);

$tableData = array();

if (isset($data['feeds'])) {
    foreach ($data['feeds'] as $feed) {
        if (isset($feed['field3'])) {
            $tag = $feed['field3'];
            $startTime = $feed['created_at'];
            $endTime = date('Y-m-d H:i:s', strtotime($startTime . ' +50 minutes'));

            $studentData = getDataForTag($tag);

            if ($studentData) {
                $branchResult = $con->query("SELECT * FROM branches WHERE id = '{$studentData['branchid']}'");
                
                if ($branchResult && $branchResult->num_rows > 0) {
                    $branchData = $branchResult->fetch_assoc();
                    $branchName = $branchData['name'];
                    $degree = $branchData['degree'];
                } else {
                    $branchName = 'N/A';
                    $degree = 'N/A';
                }

                $tableData[] = array(
                    'tag' => $tag,
                    'enrollment' => $studentData['enrollment'],
                    'start_time' => $startTime,
                    'end_time' => $endTime,
                    'degree' => $degree,
                    'branch' => $branchName,
                    'semester' => $studentData['semester'],
                    'subject' => 'SESH1080'
                );
            } else {
                $tableData[] = array(
                    'tag' => $tag,
                    'enrollment' => NULL,
                    'start_time' => NULL,
                    'end_time' => NULL,
                    'degree' => NULL,
                    'branch' => NULL,
                    'semester' => NULL,
                    'subject' => NULL
                );
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data from Thingspeak</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <!-- Add your custom styles here if needed -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Attendance System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Tag</th>
                        <th>Enrollment</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Degree</th>
                        <th>Branch</th>
                        <th>Semester</th>
                        <th>Subject</th>
                        <th>Assign</th>
                    </tr>
                </thead>
                <tbody id="dataBody">
                    <?php foreach ($tableData as $row) : ?>
                        <tr>
                            <td><?php echo $row['tag']; ?></td>
                            <td><?php echo $row['enrollment']; ?></td>
                            <td><?php echo $row['start_time']; ?></td>
                            <td><?php echo $row['end_time']; ?></td>
                            <td><?php echo $row['degree']; ?></td>
                            <td><?php echo $row['branch']; ?></td>
                            <td><?php echo $row['semester']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td>
                                <?php if ($row['enrollment'] == '') : ?>
                                    <a class="btn btn-primary" href="assign-tag.php?tag=<?php echo $row['tag']; ?>">Assign</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- <div class="graph-container">
            <canvas id="enrollmentChart" width="400" height="200"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./script.js"></script> -->
        <script src="../js/bootstrap.min.js"></script>
</body>

</html>