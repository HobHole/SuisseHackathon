<?php
echo '
	<div class = "close"></div>
	
	<h1 align="center" style="padding-bottom:20px; color:black; border-bottom-style: groove;">Housing</h1>
	
	<div style="position: absolute; top: 200px; left: 130px; width: 400px; font-weight: bold; color: white;">
	<p class="textPointer" onclick="subCategory(\'apartments\'); close_box();" id="apartments"><font size="6">apartments</font></p>
	</div>
	
	<div style="position: absolute; top: 400px; left: 130px; width: 400px; font-weight: bold; color: white;">
	<p class="textPointer" onclick="subCategory(\'houses\'); close_box();" id="housingswap"><font size="6">houses</font></p>
	</div>
	
	<div style="position: absolute; top: 600px; left: 130px; width: 400px; font-weight: bold; color: white;">
	<p class="textPointer" onclick="subCategory(\'rentals\'); close_box();" id="office/commercial"><font size="6">rentals</font></p>
	</div>';

?>