<?php

require_once "db.php";

class AttendanceHandler {

    private DB $db;
    private $conn;

    public function __construct() {
        $this->db = new DB();
        $this->conn = $this->db->connect();
    }

    public function tester() {
        $q = "SELECT * FROM schedule_list";
        $result = $this->conn->query($q);
        echo $result->num_rows;
    }

    public function total_by_roll(String $roll) {
        $q = "SELECT 
                title AS 'Lecture Title',
                COUNT(id) AS 'Total Lectures',
                SUM(CASE WHEN description LIKE '%{$roll}%' THEN 1 ELSE 0 END) AS 'Present',
                SUM(CASE WHEN absent LIKE '%{$roll}%' THEN 1 ELSE 0 END) AS 'Absent'
            FROM 
                schedule_list
            WHERE 
                branch = 'CS'
                AND semester = 1
                AND (description LIKE '%{$roll}%' OR absent LIKE '%{$roll}%')
            GROUP BY 
                title
            ORDER BY 
                MAX(start_datetime) DESC;";
        $result = $this->conn->query($q);
        $json = [];
        while ($row = $result->fetch_assoc()) {
            $json[] = $row;
        }

        header('Content-Type: application/json'); // Set response header to JSON
        echo json_encode($json, JSON_PRETTY_PRINT);
    }

    public function total_by_Sub(String $id) {
        $q = "SELECT 
            t1.studentname AS \"Name\",
            cl.subject AS \"Subject\",
            cl.sem AS \"Semester\",
            cl.teachername AS \"Teacher\",
            SUM(CASE WHEN FIND_IN_SET(t1.enrollment, t2.description) > 0 AND (t2.title = cl.subject) THEN 1 ELSE 0 END) AS 'Present',
            SUM(CASE WHEN FIND_IN_SET(t1.enrollment, t2.absent) > 0 AND (t2.title = cl.subject) THEN 1 ELSE 0 END) AS 'Absent'
        FROM 
            schedule_list AS t2
        RIGHT JOIN
            classes AS cl
        ON
            cl.branch = t2.branch AND cl.sem = t2.semester
        CROSS JOIN 
            studentinfo t1
        ON 
            (FIND_IN_SET(t1.enrollment, t2.description) > 0
            OR FIND_IN_SET(t1.enrollment, t2.absent) > 0)
        WHERE    
            t1.id = \"{$id}\"
        GROUP BY 
            t1.studentname, cl.subject, cl.sem, cl.teachername
        ORDER BY 
            MAX(t2.start_datetime) DESC;
";
        $result = $this->conn->query($q);
        $json = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $json[] = $row;
            }
        }

        return json_encode($json);
    }
}

//$at = new AttendanceHandler();
//$tem = $at->total_by_Sub("4");
//
//$temp = json_decode($tem, TRUE);
//echo count($temp);
//var_dump($temp);

//echo "<br/>";
//
//foreach ($temp as $v) {
//    echo "<br/>";
//    echo $v["Name"];
////    var_dump($v);
//}
