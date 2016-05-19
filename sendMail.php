<?php
	$db = mysqli_connect("127.0.0.1","root","", "bulletinboard");
	session_start();
	$user = $_SESSION['users'];
	
	$receiver = mysqli_real_escape_string($db, $_POST['receiver']);
	$subject = mysqli_real_escape_string($db, $_POST['subject']);
	$body = mysqli_real_escape_string($db,($_POST['body']));

	$cmd = "SELECT id FROM users WHERE name = '".$user."';";
	$return = mysqli_query($db, $cmd);
	$returnAss = mysqli_fetch_assoc($return);
	$userid = $returnAss['id'];
	
	$cmd = "SELECT id FROM users WHERE name = '".$receiver."';";
	$return = mysqli_query($db, $cmd);
	$returnAss = mysqli_fetch_assoc($return);
	$receiverid = $returnAss['id'];
	
	$time = new DateTime();
	$ftime = $time->format("Y-m-d H:i:s");
	
	$cmd = "INSERT INTO mail (messenger, receiver, subject, body, dateCreated) VALUES ('".$userid."', '".$receiverid."','".$subject."', '".$body."','".$ftime."');";
	$result = mysqli_query($db, $cmd);
	
	echo 'Success';

?>