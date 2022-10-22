<?php 
// session_start();
		// $id = $_SESSION['id'];
		$con = mysqli_connect('localhost','root','','vpanel');
		// mysqli_select_db($con,'vpanel');
function userimage($sid) {
	$add = $_POST['user'];
    $add2 = explode(" ",$add);
	$add3 = generateRandomString();
	mkdir('students/'.$sid);
			$target_dir = "students/".$sid."/";
			$uploadOk = 1;
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);			
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$i=0;
			if(file_exists($target_file)) {
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]).$add3;
				$i++;			
			}
			
			if($imageFileType != "png" && $imageFileType != "gif" && $imageFileType != "jpeg"
			&& $imageFileType != "jpg" ) {
			  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			  $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			  echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
			  } else {
				echo "Sorry, there was an error uploading your file.";
			  }
			}
		//}
		}
		function userim(){
			$id = $_SESSION['id'];
			$con = mysqli_connect('localhost','root');
			mysqli_select_db($con,'vpanel');
				$q = "SELECT * FROM `studentinfo` where id = '$id'";
				$result = mysqli_query($con,$q);
				$num = mysqli_num_rows($result);
				$id = $_SESSION['id'];
				if($num>0){
					while($row = mysqli_fetch_assoc($result)){
					  echo  "<img class='app_header_image' src='".$row['photourl']."' alt=''>";
					}
				}
		}
		function enrollment($branch){
			$con = mysqli_connect("localhost","root","","vpanel");
			$q2 = " SELECT * FROM `studentinfo` WHERE branchid = '$branch' ORDER BY studentname ASC";
			$result2 = mysqli_query($con,$q2);
			$i = 001;
			$enrollment = "";
			$q = "SELECT DISTINCT degree FROM `branches` WHERE id='$branch'";
			$result = $con->query($q);
			$row = $result->fetch_all(MYSQLI_ASSOC);
			while($test2 = mysqli_fetch_assoc($result2)){
				$degree = $row[0]['degree'];
				if($degree=='BE/BTECH'){
				echo "<br>";
				$enrollment = $test2['year'].'SE02'.$test2['branchid'].str_pad($i,3,'0',STR_PAD_LEFT);
				echo $enrollment;
				echo "<br>";
				}
				if($degree=='BSC'){
				$enrollment = $test2['year'].'SC01'.$test2['branch'].$i;
				echo $enrollment;
				}
				if($degree=='DIPLOMA'){
				$enrollment = $test2['year'].'SD03'.$test2['branch'].$i;
				}
				$sid = $test2['id'];
				$q = "UPDATE studentinfo SET enrollment = '$enrollment' WHERE id = '$sid'";
				if(mysqli_query($con,$q)){
				echo "success";
				}
				else {
				echo "kuchh or try karo bhai";
				}
				$i++;
			}
		}
		function generateRandomString($length = 4) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
?>