<?php
	session_start();
	echo '<img onclick = "send(\'home\')"class = "logo" src="png/suisseBoard.png"/>';
	
	$db = mysqli_connect("127.0.0.1","root","", "bulletinboard");
	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == 1) {
		echo '
			<span style = "margin-left:30%"> Welcome '.$_SESSION['users'].'!</span>
			<div class = "dropdown" style = "floate:left;">
				<img class = "navibutton" onmouseover = "rotateDIV()" id = "setting" src="png/setting.png"/>
				<div class="dropdown-content" style="left:0;">
					<a onclick = "send(\'viewPostsMade\')">Post History</a>
					<a href="#">Watch List</a>
					<a onclick = "logoff()">Log out</a>
				  </div>
			</div>
			<img onclick = "send(\'mail\')" class = "navibutton" id = "email" src = "png/mail.png"/>
			<img onclick = "loadMidLite(\'createPost\')" class = "navibutton midBox" id = "newPost" src = "png/newPost.png"/>
			<form style = "display:inline" method="post" onSubmit = "return searchItem()">
				<input id="item" type = "text" name = "item" placeholder = "Search"/> </span>
				<input class = "fbutton" value="LOGIN" type = "submit" style = "display:none"/>
				</br>
			</form>

			';
	} else {
		session_unset();
		echo '
			<form style="margin-top:-50px; margin-left:60%;" method="post" onSubmit = "return login()">
				<span class = "midBox point" onclick = "loadMidLite(\'loginPage\')" style = "font-face:verdana;"> Login </span> |
				<span class = "midBox point" onclick = "loadMidLite(\'register\')" style = font-face:verdana;"> Register </span>
			</br>
			<input type = "text" name="search" placeholder="Search"></input>
			</form>';
	}
?>