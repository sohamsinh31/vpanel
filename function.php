<?php 
		$con = mysqli_connect('localhost','root');
		mysqli_select_db($con,'vpanel');
function userimage() {
	$add = $_POST['user'];
    $add2 = explode(" ",$add);
	mkdir('students/'.$add2[0].'');
		// $con = mysqli_connect('localhost','root');
		// mysqli_select_db($con,'vpanel');
		// $q = " SELECT * FROM `users` ";
		// $result = mysqli_query($con,$q);
		// $num = mysqli_num_rows($result);
		// while($row = mysqli_fetch_assoc($result)){
			$target_dir = "students/".$add2[0]."/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
			if (file_exists($target_file)) {
			  echo "Sorry, file already exists.";
			  $uploadOk = 0;
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
?>