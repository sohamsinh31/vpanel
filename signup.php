<?php
set_time_limit(0);
ini_set('memory_limit', '20000M');
session_start();
include('function.php');

// if(!isset($_SESSION['username'])){
//  echo "not logged in";
// }
// else{
    // header('location:index.php');
// }
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />


<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
<link id="stylesheet" rel="stylesheet" type="text/css" href="styles.css"/>  
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-image: url('city.jpg');
            background-size:cover;
        }
    </style>
</head>
<body>
<div class="upload">
            <h2>signup form</h2>
            <form action="ragistration.php" method="post" enctype="multipart/form-data">
                <div class="form-groop">
                    <label>Fullname(as per any 10th/12th marksheet):</label>
                    <br>
                    <input style="width:80%;float:left;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="text" name="user" class="form-control">
<br>
    <br>
                    <label>DateOfBirth:</label><br>
                    <input style="width:40%;float:left;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="date" name="date" class="form-control">
                    <label>Age:</label>
                    <input style="width:20%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="number" name="age" class="form-control">
                    <br>
                    <label>Gender:</label><input style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="radio" name="gender" value="male"><label>Male</label><input style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="radio" name="gender" value="female"><label>Female</label>
                    <br>
                    <label>Address:</label><input style="width:80%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="text" name="address" class="form-control">
                    <label>Pincode:</label><input type="number" style="width:20%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" name="pincode" maxlength="6">
                    <label>Mobile:</label><input type="tel" style="width:40%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" name="mobile">
<br>
<label>Email:</label><input type="email" style="width:80%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" name="email">
                    <br>
                    <label>Choose password:</label><input type="password" style="width:80%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" name="password">
                    <br><label>Students passport size photo:</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                <hr>
                <label style="color:gold;">Parents/Guardian's information:</label>
            <hr>    
            <label>Full name of father:</label>
            <input style="width:90%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="text" name="fathername" class="form-control">
            <br>
            <label>Proffesion:</label><input style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="radio" name="proffesion_father" value="buissness"><label>Buissness</label><input style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="radio" name="proffesion_father" value="job"><label>Job</label><input style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="radio" name="proffesion_father" value="other"><label>Other</label><input style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="radio" name="proffesion_father" value="teacher"><label>Teacher</label>
            <br>
            <label>Father's mobile</label><input type="tel" style="width:30%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" name="father_mobile">
            <br>
            <label>Full name of mother:</label>
            <input style="width:90%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="text" name="mothername" class="form-control">
            <br>
            <label>Proffesion:</label><input style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="radio" name="proffesion_mother" value="buissness"><label>Buissness</label><input style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="radio" name="proffesion_mother" value="job"><label>Job</label><input style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="radio" name="proffesion_mother" value="other"><label>Other</label><input style="width:10%;height:20px;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="radio" name="proffesion_mother" value="teacher"><label>Teacher</label>
            <br>
            <label>Mother's mobile</label><input type="tel" style="width:30%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" name="mother_mobile">

            <hr>  
            <label style="color:gold;">12th information</label> 
            <hr>
            <label>Physics theorey:</label><input style="width:20%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="number" name="physics_theorey" class="form-control"><label>Physics practical:</label><input style="width:20%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="number" name="physics_practical" class="form-control">
            <br>
            <label>maths theorey:</label><input style="width:20%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="number" name="maths_theorey" class="form-control"><label>English:</label><input style="width:20%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="number" name="english" class="form-control">

            <br>
            <label>chemistry theorey:</label><input style="width:20%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="number" name="chemistry_theorey" class="form-control"><label>Chemistry practical:</label><input style="width:20%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="number" name="chemistry_practical" class="form-control">
            <br>
            <label>Total precentage(as per marksheet):</label><input style="width:20%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="number" name="percentage" class="form-control">
            <br>
            <hr>
            <label style="color:gold;">For collage information</label>
            <hr>
            <?php
            $q="SELECT * FROM `branches`";
            $result=$con->query($q);
            $row = $result->fetch_all(MYSQLI_ASSOC);
            $branches=array();
            $branchesn=array();
            $degree = array();
            foreach($row as $r){
                array_push($degree,$r['degree']);
                 array_push($branches,$r['name']);
                array_push($branchesn,$r['id']);
            }
            ?>
    <label>Choose branch:</label>  
    <?php
echo '<select class="form-control selectpicker"  name="branch" data-live-search="true">';
for($i=0;$i<sizeof($branches);$i++){
    echo '<option value="'.$branchesn[$i].'">'.$degree[$i].'-'.$branches[$i].'</option>';
}

    echo '</select>';
    ?>
    <label>Acadamic year:20</label><input style="width:20%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="number" name="year" class="form-control">
    <br>
    <label>Choose sem:</label>
    <select class="form-control selectpicker" data-live-search="true" id="sem" name="semester">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    </select>
        </div>
            <br>
                <span><a style="color:gold;" href="login.php">Already sign up in click to logged in</a></span>

<br>
<button style="background-color:blue;border-radius:12px;width:30%;color:white;" onclick="return clickme();" class="btn btn-primary" type="submit"  name="submit">UPLOAD</button>
</form>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<script src="script.js"></script>
<script>
    $(function() {
  $('.selectpicker').selectpicker();
});
</script>
</html>
