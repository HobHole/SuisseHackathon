<?php
echo '
	<div class = "close"></div>
	
	<h1 align="center" style="padding-bottom:20px; color:white; border-bottom-style: groove;">Jobs</h1>
	
	
	<div style="position: absolute; top: 200px; left: 130px; width: 400px; font-weight: bold; color: white;">
	<p class="textPointer" onclick="subCategory(\'Services\'); close_box();" id="Services"><font size="6">Services</font></p>
	</div>
	
	<div style="position: absolute; top: 400px; left: 130px; width: 400px; font-weight: bold; color: white;">
	<p class="textPointer" onclick="subCategory(\'Tickets\'); close_box();" id="Tickets"><font size="6">Tickets</font></p>
	</div>
	
	<div style="position: absolute; top: 600px; left: 100px; width: 400px; font-weight: bold; color: white;">
	<p class="textPointer" onclick="subCategory(\'Used\'); close_box();" id="Used"><font size="6">Used</font></p>
	</div>';

?>