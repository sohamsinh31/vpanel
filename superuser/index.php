<?php
session_start();
if(!isset($_SESSION['id2'])){
    header('location:http://'.$_SERVER['SERVER_NAME'].'/admin/login?next='.$_SERVER['REQUEST_URI']);
}
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

body {
  font-size: 1.2rem;
  background-color:black;
  color:white;
}

hr {
  width: 60px;
}

.photo-info {
  opacity: 0.8;
}

.caption {
  padding-left: 30%;
  padding-right: 30%;
}

.yellow-color {
  color: #D69314 !important;
}

.green-color {
  color: #065C73;
}

.background-black {
  background-color: #000;
}

.background-green {
  background-color: #065C73;
}

.yellow-background {
  background-color: #D69314;
}

.large-text {
  font-size: 3rem;
}

.card {
  width: 20rem;
}

.icon-circle {
  padding-top: 7px;
  min-width: 90px;
  min-height: 90px;
  max-width: 90px;
  max-height: 90px;
  background: #065C73;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  border-radius: 50%;
}

#main-photo {
  background: url("https://images.unsplash.com/photo-1541339907198-e08756dedf3f?ixlib=rb-1.2.1&auto=format&fit=crop&w=2100&q=80");
  background-size: cover;
  background-position: center center;
  min-height: 720px;
}

#how-we-teach-header {
  background-size: 100%;
  min-height: 200px;
  background: url("https://images.unsplash.com/photo-1536148935331-408321065b18?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=933&q=80");
  background-attachment: fixed;
  background-position: 0 -300px;
  text-align: center;
  color: #fff;
}

#we-teach {
  text-align: left;
}

@media only screen and (max-width: 600px) {
  .caption {
    padding-left: 5%;
    padding-right: 5%;
  }
}

/* .dropdown-item{
    color:white;
} */

    </style>
