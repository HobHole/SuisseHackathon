<?php
	$db = mysqli_connect("127.0.0.1","root","", "bulletinboard");
	if (!isset($_POST['user']) || !isset($_POST['pass']) || !isset($_POST['cpass']) || !isset($_POST['email']) || !isset($_POST['cemail']) ||
		$_POST['user'] == '' || $_POST['pass'] == '' || $_POST['cpass'] == '' || $_POST['email'] == '' || $_POST['cemail'] == '') {
		echo '	
				<div id="superbox">
					<div style = "text-align:center"> 
						One or more fields are incomplete.
						</br>
						Please try again! </div>
					<form style="margin-top:20px;margin-left:auto;margin-right:auto;" method = "post" onSubmit = "return register();">
						<span> USERNAME : 
						</br>
						<input style = "width:170px;" id = "user" type = "text" maxlength = 12 name = "user"/> </span>
						</br>
						<span> PASSWORD : 
						</br>
						<input style = "width:170px;" id = "fpass"type = "password" name = "fpass"/> </span>
						</br>
						<span> CONFIRM PASSWORD : 
						</br>
						<input style = "width:170px;" id = "cpass"type = "password" name = "cpass"/> </span>
						</br>
						<span> E-MAIL : 
						</br>
						<input style = "width:170px;" id = "email" type = "text" name = "email"/> </span>
						</br>
						<span> CONFIRM E-MAIL : 
						</br>
						<input style = "width:170px;" id = "cemail" type = "text" name ="cemail"> </span>
						</br>
						</br>
						<div style="text-align:center;"><input class = "fbutton" style = "width : 100px;" type = "submit" value="REGISTER"/></div>
					</form>
				</div>';

	} else {
		$user = mysqli_real_escape_string($db, $_POST['user']);
		$pass = mysqli_real_escape_string($db,$_POST['pass']);
		$cpass = mysqli_real_escape_string($db,$_POST['cpass']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$cemail = mysqli_real_escape_string($db,$_POST['cemail']);
		$cmd = "SELECT * FROM users WHERE name = '".$user."';";
		$result = mysqli_query($db, $cmd);
		$accountCheck = mysqli_fetch_assoc($result);
		echo '<div style ="text-align:center;">';
		if (count($accountCheck) > 1 || preg_match('/[^A-Za-z0-9]/', $user) || $pass != $cpass || $email != $cemail) {
			if (count($accountCheck) > 1)
				echo 'This username is already in use.</br>';
			else if (preg_match('/[^A-Za-z0-9]/', $user))
				echo 'Usernames cannot contain any special characters.</br>';
			else if ($pass != $cpass) 
				echo 'The passwords do not match.</br>';
			else if ($email != $cemail)
					echo 'The emails do not match.</br>';
			echo '
				</div>
				<form style="margin-top:20px;margin-left:auto;margin-right:auto;" method = "post" onSubmit = "return register();">
					<span> USERNAME : 
					</br>
					<input style = "width:170px;" id = "user" type = "text" maxlength = 12 name = "user"/> </span>
					</br>
					<span> PASSWORD : 
					</br>
					<input style = "width:170px;" id = "pass"type = "password" name = "pass"/> </span>
					</br>
					<span> CONFIRM PASSWORD : 
					</br>
					<input style = "width:170px;" id = "cpass"type = "password" name = "cpass"/> </span>
					</br>
					<span> E-MAIL : 
					</br>
					<input style = "width:170px;" id = "email" type = "text" name = "email"/> </span>
					</br>
					<span> CONFIRM E-MAIL : 
					</br>
					<input style = "width:170px;" id = "cemail" type = "text" name ="cemail"> </span>
					</br>
					</br>
					<div style="text-align:center;"><input class = "fbutton" style = "width : 100px;" type = "submit" value="REGISTER"/></div>
				</form>
			</div>';
		} else {
			$length = 10;
			$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
			$cmd = "INSERT INTO bulletinboard.users (name, password, salt, email) VALUES ('".$user."', '".hash("sha512", $pass.$randomString)."','".$randomString."', '".$email."');";
			$result = mysqli_query($db, $cmd);
			echo '
					</br>
					</br>
					<span style = "font-size : 20pt"> Welcome '.$user.'! </span>
					</br>
					</br>
					<span> You have successfully signed up! </span>
					</br>
					<span> You can log in now! </span>
					</br>
					</br>';
		}
	}
?>