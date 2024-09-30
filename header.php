<?php
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// session_start();
include_once('function.php');

// Get the subfolder path
$subfolder = dirname($_SERVER['SCRIPT_NAME']);

// Get the full current URL and base URL dynamically
$curr_dir = 'http://' . $_SERVER['SERVER_NAME'] . $subfolder;

// Get the script name, which gives us the path of the current executing script relative to the root
$script_name = $_SERVER['SCRIPT_NAME']; // e.g., /vpanel/index.php
// Get the directory name of the current script to extract the project folder (e.g., /vpanel)
$subfolderr = dirname($script_name); // e.g., /vpanel
$subfolders = explode("/", $subfolderr)[1];

// Construct the full URL dynamically
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$base_url = $protocol . $_SERVER['SERVER_NAME'] . '/' . $subfolders;

// Normalize base URL by removing potential backslashes at the end
$curr_dir = rtrim($curr_dir, '/\\');
$dir = str_replace('\\', '/', __DIR__);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Use the dynamic base URL for CSS and JS imports -->
        <link href="<?php echo $curr_dir; ?>/Vendors/bootstrap5/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $curr_dir; ?>/Vendors/fontawesome/css/all.min.css" />

        <style>
            .app_header_image {
                width: 50px;
                height: 50px;
                border-radius: 50%;
            }

            .sidebar-toggle {
                background: none;
                border: none;
                color: #fff;
            }

            .sidebar-toggle:hover {
                color: #ddd;
            }

            .sidebar {
                width: 250px;
                background-color: #343a40;
                padding: 20px;
                position: absolute;
            }

            .sidebar a {
                color: #fff;
                text-decoration: none;
                display: block;
                padding: 10px;
            }

            .sidebar a:hover {
                background-color: #495057;
            }
        </style>
    </head>

    <body>
        <header class="app_header bg-dark text-white d-flex justify-content-between align-items-center p-3 z-index-3">
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="h4"><a href="<?php echo $curr_dir; ?>/index.php" class="text-white text-decoration-none">VPANEL</a></h1>
            <div>
                <?php
                // Assuming a session is already started
                $id = $_SESSION['id'];
                $q = "SELECT * FROM `studentinfo` WHERE id = '$id'";
                $result = mysqli_query($con, $q);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo "<img class='app_header_image' src='" . $base_url . '/' . $row['photourl'] . "' alt='Profile Picture'>";
                } else {
                    echo "No records found.";
                }
                ?>
            </div>
        </header>

        <div class="sidebar bg-dark text-white" id="sidebar" style="display: none;z-index: 100;">
            <button class="btn btn-outline-light mb-3" id="sidebarClose">Close</button>
            <ul class="list-unstyled">
                <li><a href="<?php echo $curr_dir; ?>/index.php">Home</a></li>
                <li><a href="<?php echo $curr_dir; ?>/attandance/index.php">Attendance</a></li>
                <li><a href="<?php echo $curr_dir; ?>/fees/index.php">Academic Fees</a></li>
                <li><a href="<?php echo $curr_dir; ?>/timeline.php">Academic Notices</a></li>
                <li><a href="<?php echo $curr_dir; ?>/courceout.php">Course Outline</a></li>
                <li><a href="<?php echo $curr_dir; ?>/exam/index.php">Exam Timetable</a></li>
                <li><a href="<?php echo $curr_dir; ?>/repository.php">Repository</a></li>
            </ul>
        </div>

        <!-- Use dynamic paths for JS scripts -->
        <script src="<?php echo $curr_dir; ?>/Vendors/bootstrap5/js/bootstrap.js"></script>
        <script>
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarClose = document.getElementById('sidebarClose');

            sidebarToggle.addEventListener('click', function () {
                sidebar.style.display = sidebar.style.display === 'none' ? 'block' : 'none';
            });

            sidebarClose.addEventListener('click', function () {
                sidebar.style.display = 'none';
            });
        </script>
    </body>

</html>
