<?php
	$db = mysqli_connect("127.0.0.1","root","", "bulletinboard");

	echo '
		<div style = "font-size:20pt"> Create Post </div>
		<form method = "post" id = "createPost">
			<span class = "dropdown" style = "float:left;width:150px;">
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
			</span>
			
			<span class = "dropdown" style = "float:left;width:150px;">
				<input id = "cat" style = "margin-top:2px;width:150px" name ="category" placeholder="Category" readonly/> 
				<div class="dropdown-content" style="left:0;">';
				
			$cmd = "SELECT * FROM category";
			$return = mysqli_query($db, $cmd);

			$resultSet = Array();
			while ($entry = mysqli_fetch_assoc($return)){
				$resultSet[] = $entry;
			}
			for ($i = 0; $i < count($resultSet); $i++) {
				echo '<a onclick="setCategory(\''.$resultSet[$i]['name'].'\')">'.$resultSet[$i]['name'].'</a>';
			}
			echo '
				 </div>
			</span>
			
			<span id = "subcat"></span>
			
			
			<textarea rows="2" cols="38" name="comment" form="createPost" style = "margin-top:2px; font-size:16pt; resize :none; font-family:verdana" placeholder = "Subject"></textarea>
			<textarea rows="15" cols="55" name="comment" form="createPost" style = "margin-top:2px; font-size:12pt; resize :none; font-family:verdana" placeholder = "Description"></textarea>
			
			<input type="file" name="fileToUpload" id="fileToUpload"/></br>
			<input type="file" name="fileToUpload" id="fileToUpload"/></br>
			<input type="file" name="fileToUpload" id="fileToUpload"/>
			
			<span class = "fbutton" href = "register.php" style = "margin-left:100px">Submit</a> </span>
		</form>
	';


?>