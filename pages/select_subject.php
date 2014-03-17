You are in <?=$currentclass?> . Select Subjects <br>
<select name="selSub" id="selSub" onchange="selsub();">
	<option value="--">Select Subject</option>
<?php
	foreach ($subjects as $subject) {
		# code...
		echo "<option value=\"".$subject['SubjectID']."\">".$subject['SubjectName']."</option>";
	}
	
?>
</select>

<script>
	function selsub(){
		url = '/contents/classes/'+document.getElementById('selSub').value;
		window.location.href = url;
	}
</script>