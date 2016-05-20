<?php
	$db = mysqli_connect("127.0.0.1","root","", "bulletinboard");

	echo '
		<div style = "font-size:20pt"> Create Post </div>
		<form method = "post" id = "createPost">
			<div class = "dropdown" style = "floate:left;">
				<input id = "loc" style = "margin-top:2px" name ="locations" placeholder="Locations" readonly/> 
				<div class="dropdown-content" style="left:0;">';
				
			$cmd = "SELECT * FROM locations";
			$return = mysqli_query($db, $cmd);

			$resultSet = Array();
			while ($entry = mysqli_fetch_assoc($return)){
				$resultSet[] = $entry;
			}
			for ($i = 0; $i < count($resultSet); $i++) {
				echo '<a onclick="setLocation(\''.$resultSet[$i]['name'].'\')">'.$resultSet[$i]['name'].'</a>';
			}
			echo '
				 </div>
			</div>
			<textarea rows="2" cols="38" name="comment" form="createPost" style = "margin-top:2px; font-size:16pt; resize :none; font-family:verdana" placeholder = "Subject"></textarea>
			<textarea rows="15" cols="55" name="comment" form="createPost" style = "margin-top:2px; font-size:12pt; resize :none; font-family:verdana" placeholder = "Description"></textarea>
		</form>
	';


?>