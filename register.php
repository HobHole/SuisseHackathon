<?php
	session_start();
	
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1) {
		echo '
			<div> You are already logged in </div>
			<script>
				send("home");
			</script>
		';
	} else {
		echo '
			<div style = "text-align:center">
				<form style="margin-top:20px;margin-left:auto;margin-right:auto;" method = "post" onSubmit = "return register();">
				<span> USERNAME : 
				</br>
				<input style = "width:170px;" id = "user" type = "text" maxlength = 12 name = "user"/> </span>
				</br>
				<span> PASSWORD : 
				</br>
				<input style = "width:170px;" id = "fpass" type = "password" name = "fpass"/> </span>
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
			</div>
		';
	}

?>