<br>
Select Level.

<select name="levelSelect" id="levelSelect" onchange="select_class();">
<option value="--">Select Class</option>
	<?php
	print_r ($classes);
	foreach ($classes as $value) {
		$class = $value['ClassNumber']; //DB
		
	
	?>
	<option value="<?=$class?>">Class <?=$class?></option>

	<?php 
		}
	?>
</select>
<script>
	function select_class(){
		var url = "/contents/in/"+document.getElementById('levelSelect').value;
		window.location.href = url;
	}
</script>