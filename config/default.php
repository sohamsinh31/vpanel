<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "db_connect.php";

require_once __DIR__ . "/../Utils/Auth.php";
$auth = new AuthHandler();
if (!$auth->isAuthenticated()) {
    header("location: /login.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link href="/vendors/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendors/fontawesome/css/all.css" rel="stylesheet">
</head>

<body>
    <?php include_once(__DIR__ . "/../Utils/bt_Modal.php"); ?>
    <div class="container mt-5 border">
        <div class="row">
            <div class="col-lg-2 border-end">
                <?php include_once('sidebar.php'); ?>
            </div>
            <div class="col p-2">
                <div class="row p-2">
                    <div class="col-10">
                        <h2><?php echo $viewname ?> Configurations</h2>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary w-100" id="add_data">
                            Add
                        </button>
                    </div>
                </div>
                <div class="row p-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <?php
                                foreach ($columns as $val) {
                                    echo '<td>' . $val . '</td>';
                                }
                                ?>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo $tbody;
                            ?>
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    let add_form_data = "<?php echo $add_form_data ?>";
</script>
<script src="/vendors/js/jquery.min.js"></script>
<script src="/vendors/js/popper.min.js"></script>
<script src="/vendors/js/bootstrap.min.js"></script>
<script src="/vendors/fontawesome/js/all.js"></script>
<script src="../scripts/modal.js"></script>

</html>