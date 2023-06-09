<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link id="stylesheet" rel="stylesheet" type="text/css" href="../styles.css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link id="stylesheet" rel="stylesheet" type="text/css" href="../styles.css" />
</head>

<body>
    <div class="upload">
        <form action="ragistration.php" method="post" enctype="multipart/form-data">
            <label>Fullname:</label>
            <br>
            <input type="text" name="user" class="form-control">
            <br>
            <label>Choose branch:</label>
            <?php
            require_once("../function.php");
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
            echo '<select class="form-control selectpicker"  name="branch" data-live-search="true">';
            for ($i = 0; $i < sizeof($branches); $i++) {
                echo '<option value="' . $branchesn[$i] . '">' . $degree[$i] . '-' . $branches[$i] . '</option>';
            }

            echo '</select>';
            ?>
            <br>
            <label>Email:</label><input type="email" style="" name="email">
            <br>
            <label>Choose password:</label><input type="password" style="" name="password">
            <label>Proffesion:</label><input type="text" style="" name="prof">
            <br>
            <br>
            <button style="background-color:blue;color:white;" onclick="return clickme();"
                class="btn btn-primary" type="submit" name="submit">SUBMIT</button>
        </form>
    </div>
</body>
<script src="../script.js"></script>

</html>