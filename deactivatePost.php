<?php
	session_start();
	$db = mysqli_connect("127.0.0.1","root","", "bulletinboard");
	
	$user = $_SESSION['users'];
	
	$postid = mysqli_real_escape_string($db, $_POST['postid']);
	
	$cmd = "UPDATE posts SET active = 0 WHERE postid = '".$postid."';";
	$return = mysqli_query($db, $cmd);

?>