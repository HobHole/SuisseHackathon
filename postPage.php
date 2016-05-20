<?php
	session_start();
	$db = mysqli_connect("127.0.0.1","root","", "bulletinboard");
	
	$user = $_SESSION['users'];
	
	$cmd = "SELECT id FROM users WHERE name = '".$user."';";
	$return = mysqli_query($db, $cmd);
	$returnAss = mysqli_fetch_assoc($return);
	$userid = $returnAss['id'];
	
	$cmd = "SELECT messenger, receiver, subject, body FROM mail 
			WHERE messenger = ".$userid." 
			OR receiver = ".$userid."
			ORDER BY dateCreated";
			
	$return = mysqli_query($db, $cmd);

	$resultSet = Array();
	while ($entry = mysqli_fetch_assoc($return)){
		$resultSet[] = $entry;
	}
	
	echo '
			<h1 align="center"; style="color:black;">Mail</h1>
		
		';
	
	for ($i = 0; $i < 2; $i++) {
		$messengerid = $resultSet[$i]['messenger'];
		$receiverid = $resultSet[$i]['receiver'];
		$subject = $resultSet[$i]['subject'];
		$body = $resultSet[$i]['body'];
		
		$message;
		$show;
		if ($messengerid == $userid) {
			$message = $user.' : '.$body;
		} else {
			$cmd = "SELECT name FROM users WHERE name = '".$messengerid."';";
			$return = mysqli_query($db, $cmd);
			$returnAss = mysqli_fetch_assoc($return);
			$name = $returnAss['name'];
			
			$message = $name.' : '.$body;
		}
		
		
		
		$show = $message;
		echo '
		
			<div style = "width:50%; height: 80px;" align="center" id="mailSlots">
				<span style = font-weight:8">RE: '.$subject.'</span>
				<br>
				<span>'.$show.'</span>
				<br>
				<br>
			</div>
		';
	}

?>