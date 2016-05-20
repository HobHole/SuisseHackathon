<?php
	session_start();
	$db = mysqli_connect("127.0.0.1","root","", "bulletinboard");
	
	$user = $_SESSION['users'];
	
	$cmd = "SELECT id FROM users WHERE name = '".$user."';";
	$return = mysqli_query($db, $cmd);
	$returnAss = mysqli_fetch_assoc($return);
	$userid =  $returnAss['id'];
	
	$cmd = "SELECT * FROM posts WHERE creatorid = '".$userid."' AND active = 1 ORDER BY postid;";
	$return = mysqli_query($db, $cmd);

	$resultSet = Array();
	while ($entry = mysqli_fetch_assoc($return)){
		$resultSet[] = $entry;
	}
	
	echo '
			<h1 align="center"; style="color:black;"> Posts Made</h1>
		
		';
	
	for ($i = 0; $i < count($resultSet); $i++) {
		$postid = $resultSet[$i]['postid'];
		$creatorid = $resultSet[$i]['creatorid'];
		$title = $resultSet[$i]['title'];
		$description = $resultSet[$i]['description'];
		$locationid = $resultSet[$i]['location'];
		$price = $resultSet[$i]['price'];
		$image1 = $resultSet[$i]['image1'];
		$image2 = $resultSet[$i]['image2'];
		$image3 = $resultSet[$i]['image3'];
		
		$cmd = "SELECT name FROM users WHERE id = '".$creatorid."';";
		$return = mysqli_query($db, $cmd);
		$returnAss = mysqli_fetch_assoc($return);
		$name = $returnAss['name'];
		
		$cmd = "SELECT name FROM locations WHERE locationid = '".$locationid."';";
		$return = mysqli_query($db, $cmd);
		$returnAss = mysqli_fetch_assoc($return);
		$location = $returnAss['name'];
				
		echo '
		
			<div style = "width:50%; height: 300px;" align="center" id="mailSlots">
				<span style = font-weight:8; font-size:14pt;">'.$name.' : '.$title.'</span>
				<br>
				<span style = "font-size:12pt;">Location : '.$location.'    Price : $'.$price.'</span>
				</br>
				<span>'.$description.'</span>
				<br>
				<br>
				';
			$dir = "uploads/";
			$filename = $dir.$image1;
			if (file_exists($filename)) {
				echo '<img style = "height:100px; width:100px;" src = "'.$filename.'"/>';
			}
			$filename = $dir.$image2;
			if (file_exists($filename)) {
				echo '<img  style = "height:100px; width:100px;"src = "'.$filename.'"/>';
			}
			$filename = $dir.$image3;
			if (file_exists($filename)) {
				echo '<img  style = "height:100px; width:100px;"src = "'.$filename.'"/>';
			}
			echo'
			</div>
			<span class = "fbutton midBox" style = "margin-left:60%;margin-top:-280px;position:absolute;" onclick = "update(\''.$postid.'\')"> Update </span>
			<span class = "fbutton" style = "margin-left:67%;margin-top:-280px;position:absolute;" onclick = "deactivate(\''.$postid.'\')"> Delete </span>
		';
	}

?>