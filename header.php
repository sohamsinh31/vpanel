<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />

    <style>
        @import url("https://fonts.googleapis.com/css?family=Open+Sans|Roboto:400,700&display=swap");

        :root {
            /* dark shades of primary color*/
            --clr-primary-1: hsl(205, 86%, 17%);
            --clr-primary-2: hsl(205, 77%, 27%);
            --clr-primary-3: hsl(205, 72%, 37%);
            --clr-primary-4: hsl(205, 63%, 48%);
            /* primary/main color */
            --clr-primary-5: hsl(205, 78%, 60%);
            /* lighter shades of primary color */
            --clr-primary-6: hsl(205, 89%, 70%);
            --clr-primary-7: hsl(205, 90%, 76%);
            --clr-primary-8: hsl(205, 86%, 81%);
            --clr-primary-9: hsl(205, 90%, 88%);
            --clr-primary-10: hsl(205, 100%, 96%);
            /* darkest grey - used for headings */
            --clr-grey-1: hsl(209, 61%, 16%);
            --clr-grey-2: hsl(211, 39%, 23%);
            --clr-grey-3: hsl(209, 34%, 30%);
            --clr-grey-4: hsl(209, 28%, 39%);
            /* grey used for paragraphs */
            --clr-grey-5: hsl(210, 22%, 49%);
            --clr-grey-6: hsl(209, 23%, 60%);
            --clr-grey-7: hsl(211, 27%, 70%);
            --clr-grey-8: hsl(210, 31%, 80%);
            --clr-grey-9: hsl(212, 33%, 89%);
            --clr-grey-10: hsl(210, 36%, 96%);
            --clr-white: #fff;
            --clr-red-dark: hsl(360, 67%, 44%);
            --clr-red-light: hsl(360, 71%, 66%);
            --clr-green-dark: hsl(125, 67%, 44%);
            --clr-green-light: hsl(125, 71%, 66%);
            --clr-black: #222;
            --ff-primary: "Roboto", sans-serif;
            --ff-secondary: "Open Sans", sans-serif;
            --transition: all 0.3s linear;
            --spacing: 0.1rem;
            --radius: 0.25rem;
            --light-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --dark-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            --max-width: 1170px;
            --fixed-width: 620px;
        }

        *,
        ::after,
        ::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--ff-secondary);
            line-height: 1.5;
            font-size: 0.875rem;
        }

        ul {
            list-style-type: none;
        }

        a {
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        h4 {
            color:white;
            letter-spacing: var(--spacing);
            text-transform: capitalize;
            line-height: 1.25;
            margin-bottom: 0.75rem;
            font-family: var(--ff-primary);
        }

        h1 {
            font-size: 3rem;
        }

        h2 {
            font-size: 2rem;
        }

        h3 {
            font-size: 1.25rem;
        }

        h4 {
            font-size: 0.875rem;
        }

        p {
            margin-bottom: 1.25rem;
            color: var(--clr-grey-5);
        }

        aside h2 {
            text-align: center;
        }

        @media screen and (min-width: 800px) {
            h1 {
                font-size: 4rem;
            }

            h2 {
                font-size: 2.5rem;
            }

            h3 {
                font-size: 1.75rem;
            }

            h4 {
                font-size: 1rem;
            }

            body {
                font-size: 1rem;
            }

            h1,
            h2,
            h3,
            h4 {
                line-height: 1;
            }
        }

        /*  global classes */

        /* section */
        .section {
            padding: 5rem 0;
        }

        .section-center {
            width: 90vw;
            margin: 0 auto;
            max-width: 1170px;
        }

        @media screen and (min-width: 992px) {
            .section-center {
                width: 95vw;
            }
        }

        main {
            min-height: 100vh;
            display: grid;
            place-items: center;
        }

        /*
=============== 
Sidebar
===============
*/
        .sidebar-toggle {
            position: absolute;
            top: 1rem;
            font-size: 2rem;
            background: transparent;
            border-color: transparent;
            color: var(--clr-primary-5);
            transition: var(--transition);
            cursor: pointer;
            animation: bounce 2s ease-in-out infinite;
            left: 14rem;
        }

        .sidebar-toggle:hover {
            color: var(--clr-primary-7);
        }

        @keyframes bounce {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.5);
            }

            100% {
                transform: scale(1);
            }
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
        }

        .close-btn {
            font-size: 1.75rem;
            background: transparent;
            border-color: transparent;
            color: var(--clr-primary-5);
            transition: var(--transition);
            cursor: pointer;
            color: var(--clr-red-dark);
            float:right;
        }

        .close-btn:hover {
            color: var(--clr-red-light);
            transform: rotate(360deg);
        }

        .logo {
            justify-self: center;
            height: 40px;
        }

        .links a {
            display: block;
            font-size: 1.5rem;
            text-transform: capitalize;
            padding: 1rem 1.5rem;
            color: var(--clr-grey-5);
            transition: var(--transition);
        }

        .links a:hover {
            background: var(--clr-primary-8);
            color: var(--clr-primary-5);
            padding-left: 1.75rem;
        }

        .social-icons {
            justify-self: center;
            display: flex;
            padding-bottom: 2rem;
        }

        .social-icons a {
            font-size: 1.5rem;
            margin: 0 0.5rem;
            color: var(--clr-primary-5);
            transition: var(--transition);
        }

        .social-icons a:hover {
            color: var(--clr-primary-1);
        }

        .sidebar {
            position: fixed;
            top: 0;
            z-index: 1;
            left: 0;
            width: 100%;
            height: 100%;
            background-color:#0e0e0e;
            display: grid;
            grid-template-rows: auto 1fr auto;
            row-gap: 1rem;
            box-shadow: var(--clr-red-dark);
            transition: var(--transition);
            transform: translate(-100%);
            overflow-y: scroll;
        }

        .show-sidebar {
            transform: translate(0);
        }

        @media screen and (min-width: 676px) {
            .sidebar {
                width: 400px;
            }
        }

        .image {
            margin-left: auto;
            margin-right: auto;
        }
        .app_header{
            width:98%;
            border-radius:12px;
            border:solid white;
            background-color:#ffffff10;
            backdrop-filter:blur(12px);
            height:62px;
            justify-content: space-between;
        }
        .right{
            right:0;
            float:right;
            top:0;
            position:fixed;
        }
        .app_header_image{
            width:56px;
            border-radius:100px;
        }
        a {
            color:inherit;
        }
    </style>
