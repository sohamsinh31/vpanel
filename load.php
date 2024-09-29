<?php

session_start();
$tid = $_SESSION['id'];
include("function.php");

require_once './Utils/AttandanceHandler.php';

$at = new AttendanceHandler();
$data = json_decode($at->total_by_Sub($tid), TRUE);
$output = '';

if (count($data) > 0) {
    foreach ($data as $row) {
        $output .= '
                <tr>
                    <td>
                        <a href="classes?id=' . $row['Teacher'] . '">
                            <button class="button1">
                                <div id="classes">' . $row['Teacher'] . '</div>
                            </button>
                        </a>
                    </td>
                    <td>' . $row['Subject'] . '</td>
                    <td>' . $row['Semester'] . '</td>
                    <td>' . $row['Present'] . '</td>
                    <td>' . $row['Absent'] . '</td>
                    <td class="text text-danger">1</td>
                </tr>';
    }
    echo $output;
} else {
    echo "<tr><td colspan='4'>No Record Found.</td></tr>";
}
