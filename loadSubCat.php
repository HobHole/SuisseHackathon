<?php
	$db = mysqli_connect("127.0.0.1","root","", "bulletinboard");
	
	$cat = mysqli_real_escape_string($db,$_POST['cat']);
	echo ' 
			<span class = "dropdown" style = "float:left;width:150px;">
			<input id = "scat" style = "margin-top:2px;width:150px" name ="category" placeholder="Subcategory" readonly/> 
			<div class="dropdown-content" style="left:0;">';
			
		$cmd = "SELECT categoryid FROM category WHERE name = '".$cat."';";
		$return = mysqli_query($db, $cmd);
		$returnAss = mysqli_fetch_assoc($return);
		$catid = $returnAss['categoryid'];

		$cmd = "SELECT name FROM subcategory WHERE catid = '".$catid."';";
		$return = mysqli_query($db, $cmd);
		$resultSet = Array();
		while ($entry = mysqli_fetch_assoc($return)){
			$resultSet[] = $entry;
		}
		for ($i = 0; $i < count($resultSet); $i++) {
			echo '<a onclick="setSubCat(\''.$resultSet[$i]['name'].'\')">'.$resultSet[$i]['name'].'</a>';
		}
		echo '
			 </div>
		</span>
	';

?>