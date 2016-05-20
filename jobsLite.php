<?php
echo '
	<div class = "close"></div>
	
	<h1 align="center" style="padding-bottom:20px; color:black; border-bottom-style: groove;">Jobs</h1>
	
	
	<div style="position: absolute; top: 200px; left: 130px; width: 400px; font-weight: bold; color: white;">
	<p class="textPointer" onclick="subCategory(\'fulltime\'); close_box();" id="fulltime"><font size="6">full time</font></p>
	</div>
	
	<div style="position: absolute; top: 400px; left: 130px; width: 400px; font-weight: bold; color: white;">
	<p class="textPointer" onclick="subCategory(\'partTime\'); close_box();" id="part time"><font size="6">part time</font></p>
	</div>
	
	<div style="position: absolute; top: 600px; left: 100px; width: 400px; font-weight: bold; color: white;">
	<p class="textPointer" onclick="subCategory(\'weekends\'); close_box();" id="weekends only"><font size="6">weekends only</font></p>
	</div>';

?>