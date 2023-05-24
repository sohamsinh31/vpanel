<?php
session_start();
if (!isset($_SESSION['id'])) {
    echo "<h3 style=alignment:'center'>Not logged in</h3>";
} else {
    header('location:index.php');
}
$next = $_GET['next'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link id="stylesheet" rel="stylesheet" type="text/css" href="styles.css" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url('city.jpg');
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="upload">
        <div class="col-lg-6">
            <h2>Log in form</h2>
            <form action="validation.php" method="post" enctype="multipart/form-data">
                <div class="form-groop">
                    <label>email</label>
                    <br>
                    <input
                        style="width:80%;float:left;border-bottom: 2px solid white;background:none;border-style: none none solid;"
                        type="text" name="user">
                    <br>
                </div>

                <div class="form-groop">
                    <br>
                    <label>password</label>
                    <br>
                    <input
                        style="width:80%;float:left;border-bottom: 2px solid white;background:none;border-style: none none solid;"
                        type="password" name="password">
                </div>
                <input type="hidden" name="next" value=<?php echo $next ?>>
                <br>
                <br>
                <span><a style="color:gold;" href="signup.php">Not logged in yet click to Sign up</a></span><br>
                <button style="background-color:blue;border-radius:12px;width:20%;color:white;" onclick="return foo();"
                    type="submit" name="submit" class="btn btn-primary">Login</button>
                <?php
                $message = $_GET['message'];
                if ($message) {
                    echo "<h3>Incorrect username or password</h3>";
                }
                ?>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
<script src="script/script.js"></script>

</html>