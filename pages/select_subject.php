You are in <?=$currentclass?> . Select Subjects <br>
<!-- <select name="selSub" id="selSub" onchange="selsub();">
	<option value="-">Select Subject</option> -->
	<ul class="selectbox subject-list">
	<li class='disp' style='border-bottom: none;text-align:center'>Select Subjects</li>
	<ul>
<?php
	foreach ($subjects as $subject) {
		# code...
		echo "<li value=\"".$subject['SubjectID']."\">".$subject['SubjectName']."</li>";
	}
	
?>
</ul>
</ul>