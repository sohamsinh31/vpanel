<?php 
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/error.log');


session_start();
if (!isset($_SESSION['id'])) {
    header('location:http://' . $_SERVER['SERVER_NAME'] . '/login?next=' . $_SERVER['REQUEST_URI']);
}
$sid = $_SESSION['id'];
include("../function.php");
$qq = "SELECT * FROM `studentinfo` WHERE id='{$sid}'";
$rrr = mysqli_query($con, $qq);
$branchh = '';
$degreee = '';
$semesterr = '';
$enrollmentt = '';
$q3 = " SELECT DISTINCT title FROM `schedule_list` WHERE description LIKE '%{$enrollmentt}%'";
$result3 = mysqli_query($con, $q3);
while ($roww = mysqli_fetch_assoc($rrr)) {
    $branchh .= $roww['branchid'];
    $semesterr .= $roww['semester'];
    $enrollmentt = $roww['enrollment'];
}
$q = " SELECT * FROM `schedule_list` WHERE description LIKE '%{$enrollmentt}%'";
$q2 = " SELECT * FROM `schedule_list` WHERE absent LIKE '%{$enrollmentt},%'";
$result = mysqli_query($con, $q);
$result2 = mysqli_query($con, $q2);
$num = mysqli_num_rows($result);
$num2 = mysqli_num_rows($result2);
$sum = ($num + $num2);
$avg = ($num + $num2) - $num2;
$percentage = (100 * $avg) / $sum . "%";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <style>
        .attandance {
            border: 2px solid black;
            border-radius: 12px;
            height: 40px;
        }

        p {}

        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }

        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient" id="topNavBar">
        <div class="container">
            <a class="navbar-brand" href="../index">
                VPANEL
            </a>

            <div>
                <b class="text-light">Attandance</b>
            </div>
        </div>
    </nav>
    <!-- Event Details Modal -->
    <?php
    while ($row = mysqli_fetch_assoc($result3)) {
        $subject = $row['title'];
        $query = "SELECT * FROM `schedule_list` WHERE title='$subject' AND branch='{$branchh}' AND semester='{$semesterr}' AND description LIKE '%{$enrollmentt}%'";
        $query2 = "SELECT * FROM `schedule_list` WHERE title='$subject' AND branch='{$branchh}'  AND semester='{$semesterr}'AND absent LIKE '%{$enrollmentt}%'";
        $resultt = mysqli_query($con, $query);
        $resultt2 = mysqli_query($con, $query2);
        $numm = mysqli_num_rows($resultt);
        $numm2 = mysqli_num_rows($resultt2);
        $summ2 = ($numm + $numm2);
        $avgg2 = ($numm + $numm2) - $numm2;
        $percentage2 = (100 * $avgg2) / $summ2 . "%";
        echo '<div class="attandance"><p style="float:left;position:absolute;">' . $row['title'] . '</p><p style="float:right;right:4%;position:absolute;">' . $percentage2 . '</div>';
    }
    echo '<div class="attandance"><p style="float:left;position:absolute;">Total</p><p style="float:right;right:4%;position:absolute;">' . $percentage . '</div>';
    ?>
    <div class="container py-5" id="page-container">
        <div class="row">
            <div class="col-md-9">
                <div id="calendar"></div>
            </div>
            <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-0">
                        <div class="modal-header rounded-0">
                            <h5 class="modal-title">Schedule Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body rounded-0">
                            <div class="container-fluid">
                                <dl>
                                    <dt class="text-muted">Subject</dt>
                                    <dd id="title" class="fw-bold fs-4"></dd>
                                    <dt class="text-muted">Enrollment</dt>
                                    <dd id="description" class="fw-bold fs-4"></dd>
                                    <dt class="text-muted">Absent</dt>
                                    <dd id="absent" class=""></dd>
                                    <dt class="text-muted">Start</dt>
                                    <dd id="start" class=""></dd>
                                    <dt class="text-muted">End</dt>
                                    <dd id="end" class=""></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="modal-footer rounded-0">
                            <div class="text-end">
                                <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit"
                                    data-id="">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete"
                                    data-id="">Delete</button>
                                <button type="button" class="btn btn-secondary btn-sm rounded-0"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event Details Modal -->

            <?php
            $sid = $_SESSION['id'];
            $q1 = "SELECT * FROM `studentinfo` WHERE id='$sid' ";
            $result = $con->query($q1);
            $num = mysqli_num_rows($result);
            $enroll = '';
            if ($num > 0) {
                foreach ($result->fetch_all(MYSQLI_ASSOC) as $row2) {
                    $enroll .= $row2['enrollment'];
                    $branch = $row2['branchid'];
                    $semester = $row2['semester'];
                    $schedules = $con->query("SELECT * FROM `schedule_list` WHERE branch='$branch' AND semester='$semester'");
                    $sched_res = [];
                    foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
                        $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
                        $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
                        $sched_res[$row['id']] = $row;
                    }
                }
            } else {
                echo 1;
            }
            ?>
            <?php
            if (isset($con))
                $con->close();
            ?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>');
    var enrollment = '<?php echo $enroll; ?>';
</script>
<script src="./js/jquery-3.6.0.min.js"></script>
<script src="./js/script.js"></script>

<script type="text/javascript">
    $("document").on("ready", function () {
        $("#load1").on('click', function (e) {
            e.preventDefault();
            let branch = $("#branch").val();
            let sem = $("#sem").val();
            let degree = $("#degree").val();
            console.log(branch + sem + degree);
            $.ajax({
                url: "loadbranch.php",
                type: "POST",
                data: { branch: branch, sem: sem, degree: degree },
                success: function (data) {
                    console.log(data);
                    $("#loadbranch").html(data);
                }
            })
        })

        function handlechange(name) {
            console.log(name);
            document.getElementById("description").value += name + ",";
        }
        function Absent(name) {
            console.log(name);
            document.getElementById("absent").value += name + ",";
        }
    })
</script>

</html>