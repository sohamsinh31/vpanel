<?php
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/error.log');
session_start();
if (!isset($_SESSION['id2'])) {
  header('location:http://' . $_SERVER['SERVER_NAME'] . '/admin/login?next=' . $_SERVER['REQUEST_URI']);
}
include('../header.php');
include_once('../../function.php');
mysqli_select_db($con, 'vpanel');
$q = "SELECT * FROM `branches`";
$result = $con->query($q);
$row = $result->fetch_all(MYSQLI_ASSOC);
$branches = array();
$branchesn = array();
$degree = array();
foreach ($row as $r) {
  array_push($degree, $r['degree']);
  array_push($branches, $r['name']);
  array_push($branchesn, $r['id']);
}
$outputt = '<select class="form-control selectpicker"  name="branch" data-live-search="true">';
for ($i = 0; $i < sizeof($branches); $i++) {
  $outputt .= '<option value="' . $branchesn[$i] . '">' . $degree[$i] . '-' . $branches[$i] . '</option>';
}

$outputt .= '</select>';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
  <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: black;
    }
  </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
</head>

<body>
  <div id="all">

  </div>
  <div id="row">
    <div class="col-sm-4">.</div>
    <div class="col-sm-4"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Show teachers</button>
    </div>
    <div class="col-sm-4"></div>
  </div>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Teacher</h4>
        </div>
        <div class="modal-body">
          <p><?php
              $query2 = "SELECT * FROM teacher";
              $result2 = $con->query($query2);
              $output1 = '
<table class="table table-bordered">
<tr class="success">
<th>Teacherid</th>
<th>Name</th>
</tr>
';
              while ($row2 = $result2->fetch_assoc()) {
                $output1 .= '<tr><td>' . $row2['id'] . '</td><td>' . $row2['teachername'] . '</td></tr>';
              }
              $output1 .= '</table>';
              echo $output1;
              ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  </div>
  <table class="table table-bordered" border='1' width='25%'>
    <tr class="success">
      <th>Starttime</th>
      <th>Endtime</th>
      <th>Class</th>
      <th>Teacherid</th>
      <th>Subject</th>
      <th>Branch</th>
      <th>Sem</th>
      <th></th>
      <th></th>
    </tr>
    <?php
    $query = "SELECT * FROM timetable";
    $result = $con->query($query);
    while ($row = $result->fetch_assoc()) {
      echo "
    <tr>
<form method='post' action='insert' enctype='multipart/form-data'>
            <td><input type='time' value='" . $row['starttime'] . "'  name='start' required/></td>
            <td><input type='time' value='" . $row['endtime'] . "'  name='end' required/></td>
            <td><input type='text' value='" . $row['class'] . "' name='class'required/></td>
            <td><input type='text' value='" . $row['teacherid'] . "'  name='id' required/></td>
            <td><input type='text' value='" . $row['subject'] . "'  name='sub' required/></td>
            <td>"
        . $outputt . "
            </td>
            <td><input value='" . $row['sem'] . "'  type='text' name='sem'required/></td>
            <td><input type='hidden' value='" . $row['id'] . "' name='tid'><button id='updatet' class='btn btn-success btn-sm'>Update</button></td>
            </td>
            <td><button class='btn btn-danger btn-sm' data-id='" . $row['id'] . "' id='deletefun'>Delete</button></td>
            </tr>
</form>
";
    }
    ?>
  </table>
</body>
<script type="text/javascript">
  $(document).ready(function() {
    $("#deletefun").on("click", function(e) {
      e.preventDefault();
      var id = this.getAttribute("data-id")
      $.ajax({
        url: 'tables.php',
        type: 'POST',
        data: {
          id: id
        },
        success: function(data) {
          htmll = `<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Table deleted successfully.
</div>`;
          if (data) {
            document.getElementById("all").innerHTML = htmll;

          }
        }
      })
    })
  });
</script>

</html>