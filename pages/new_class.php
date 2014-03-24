<br>
Select Level.
<ul class="selectbox class-list">
<!--<select name="levelSelect" id="levelSelect" onchange="select_class();">-->
<li class='disp' style='border-bottom: none;text-align:center'>Select Class</li>
<ul>
	<?php
	//print_r ($classes);
	foreach ($classes as $value) {
		$class = $value['ClassNumber']; //DB
		
	
	?>
	<li value="<?=$class?>">Class <?=$class?></li>

	<?php 
		}
	?>
</ul>
</ul>