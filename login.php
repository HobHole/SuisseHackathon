<?php
	session_start();
    $db = mysqli_connect("127.0.0.1","root","", "bulletinboard");
            
    $user = mysqli_real_escape_string($db,$_POST['user']);
    $pass = mysqli_real_escape_string($db,$_POST['pass']);
    
    $saltcmd = "SELECT salt from users WHERE name = '".$user."';";
    $saltreturn = mysqli_query($db, $saltcmd);
    $salt = mysqli_fetch_assoc($saltreturn);
    $hashpass = hash("sha512", $pass.$salt['salt']);
    
    $cmd = "SELECT * FROM users WHERE name = '".$user."' AND password = '".$hashpass."';";
    $return = mysqli_query($db, $cmd);
    $accountCheck = mysqli_fetch_assoc($return);
    
    if (count($accountCheck) > 1) {
		$_SESSION["users"] = $accountCheck['name'];
		$_SESSION["pass"] = $accountCheck['password'];
		$_SESSION["loggedin"] = 1;
			
	}
?>
