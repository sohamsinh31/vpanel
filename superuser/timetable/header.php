<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>navbar</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<style>
	*{
		font-family: 'Poppins', sans-serif !important;
		    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: -moz-none;
    -o-user-select: none;
    user-select: none;
	}

	/*searchbox*/

		.custom_search{
			color: #FFF !important;
			background: transparent;
			border: 0;
			border-radius: 0;
			border-bottom: 2px solid #FFF;
			width: 240px !important;
		}
		.custom_search:focus{
			box-shadow: none;
			background: transparent;
			border-bottom:2px solid #FFF;
		}
		.custom_search + .search_span{
			position: absolute;
			bottom: 0;
			width: 0;
			left: 50%;
			transition: width 0.5s, left 0.5s;
		}
		.custom_search:focus + .search_span{
			width: 240px;
			left: 0;
			border-bottom: 2px solid #c128ea;			
		}
		.custom_search::placeholder{
			color: #FFF !important;
		}

		.search_button{
			background: #8e24aa;
			width: 100px;
			border: 0;
		}
		.search_button:focus{
			border: 0;
			box-shadow: none;
		}
		.search_button:active{
			background: #8e24aa !important;
			box-shadow: none !important;
		}

		.search_button:hover{
			background: #8e24aa;
		}

/*ripple effect*/

		.tx--white {
  			color: #fff;
		}

[ripple] {
  position: relative;
  overflow: hidden;
}
[ripple] .ripple--container {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
[ripple] .ripple--container span {
  transform: scale(0);
  border-radius: 100%;
  position: absolute;
  opacity: 0.30;
  background-color: #fff;
  animation: ripple 1000ms;
}
@-moz-keyframes ripple {
  to {
    opacity: 0;
    transform: scale(2);
  }
}
@-webkit-keyframes ripple {
  to {
    opacity: 0;
    transform: scale(2);
  }
}
@-o-keyframes ripple {
  to {
    opacity: 0;
    transform: scale(2);
  }
}
@keyframes ripple {
  to {
    opacity: 0;
    transform: scale(2);
  }
}

/*navbar*/

.navbar{
	background: #222 !important;
	line-height: 2rem !important;	
}

.navbar .navbar-brand{
	color: #FFF !important;
}

.navbar-nav .active a{
	color: #c128ea !important;
}

.navbar-nav .nav-item .nav-link{
	color: #FFF;
}

.dropdown-menu {
	background: #22221E;
}
.dropdown-menu .dropdown-item{
	color: #FFF;
	transition: all 0.2s;
}

.dropdown-menu .dropdown-item:hover{
	background: #8e24aa;
	color: #FFF;
}

.navbar-toggler-icon{
	color: #FFF !important;
}

.navbar-dark .navbar-toggler{
	border-color: #FFFFFF !important;
}

	</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/superuser/index' ?>">VPANEL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          TimeTable
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
          <a class="dropdown-item" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/superuser/timetable/update' ?>">Update</a>
          <a class="dropdown-item" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/superuser/timetable/index' ?>">Insert data</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Timeline
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Insert</a>
          <a class="dropdown-item" href="#">Update</a>
        </div>
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Update
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 col-md-4">
    	<div style="position: relative;">
      		<input class="custom_search form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      		<span class="search_span"></span>
  		</div>
      <button class="ml-lg-3 btn btn-success my-2 my-sm-0 search_button tx--white" type="button" ripple="ripple">Search</button>
    </form>
  </div>
</nav>
<br>
<br>
<br>


</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <script src="script.js">
  </script>
  
  </html>