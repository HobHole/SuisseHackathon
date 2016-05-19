<?php
	echo '
		<form method="post" onSubmit = "mail()">
			<span> receiver : <input style = "width:170px;" id = "receiver" type = "text" maxlength = 12 name = "receiver"/> </span>
			<span> subject : <input style = "width:170px;" id = "subject" type = "text" maxlength = 50 name = "subject"/> </span>
			<span> body : <input style = "width:170px;" id = "body" type = "text" maxlength = 255 name = "body"/> </span>
			<span> <input class = "fbutton" style = "width : 100px;" type = "submit" value="REGISTER"/> </span>
		</form>
	';
?>