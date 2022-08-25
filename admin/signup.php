<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link id="stylesheet" rel="stylesheet" type="text/css" href="../styles.css"/>  
    <style>
        body{
            background-image: url('../city.jpg');
            background-size:cover;
        }
    </style>
</head>
<body>
    <div class="upload">
    <form action="ragistration.php" method="post" enctype="multipart/form-data">
    <label>Fullname:</label>
                    <br>
                    <input style="width:80%;float:left;border-bottom: 2px solid white;background:none;border-style: none none solid;" type="text" name="user" class="form-control">
<br>
<br>
<label>Choose degree:</label>  
<select name="degree">
    <option value="BE/BTECH">B.E/B.TECH</option>
    <option value="BSC">B.Sc</option>
    <option value="DIPLOMA">Diploma</option>
    </select>
    <br>
    <label>Choose branch:</label>  
<select name="branch">
    <option value="CSE">Computer science and engineering</option>
    <option value="ITE">Information technology and engineering</option>
    <option value="IT">Information technology</option>
    <option value="CH">Chemical engineering</option>
    <option value="CV">Civil engineering</option>
    <option value="MH">Mechanical engineering</option>
    <option value="CE">Computer engineering</option>
    <option value="PE">Pharmasutical engineering</option>
    </select>
    <br>
<label>Email:</label><input type="email" style="width:80%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" name="email">
                    <br>
                    <label>Choose password:</label><input type="password" style="width:80%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" name="password">
                    <label>Proffesion:</label><input type="text" style="width:80%;float:inline-end;border-bottom: 2px solid white;background:none;border-style: none none solid;" name="prof">
    <button style="background-color:blue;border-radius:12px;width:30%;color:white;" onclick="return clickme();" class="btn btn-primary" type="submit"  name="submit">UPLOAD</button>
    </form>
    </div>
</body>
<script src="../script.js"></script>

</html>