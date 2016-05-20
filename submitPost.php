<?php
	session_start();
	$db = mysqli_connect("127.0.0.1","root","", "bulletinboard");
	$location = mysqli_real_escape_string($db, $_POST["locations"]);
	$subcat = mysqli_real_escape_string($db, $_POST["subcat"]);
	$user = $_SESSION["users"];

	$subcatid; //
    $creatorid;
    $title =  mysqli_real_escape_string($db, $_POST["subj"]);;
    $description = mysqli_real_escape_string($db, $_POST["desc"]);
    $locationid;
    $price = mysqli_real_escape_string($db, $_POST["price"]);;
    $image1 = "null";
    $image2 = "null";
    $image3 = "null";
    $active = true;
	
	echo '
		<!DOCTYPE html>
			<html lang="en">
			<head>
				<title>bulletinBoard</title>
				<link rel="stylesheet" type="text/css" href="main.css">
				<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>        
				<script type = "text/javascript" src = "jqueryEffects.js"></script>
				<script type="text/javascript">
				var request;
			
				if (window.XMLHttpRequest){
					request=new XMLHttpRequest();
				} else{
					request=new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				function checkLogin() {
					request.onreadystatechange = function() {
						if (request.readyState == 4 && request.status == 200) {
							document.getElementById("banner").innerHTML=request.responseText;
						}
					}
					request.open("GET", "checkLogin.php", false);
					request.send();
				}
				</script>
			</head>
			<body>
			</body>
			</html>
		';
	
	$cmd = "SELECT subcatid FROM subcategory WHERE name = '".$subcat."';";
		$return = mysqli_query($db, $cmd);
		$returnAss = mysqli_fetch_assoc($return);
		$subcatid = $returnAss['subcatid'];
	
	$cmd = "SELECT locationid FROM locations WHERE name = '".$location."';";
		$return = mysqli_query($db, $cmd);
		$returnAss = mysqli_fetch_assoc($return);
		$locationid = $returnAss['locationid'];
		
	$cmd = "SELECT id FROM users WHERE name = '".$user."';";
		$return = mysqli_query($db, $cmd);
		$returnAss = mysqli_fetch_assoc($return);
		$creatorid = $returnAss['id'];
	
	if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]['name'] != '') {
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 1) {
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
			$image1 = basename($_FILES["fileToUpload"]["name"]);
		// if everything is ok, try to upload file
		}
	}
	
	if (isset($_FILES["fileToUpload1"]['name']) && $_FILES["fileToUpload1"]['name'] != '') {
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 1) {
			move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file);
			$image2 = basename($_FILES["fileToUpload1"]["name"]);
		// if everything is ok, try to upload file
		}
	}
	
	if (isset($_FILES["fileToUpload2"]['name']) && $_FILES["fileToUpload2"]['name'] != '') {
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 1) {
			move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file);
			$image3 = basename($_FILES["fileToUpload2"]["name"]);
		// if everything is ok, try to upload file
		}
	}
	
	$cmd = "INSERT INTO posts (subcatid, creatorid, title, description, location, price, image1, image2, image3) VALUES ('".$subcatid."','".$creatorid."','".$title."','".$description."','".$locationid."','".$price."','".$image1."','".$image2."','".$image3."');";
			$result = mysqli_query($db, $cmd);
			
	echo '
		<div id="banner"></div>

		<div id = "content"> Page created</div>
		<div class = "backdrop"></div>
		<div id = "box"></div>
		<div id ="midBox"></div>
		<meta http-equiv="refresh" content="3;URL=index.php" />
		</body>
		<script>
			checkLogin();
		</script>
		</html>';

?>