</head>
<body>
    <div class="app_header">
    <button class="sidebar-toggle">
        <i class="fas fa-bars"></i>
    </button>
    <h1><a href="index">VPANEL</a></h1>
    <br>
    <div class="right">
        <?php 
			$id = $_SESSION['id'];
			$con = mysqli_connect('localhost','root');
			mysqli_select_db($con,'vpanel');
				$q = "SELECT * FROM `studentinfo` where id = '$id'";
				$result = mysqli_query($con,$q);
				$num = mysqli_num_rows($result);
				$id = $_SESSION['id'];
                $enroll = '';
				if($num>0){
					while($row = mysqli_fetch_assoc($result)){
                        $enroll.=$row['enrollment'];
					  echo  "<img class='app_header_image' src='".$row['photourl']."' alt=''>";
					}
				}
        ?>
    <!-- <img class="app_header_image" src="image.jpeg" alt="hi"> -->
    </div>
    </div>
    
    <aside class="sidebar">
        <div class="sidebar-header">
        <button class="close-btn"><i class="fas fa-times"></i></button>
        </div>
        <h6 style="text-align: center;"><?php echo $enroll; ?></h6>

        <ul class="links">
        <li>
                <a href="index">Home</a>
            </li>
            <hr>
            <li>
                <a href="attandance/index">Attendence</a>
            </li>
            <hr>

            <li>
                <a href="fees">Academic Fees</a>
            </li>
            <hr>
            <li>
                <a href="notices">Academic Notices</a>
            </li>
            <hr>
            <li>
                <a href="courceout">Course Outline</a>
            </li>
            <hr>
            <li>
                <a href="exam/index">Exam Timetable</a>
            </li>
            <hr>
            <li>
                <a href="repository">repository</a>
            </li>
        </ul>

    </aside>
    <!-- javascript -->
    <script>
        const toggleBtn = document.querySelector(".sidebar-toggle");
        const closeBtn = document.querySelector(".close-btn");
        const sidebar = document.querySelector(".sidebar");

        toggleBtn.addEventListener("click", function() {
            // if (sidebar.classList.contains("show-sidebar")) {
            //   sidebar.classList.remove("show-sidebar");
            // } else {
            //   sidebar.classList.add("show-sidebar");
            // }
            sidebar.classList.toggle("show-sidebar");
        });

        closeBtn.addEventListener("click", function() {
            sidebar.classList.remove("show-sidebar");
        });
    </script>

</body>

</html>