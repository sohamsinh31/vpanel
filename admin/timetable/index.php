<?php
session_start();
if(!isset($_SESSION['id2'])){
    header('location:../login.php?next="timetable/index"');
}
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'vpanel');
$query = "SELECT * FROM teacher";
$result = $con->query($query);
echo "id  name <br>";
while($row = $result->fetch_assoc()){
    echo $row['id']." ".$row['teachername'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>   
<!-- $output = " -->
<form method='post' action='insert' enctype='multipart/form-data'>
        <table border='1' width='25%'>
            <tr>
            <td>starttime</td>
            <td>endtime</td>
            <td>class</td>
            <td>Teacherid</td>
            <td>subject</td>
            <td>Branch</td>
            <td>Sem</td>
            <td>Degree</td>
            <td></td>
            </tr>
<!--  $output .= " -->
            <tr id='111'>
            <td><input type='time' value="16:32:55"  name='start[]' required/></td>
            <td><input type='time' value="17:32:55"  name='end[]' required/></td>
            <td><input type='text' name='class[]'required/></td>
            <td><input type='text' name='id[]' required/></td>
            <td><input type='text' name='sub[]' required/></td>
            <td>
            <select name="branch[]">
            <option value="CSE">Computer science and engineering</option>
            <option value="ITE">Information technology and engineering</option>
            <option value="IT">Information technology</option>
            <option value="CH">Chemical engineering</option>
            <option value="CV">Civil engineering</option>
            <option value="MH">Mechanical engineering</option>
            <option value="CE">Computer engineering</option>
            <option value="PE">Pharmasutical engineering</option>
            </select>
            </td>
            <td><input type='text' name='sem[]'required/></td>
            <td>
            <select name="degree[]">
            <option value="BE/BTECH">B.E/B.TECH</option>
            <option value="BSC">B.Sc</option>
            <option value="DIPLOMA">Diploma</option>
            </select>
            </td>
            <td><button style="background-color:red;color:white;" onclick="deletefun(111)">Delete</button></td>
            </tr>
            
 <!-- $output .= " -->
            <tr id='222'>
            <td><input type='time' value="16:32:55" name='start[]'required/></td>
            <td><input type='time' value="17:32:55" name='end[]'required/></td>
            <td><input type='text' name='class[]'required/></td>
            <td><input type='text' name='id[]' required/></td>
            <td><input type='text' name='sub[]' required/></td>
            <td>
            <select name="branch[]">
            <option value="CSE">Computer science and engineering</option>
            <option value="ITE">Information technology and engineering</option>
            <option value="IT">Information technology</option>
            <option value="CH">Chemical engineering</option>
            <option value="CV">Civil engineering</option>
            <option value="MH">Mechanical engineering</option>
            <option value="CE">Computer engineering</option>
            <option value="PE">Pharmasutical engineering</option>
            </select>
            </td>
            <td><input type='text' name='sem[]'required/></td>
            <td>
            <select name="degree[]">
            <option value="BE/BTECH">B.E/B.TECH</option>
            <option value="BSC">B.Sc</option>
            <option value="DIPLOMA">Diploma</option>
            </select>
            </td>
            <td><button style="background-color:red;color:white;" onclick="deletefun(222)">Delete</button></td>
            </tr>

            </table>
            <table border='1' id='table'></table>
            <button id='clickme'>Add</button>
            <button type='submit'>Submit</button>
            </form>
<!-- echo $output;
?> -->
</body>
<script src="../js/jquery.js"></script>
<script>
    let i = 0;
    let html = ``;
    $("#clickme").on("click",function(e){ 
        let data =`
        <tr id='${i}'>
            <td><input type='time' name='start[]' required/></td>
            <td><input type='time' name='end[]'required/></td>
            <td><input type='text' name='class[]'required/></td>
            <td><input type='text' name='id[]' required/></td>
            <td><input type='text' name='sub[]' required/></td>
            <td>
            <select name="branch[]">
            <option value="CSE">Computer science and engineering</option>
            <option value="ITE">Information technology and engineering</option>
            <option value="IT">Information technology</option>
            <option value="CH">Chemical engineering</option>
            <option value="CV">Civil engineering</option>
            <option value="MH">Mechanical engineering</option>
            <option value="CE">Computer engineering</option>
            <option value="PE">Pharmasutical engineering</option>
            </select>
            </td>
            <td><input type='text' name='sem[]'required/></td>
            <td>
            <select name="degree[]">
            <option value="BE/BTECH">B.E/B.TECH</option>
            <option value="BSC">B.Sc</option>
            <option value="DIPLOMA">Diploma</option>
            </select>
            </td>
            <td><button style="background-color:red;color:white;" onclick='deletefun(${i})'>Delete</button></td>
            </tr>
            `;
        html+=data;
        i++;
        $("#table").html(
            html
        )
    e.preventDefault();
    
    });
$("#delete").on("click",function(e){
        let i = 0;
        $("#table").html(
            data
        )
        i++;
        e.preventDefault();
    });
function deletefun(dt){
    document.getElementById(`${dt}`).innerHTML="";
    // i = dt-1;
    // console.log(i)
}
// var timepicker = new TimePicker('time', {
//   lang: 'en',
//   theme: 'dark'
// });
// timepicker.on('change', function(evt) {
  
//   var value = (evt.hour || '00') + ':' + (evt.minute || '00');
//   evt.element.value = value;

// });
</script>
</html>
