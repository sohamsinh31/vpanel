
<?php require_once('db-connect.php');
session_start(); 
if(!$_SESSION['id2']){
    header('location:../admin/login?next=schedule/index');
}
$host     = 'localhost';
$username = 'root';
$password = '';
$dbname   ='vpanel';

// else{
//     header('location:index');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Apple Chancery, cursive;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
        /* #custom{
            display:none;
        } */
        .one{
            left:45%;
            position:absolute;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient" id="topNavBar">
        <div class="container">
            <a class="navbar-brand" href="https://sourcecodester.com">
            VPANEL
            </a>
            <div>
                <b class="text-light">Sample Scheduling</b>
            </div>
        </div>
    </nav>
    <div class="one">
    <button id="current">Current</button>
    <h4>OR SELECT BRANCHES MANUALLY</h4>
    <!-- <button onclick="document.getElementById('custom').style.display='block';">Custom</button> -->
    </div>
    <br>
    <br>
    <br>
    <div id="loadbranch">
</div>
    <div id="custom">
<form enctype="multipart/form-data" method="POST" action="">
    <label>Choose degree:</label>  
<select name="degree" id="degree">
<option value="none">-</option>
    <option value="BE/BTECH">B.E/B.TECH</option>
    <option value="BSC">B.Sc</option>
    <option value="DIPLOMA">Diploma</option>
    </select>
    <label>Choose branch:</label>  
<select name="branch" id="branch">
<option value="none">-</option>
    <option value="CS">Computer science and engineering</option>
    <option value="IE">Information technology and engineering</option>
    <option value="IT">Information technology</option>
    <option value="CH">Chemical engineering</option>
    <option value="CV">Civil engineering</option>
    <option value="MH">Mechanical engineering</option>
    <option value="CE">Computer engineering</option>
    <option value="PE">Pharmasutical engineering</option>
    </select>
    <label>Choose sem:</label>
    <select id="sem" name="semester">
    <option value="none">-</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    </select>
    <button type="submit" onclick="return foo();" id="load1">Search</button>
    <!-- <button type="submit">Submit</button> -->
    </form>

    <div class="container py-5" id="page-container">
        <div class="row">
            <div class="col-md-9">
            <div id="calendar"></div>
            </div>
            <div class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Schedule Form</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Subject</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Enrollment</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" ></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="absent" class="control-label">Absent</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="absent" id="absent" ></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Branch</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="branch2" id="branch2" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Degree</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="degree2" id="degree2" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">semester</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="semester2" id="semester2" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Details Modal -->
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
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

<?php 
$sched_res = [];
if($_POST['semester']){
$tid = $_SESSION['id2'];
$branch = $_POST['branch'];
$sem = $_POST['semester'];
$deg = $_POST['degree'];
$q = "SELECT * FROM timetable WHERE teacherid = '$tid' AND branch = '$branch' AND sem = '$sem' AND degree = '$deg'";
$result = $conn->query($q);
foreach ($result->fetch_all(MYSQLI_ASSOC) as $val){
    $sub = $val['subject'];
$schedules = $conn->query("SELECT * FROM `schedule_list` WHERE title = '$sub'");
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $row;
}
}
}
?>
<!-- <?php 
if(isset($conn)) $conn->close();
?> -->
</body>
<script type="text/javascript">
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>');
</script>
<script src="./js/script.js"></script>
<script src="./js/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$("#current").on("click",function(){
    $.ajax({
        url:"current.php",
        type:"GET",
        success:function(data){
            console.log(data.length)
            if(data.length == 0){
                $("#loadbranch").html("<h2>No data aviable</h2>");
            }
            else{
            $.each(JSON.parse(data),function(ind,val){
                console.log(val.id,val.sem,val.branch,val.degree);
                $.ajax({
                    url:"loadbranch.php",
                    type:"POST",
                    data:{branch:val.branch,sem:val.sem,degree:val.degree,class:val.class,sub:val.subject,startt:val.startt,endd:val.endd},
                    success:function(data){
                        console.log(data);
                        $("#loadbranch").html(data);
                    }
                })
            })
        }
        }
    })
})
function deleteAbsent(name){
    let elemm = document.getElementById("absent").value;
    let index =elemm.indexOf(name);
    if(index>=0){
        // let elem = document.getElementById("absent").value -= name+",";
    // let index =elem.indexOf(name);
    // if(index>=0){
    //     let str = elem;
        let len = elemm.length;
        //elem.slice(0,index) + elem.slice(index+1);
        console.log(elemm.slice(0,index) + elemm.slice(index+len));
    //}
    }
}
function deletePresent(name){

}
function foo() {
            // alert("Submit button clicked!");
            return true;
         }
function handlechange(name){
    let elemm = document.getElementById("description").value;
    let index =elemm.indexOf(name);
    console.log(index);
    // if(index>=0){
    //     alert("The value already exists");
    // }
    // else{
        let elem = document.getElementById("description").value += name+",";
        // deleteAbsent(name);
    //}
}
function Absent(name){
    let elem2 = document.getElementById("absent").value += name+",";
}
</script>
</html>