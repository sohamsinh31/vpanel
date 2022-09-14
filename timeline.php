<?php
session_start();
if(!isset($_SESSION['id'])){
  header('location:http://'.$_SERVER['SERVER_NAME'].'/login?next='.$_SERVER['REQUEST_URI']);
}
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="timeline.css"/>
<link rel="stylesheet" href="styles.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <br>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="main-timeline">
        <div class="timeline">
          <a href="#" class="timeline-content">
            <span class="timeline-year">2018</span>
            <div class="timeline-icon">
              <i class="fa fa-rocket" aria-hidden="true"></i>
            </div>
            <div class="content">
              <h3 class="title">Web Development</h3>
              <p class="description">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
              </p>
            </div>
          </a>
        </div>
        <div class="timeline">
          <a href="#" class="timeline-content">
            <span class="timeline-year">2017</span>
            <div class="timeline-icon">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <div class="content">
              <h3 class="title">JavaScript</h3>
              <p class="description">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
              </p>
            </div>
          </a>
        </div>
</div>
</div>
</div>
</div>
</body>
</html>