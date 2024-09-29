<?php
require_once("redirector.php");
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="styles.css" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <br>
  <br>
  <div>
    <div class="left_container">

      <div class="vertical d-block d-sm-none">
        <div class="progressBar"></div>
        <div class="progressBar in-progress"></div>

        <ul>
          <li class="checkbox">Confirmed</li>
          <li>En Route</li>
          <li>In Progress</li>
          <li>Complete</li>
        </ul>
      </div>

    </div>
    <div class="right_container">

    </div>
  </div>
</body>

</html>