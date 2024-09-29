<?php
require_once "./redirector.php";
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="styles.css" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Header</title>
        <link href="./Vendors/bootstrap5/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="./Vendors/fontawesome/css/all.min.css" />
        <style>
            #createclass {
                width: 100%;
                height: 125px;
                border: 2px solid white;
                border-radius: 15px;
                font-size: 100px;
                text-align: center;
            }

            .button1 {
                width: 100%;
                border: none;
                border-radius: 12px;
                padding: 10px;
                background-color: #f8f9fa;
            }

            #toCreate {
                border-radius: 12px;
                width: 97%;
                height: 50%;
                border: 2px solid white;
                display: none;
                position: fixed;
                top: 15%;
            }

            #classes {
                width: 100%;
                font-size: 20px;
                text-align: center;
            }

            td {
                padding: 10px;
            }
        </style>
    </head>

    <body>
        <?php include 'header.php'; ?>
        <div class="container mt-5">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Classes</th>
                        <th>Subject Code</th>
                        <th>Semester</th>
                        <th>Present</th>
                        <th>Absent</th>
                        <th>Missing*</th>
                    </tr>
                </thead>
                <tbody id="table-data">
                    <!-- Table data will be loaded here from load.php -->
                </tbody>
            </table>
            <div id="birthday"></div>
        </div>

        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                // Load Table Records
                function loadTable() {
                    $.ajax({
                        url: "load.php",
                        type: "POST",
                        success: function (data) {
                            $("#table-data").html(data);
                        }
                    });
                }
                loadTable();

                function birthday() {
                    $.ajax({
                        url: "birthday.php",
                        type: "POST",
                        success: function (data) {
                            $("#birthday").html(data);
                        }
                    });
                }
                birthday();
            });
        </script>
    </body>

</html>