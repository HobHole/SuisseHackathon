<?php
	$db = mysqli_connect("127.0.0.1","root","", "bulletinboard");

	$postid = mysqli_real_escape_string($db, $_POST['postid']);
	
	$cmd = "SELECT * FROM posts where postid = '".$postid."';";
		$return = mysqli_query($db, $cmd);
		$returnAss = mysqli_fetch_assoc($return);
		
		$subcatid = $returnAss['subcatid'];
		$title = $returnAss['title'];
		$description = $returnAss['description'];
		$locationid = $returnAss['location'];
		$price = $returnAss['price'];
		$image1 = $returnAss['image1'];
		$image2 = $returnAss['image2'];
		$image3 = $returnAss['image3'];
		$active = $returnAss['active'];
	
	$cmd = "SELECT name FROM locations where locationid = '".$locationid."';";
		$return = mysqli_query($db, $cmd);
		$returnAss = mysqli_fetch_assoc($return);
		$location = $returnAss['name'];
		
	$cmd = "SELECT catid FROM subcategory where subcatid = '".$subcatid."';";
		$return = mysqli_query($db, $cmd);
		$returnAss = mysqli_fetch_assoc($return);
		$catid = $returnAss['catid'];
	echo '
		<div style = "font-size:20pt"> Update Post </div>
		<form method = "post" id = "createPost" action="updatePost.php" enctype="multipart/form-data">
			<input type = "text" name = "postid" style = "display:none;" value = "'.$postid.'"/>
			<span class = "dropdown" style = "float:left;width:125px;">
				<input id = "loc" style = "margin-top:2px" name ="locations" value = "'.$location.'" placeholder="Locations" readonly/> 
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
			
			<span class = "dropdown" style = "float:left;width:125px;">
				<input id = "cat" style = "margin-top:2px;width:125px" name ="category" value = "'.$catid.'"placeholder="Category" readonly/> 
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
			
			<span style= "margin-left:50px;">$<input style= "width:50px;"type="text" value = "'.$price.'"name="price" id="price" placeHolder="Price"/></span>
			
			
			<textarea rows="2" cols="38" name="subj" form="createPost" style = "margin-top:2px; font-size:16pt; resize :none; font-family:verdana" placeholder = "Subject">'.$title.'</textarea>
			<textarea rows="15" cols="55" name="desc" form="createPost" style = "margin-top:2px; font-size:12pt; resize :none; font-family:verdana" placeholder = "Description">'.$description.'</textarea>
			
			<input type="file" name="fileToUpload" id="fileToUpload"/></br>
			<input type="file" name="fileToUpload1" id="fileToUpload1"/></br>
			<input type="file" name="fileToUpload2" id="fileToUpload2"/>
			
			<input class = "fbutton" style = "margin-left:100px;"value="Update" type = "submit"/>
		</form>
	';


?>