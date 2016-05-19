<?php
	echo '
		<form style="margin-top:-50px; margin-left:60%;" method="post" onSubmit = "return login()">
				<span>Username: <input id="luser" class="user" type = "text" maxlength = 12 name = "user"/></span>
				</br>
				<span style = "margin-left: 6px;margin-top:3px;">Password: <input id="lpass" type = "password" name = "pass"/> </span>
				</br>
				<input class = "fbutton" value="LOGIN" type = "submit"/>
				<span class = "fbutton" href = "register.php" onclick = send("register")>REGISTER</a> </span>
			</br>
			</form>';
?>
