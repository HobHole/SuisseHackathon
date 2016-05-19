<?php
	session_start();
	echo '<img onclick = "send(\'home\')"class = "logo" src="png/bulletinBoardLogo.png"/>';
	
	$db = mysqli_connect("127.0.0.1","root","", "bulletinboard");
	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == 1) {
		echo '
			<span style = "margin-top:-50px; margin-left:30%"> Welcome '.$_SESSION['users'].'!</span>
			<div class = "dropdown" style = "floate:left;">
				<img class = "navibutton" onmouseover = "rotateDIV()" id = "setting" src="png/setting.png"/>
			<div class="dropdown-content" style="left:0;">
				<a href="#">Link 1</a>
				<a href="#">Link 2</a>
				<a onclick = "logoff()">Log out</a>
			  </div>
			</div>
			<img onclick = "send(\'mail\')" class = "navibutton" id = "email" src = "png/mail.png"/>
			<img onclick = "loadMidLite(\'createPost\')" class = "navibutton midBox" id = "newPost" src = "png/newPost.png"/>
			';
	} else {
		session_unset();
		echo '
			<form style="margin-top:-50px; margin-left:60%;" method="post" onSubmit = "return login()">
				<span class = "midBox" onclick = "loadMidLite(\'loginPage\')" style = "font-face:verdana;color:#0000cd;"> Login </span> |
				<span class = "midBox" onclick = "loadMidLite(\'register\')" style = font-face:verdana;color:#0000cd;"> Register </span>
			</br>
			<input type = "text" name="search" placeholder="Search"></input>
			</form>';
	}
?>