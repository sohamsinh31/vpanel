<?php
set_time_limit(0);
ini_set('memory_limit', '20000M');
session_start();
require_once('function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link id="stylesheet" rel="stylesheet" type="text/css" href="styles.css" />
    <link id="stylesheet" rel="stylesheet" type="text/css" href="styles.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="upload">
        <h2>Admission Form:-</h2>
        <form action="ragistration.php" method="post" enctype="multipart/form-data">
            <div class="form-groop">
                <label>Fullname(as per any 10th/12th marksheet):</label>
                <br>
                <input style="width:80%;float:left;"
                    type="text" name="user" class="form-control">
                <br>
                <br>
                <label>DateOfBirth:</label><br>
                <input style="width:40%;float:left;" type="date" name="date" class="form-control">
                <label>Age:</label><br>
                <input style="width:20%;" type="number" name="age" class="form-control">
                <br>
                <label>Gender:</label><input style="width:10%;height:20px;" type="radio" name="gender"
                    value="male"><label>Male</label><input style="width:10%;height:20px;" type="radio"
                    name="gender" value="female"><label>Female</label>
                <br>
                <label>Address:</label><input style="width:80%;" type="text" name="address"
                    class="form-control">
                <label>Pincode:</label><input type="number" style="width:20%;" name="pincode"
                    maxlength="6">
                <label>Mobile:</label><input type="tel" style="width:40%;" name="mobile">
                <br>
                <label>Email:</label><input type="email" style="width:80%;" name="email">
                <br>
                <label>Choose password:</label><input type="password" style="width:80%;"
                    name="password">
                <br><label>Students passport size photo:</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <hr>
                <label style="color:gold;">Parents/Guardian's information:</label>
                <hr>
                <label>Full name of father:</label>
                <input style="width:90%;" type="text" name="fathername" class="form-control">
                <br>
                <label>Proffesion:</label><input style="width:10%;height:20px;" type="radio"
                    name="proffesion_father" value="buissness"><label>Buissness</label><input
                    style="width:10%;height:20px;" type="radio" name="proffesion_father"
                    value="job"><label>Job</label><input style="width:10%;height:20px;" type="radio"
                    name="proffesion_father" value="other"><label>Other</label><input
                    style="width:10%;height:20px;" type="radio" name="proffesion_father"
                    value="teacher"><label>Teacher</label>
                <br>
                <label>Father's mobile</label><input type="tel" style="width:30%;"
                    name="father_mobile">
                <br>
                <label>Full name of mother:</label>
                <input style="width:90%;" type="text" name="mothername" class="form-control">
                <br>
                <label>Proffesion:</label><input style="width:10%;height:20px;" type="radio"
                    name="proffesion_mother" value="buissness"><label>Buissness</label><input
                    style="width:10%;height:20px;" type="radio" name="proffesion_mother"
                    value="job"><label>Job</label><input style="width:10%;height:20px;" type="radio"
                    name="proffesion_mother" value="other"><label>Other</label><input
                    style="width:10%;height:20px;" type="radio" name="proffesion_mother"
                    value="teacher"><label>Teacher</label>
                <br>
                <label>Mother's mobile</label><input type="tel" style="width:30%;"
                    name="mother_mobile">

                <hr>
                <label style="color:gold;">12th information</label>
                <hr>
                <label>Physics theorey:</label><input style="width:20%;" type="number"
                    name="physics_theorey" class="form-control"><label>Physics practical:</label><input
                    style="width:20%;" type="number" name="physics_practical" class="form-control">
                <br>
                <label>maths theorey:</label><input style="width:20%;" type="number"
                    name="maths_theorey" class="form-control"><label>English:</label><input
                    style="width:20%;" type="number" name="english" class="form-control">

                <br>
                <label>chemistry theorey:</label><input style="width:20%;" type="number"
                    name="chemistry_theorey" class="form-control"><label>Chemistry
                    practical:</label><input style="width:20%;" type="number"
                    name="chemistry_practical" class="form-control">
                <br>
                <label>Total precentage(as per marksheet):</label><input style="width:20%;"
                    type="number" name="percentage" class="form-control">
                <br>
                <hr>
                <label style="color:gold;">For collage information</label>
                <hr>
                <?php
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
                ?>
                <label>Choose branch:</label>
                <?php
                echo '<select class="form-control selectpicker"  name="branch" data-live-search="true">';
                for ($i = 0; $i < sizeof($branches); $i++) {
                    echo '<option value="' . $branchesn[$i] . '">' . $degree[$i] . '-' . $branches[$i] . '</option>';
                }

                echo '</select>';
                ?>
                <label>Acadamic year:20</label><input style="width:20%;" type="number" name="year"
                    class="form-control">
                <br>
                <label>Choose sem:</label>
                <select class="form-control selectpicker" data-live-search="true" id="sem" name="semester">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
            <br>
            <span><a style="color:gold;" href="login.php">Already sign up in click to logged in</a></span>

            <br>
            <button style="background-color:blue;border-radius:12px;width:30%;" onclick="return clickme();"
                class="btn btn-primary" type="submit" name="submit">UPLOAD</button>
        </form>
    </div>
    </div>
</body>
<script src="script.js"></script>
<script>
    $(function () {
        $('.selectpicker').selectpicker();
    });
</script>

</html>