</head>
<body>
    
  <!-- SECTION: PHOTO WITH TEXT AND BUTTON -->
  <section id="main-photo" class="text-center">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 py-3 lead photo-info bg-dark">
          <h1 class=" font-weight-bold yellow-color">
            Novaly Programming School
          </h1>
          <h3 class="font-weight-bold green-color py-2 text-light text-center caption">
            A community of lifelong learners, responsible global citizens, and champions of our own success.
          </h3>
          <a href="#" class="btn yellow-background btn-lg">Contact</a>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION: KEY POINTS WITH FONT-AWSOME -->
  <section id="key-points">
    <div class="container-fluid text-center">
      <div class="row">
        <!-- col 3/12 -->
        <div class="col-md-3 yellow-background p-4">
          <i class="fas fa-laptop-code large-text"></i>
          <h2 class="p-1">Easy Access</h2>
          <p>
            24/7 access to classroom content
          </p>
        </div>
        <!-- col 3/12 -->
        <div class="col-md-3 bg-dark text-light p-4">
          <i class="fas fa-headset large-text"></i>
          <h2 class="p-1"> Support </h2>
          <p>
            Live support from instructors for homework, questions, or help
          </p>
        </div>
        <!-- col 3/12 -->
        <div class="col-md-3 yellow-background p-4">
          <i class="fas fa-hand-holding-usd large-text"></i>
          <h2 class="p-1"> Refund </h2>
          <p>
            60-day money back guarantee after enrollment
          </p>
        </div>
        <!-- col 3/12 -->
        <div class="col-md-3 bg-dark text-light p-4">
          <i class="fas fa-ruler-combined large-text"></i>
          <h2 class="p-1"> Modern Designs </h2>
          <p>
            Build real world projects and continuously add to your portfolio
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION: HOW WE TEACH -->
  <section id="how-we-teach-header">
    <div class="dark-overlay px-5 pt-3">
      <div class="row">
        <div class="col">
          <div class="container p-5">
            <h1>How We Teach</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION: HOW WE TEACH -->
  <section id="we-teach">
    <div class="container-fluid">
      <!-- ROW 1 OF HOW WE TEACH INFO -->
      <div class="row mx-5">
        <!-- LEFT ITEM -->
        <div class="col-sm-12 col-md-6 d-flex justify-content-left my-3">
          <!-- first -->
          <div class="icon-circle text-center large-text text-white">
            <i class="fas fa-shield-alt"></i>
          </div>
          <!-- second -->
          <div class="mt-3 px-3">
            <p>
              Secure connections to our servers and classooms online.
            </p>
          </div>
        </div>
        <!-- RIGHT ITEM -->
        <div class="col-sm-12 col-md-6 d-flex justify-content-right my-3">
          <!-- first -->
          <div class="icon-circle text-center large-text text-white">
            <i class="far fa-clock"></i>
          </div>
          <!-- second -->
          <div class="mt-3 px-3">
            <p>
              Fixed scheduals and plans, so you study on the time you choose.
            </p>
          </div>
        </div>
      </div>

      <!-- ROW 2 OF HOW WE TEACH INFO -->
      <div class="row mx-5">
        <!-- LEFT ITEM -->
        <div class="col-sm-12 col-md-6 d-flex justify-content-left my-3">
          <!-- first -->
          <div class="icon-circle text-center large-text text-white">
            <i class="far fa-smile"></i>
          </div>
          <!-- second -->
          <div class="mt-3 px-3">
            <p>
              10:1 professor-student ratio. Meaning your instructor will get to know you, and teach on a personal level.
            </p>
          </div>
        </div>
        <!-- RIGHT ITEM -->
        <div class="col-sm-12 col-md-6 d-flex justify-content-right my-3">
          <!-- first -->
          <div class="icon-circle text-center large-text text-white">
            <i class="fas fa-user-friends"></i>
          </div>
          <!-- second -->
          <div class="mt-3 px-3">
            <p>
              Forums to interact with students and build a life long network.
            </p>
          </div>
        </div>
      </div>

      <!-- ROW 3 OF HOW WE TEACH INFO -->
      <div class="row mx-5">
        <!-- LEFT ITEM -->
        <div class="col-sm-12 col-md-6 d-flex justify-content-left my-3">
          <!-- first -->
          <div class="icon-circle text-center large-text text-white">
            <i class="fas fa-chart-line"></i>
          </div>
          <!-- second -->
          <div class="mt-3 px-3">
            <p>
              Know where to study with performace charts to show what your strenghs are and weakness.
            </p>
          </div>
        </div>
        <!-- RIGHT ITEM -->
        <div class="col-sm-12 col-md-6 d-flex justify-content-right my-3">
          <!-- first -->
          <div class="icon-circle text-center large-text text-white">
            <i class="fas fa-project-diagram"></i>
          </div>
          <!-- second -->
          <div class="mt-3 px-3">
            <p>
              Study current real world skills to transition into your dream career quickly after graduation.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION: OUR COURSES -->
  <section id="courses">
    <!-- HEADER -->
    <div class="container-fluid">
      <div class="row">
        <div class="col p-3 background-black">
          <h2 class="text-center text-light large-text p-5 mb-0">Our Courses</h2>
        </div>
      </div>
    </div>
    <!-- CARDS -->
    <div class="container-fluid">
      <div class="row bg-dark p-5">
        <!-- col 4/12 -->
        <div class="col-lg-4 col-sm-6 d-flex justify-content-center mb-3">
          <div class="card background-black">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1558698972-c50e325e6799?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2250&q=80" alt="Card image cap">
            <h5 class="card-title background-green text-white p-3 text-center">Front-End Course</h5>
            <div class="card-body">
              <p class="card-text text-white">Learn how to build beautiful webpage designs. Apply color schemes and master spacing and positions.</p>
              <a href="#" class="btn yellow-background btn-block btn-lg">Learn More</a>
            </div>
          </div>
        </div>
        <!-- col 4/12 -->
        <div class="col-lg-4 col-sm-6 d-flex justify-content-center mb-3">
          <div class="card background-black">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1557324232-b8917d3c3dcb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1200&q=60" alt="Card image cap">
            <h5 class="card-title background-green text-white p-3 text-center">Back-End Course</h5>
            <div class="card-body">
              <p class="card-text text-light">Learn how to work with databases, securely storing information and producing outputs. </p>
              <a href="#" class="btn yellow-background btn-block btn-lg">Learn More</a>
            </div>
          </div>
        </div>
        <!-- col 4/12 -->
        <div class="col-lg-4 col-sm-12 d-flex justify-content-center mb-3">
          <div class="card background-black">
            <img class="card-img-top" src="https://images.unsplash.com/photo-1514996696876-5c856ca2a0a4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2250&q=80" alt="Card image cap">
            <h5 class="card-title background-green text-white p-3 text-center">Full-Stack Course</h5>
            <div class="card-body ">
              <p class="card-text text-light">If your up for the challenge, the full-stack course will show you how to create, deploy and maintain full dynamic websites.</p>
              <a href="#" class="btn yellow-background btn-block btn-lg">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="page-footer font-small">
    <div class="background-green text-white">
      <div class="container">
        <!-- Grid row-->
        <div class="row py-4 d-flex align-items-center">
          <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h6 class="mb-0">Get connected with us on social networks!</h6>
          </div>
          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right">
            <!-- Facebook -->
            <a class="fb-ic">
              <i class="fab fa-facebook-f white-text mr-4"> </i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
              <i class="fab fa-twitter white-text mr-4"> </i>
            </a>
            <!-- Google +-->
            <a class="gplus-ic">
              <i class="fab fa-google-plus-g white-text mr-4"> </i>
            </a>
            <!--Linkedin -->
            <a class="li-ic">
              <i class="fab fa-linkedin-in white-text mr-4"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fab fa-instagram white-text"> </i>
            </a>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row-->
      </div>
    </div>
    <!-- Footer Links -->
    <div class="container text-center mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-12 col-lg-4 mx-auto mb-4 ">
          <!-- Content -->
          <h6 class="text-uppercase font-weight-bold text-dark">Novaly Online School</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto">
          <p>Online fictional web development school. Webpage created for educational purposes and experience. All images are from unsplash. All information is fictional.</p>
        </div>
        <!-- Grid column -->
        <div class="col-md-6 col-lg-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">School Links</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto">
          <p>
            <a href="#!">Student Login</a>
          </p>
          <p>
            <a href="#!">Financial Aid</a>
          </p>
          <p>
            <a href="#!">Course Content</a>
          </p>
        </div>
        <!-- Grid column -->
        <div class="col-md-6 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Courses</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto">
          <p>
            <a href="#!">Front-End Development</a>
          </p>
          <p>
            <a href="#!">Back-End Development</a>
          </p>
          <p>
            <a href="#!">Full-Stack Development</a>
          </p>
        </div>
        <!-- Grid column -->
        <div class="col-md-12 col-lg-3 mx-auto mb-4 text-center">
          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Contact Us</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto">
          <p>
            <i class="fas fa-home mr-3"></i> 1234 Maple Drive Los Angeles 12323
          </p>
          <p>
            <i class="fas fa-envelope mr-3"></i> novalyschool@info.edu
          </p>
          <p>
            <i class="fas fa-phone mr-3"></i> +1 555 555 2300
          </p>
        </div>
      </div>
    </div>
    <!-- Copyright to MEEEEEEE -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
      <a href="https://codepen.io/erickkg/full/zQbZEV" target="_blank">Erick Gonzalez</a>
    </div>
  </footer>
</body>
</html>