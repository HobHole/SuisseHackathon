<?php
	session_start();
	$db = mysqli_connect("127.0.0.1","root","", "bulletinboard");
	
	$user = $_SESSION['users'];
	
	$subCat = mysqli_real_escape_string($db,$_POST['subCat']);
	
	$cmd = "SELECT subcatid FROM subcategory WHERE name = '".$subCat."';";
	$return = mysqli_query($db, $cmd);
	$returnAss = mysqli_fetch_assoc($return);
	$subcatid = $returnAss['id'];
	
	$cmd = "SELECT * FROM posts WHERE subcatid = '".$subcatid."' AND active = 1 ORDER BY postid;";
	$return = mysqli_query($db, $cmd);

	$resultSet = Array();
	while ($entry = mysqli_fetch_assoc($return)){
		$resultSet[] = $entry;
	}
	
	echo '
			<h1 align="center"; style="color:black;">'.$subcat.'</h1>
		
		';
	
	for ($i = 0; $i < 2; $i++) {
		$creatorid = $resultSet[$i]['creatorid'];
		$title = $resultSet[$i]['title'];
		$description = $resultSet[$i]['description'];
		$locationid = $resultSet[$i]['location'];
		$price = $resultSet[$i]['price'];
		
		$cmd = "SELECT name FROM users WHERE id = '".$creatorid."';";
		$return = mysqli_query($db, $cmd);
		$returnAss = mysqli_fetch_assoc($return);
		$name = $returnAss['name'];
		
		$cmd = "SELECT name FROM locations WHERE locationid = '".$location."';";
		$return = mysqli_query($db, $cmd);
		$returnAss = mysqli_fetch_assoc($return);
		$location = $returnAss['name'];
				
		echo '
		
			<div style = "width:50%; height: 80px;" align="center" id="mailSlots">
				<span style = font-weight:8; font-size:14pt;">'.$subject.' : '.$title.'</span>
				<br>
				<span style = "font-size:12pt;">Location : '.$location.'    Price : $'.$price.'</span>
				<span>'.$description.'</span>
				<br>
				<br>
			</div>
		';
	}

?>