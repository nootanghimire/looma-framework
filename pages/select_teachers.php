Select Teachers
<?php 
	  //print_r($teachers_list);
	echo "<select name='teacher-select' id='teacher-select' onchange='change_teacher()'>";
	echo "<option value='--'>Click to Select a Teacher!</option>";
	foreach ($teachers_list as $teacher) {
		echo "<option value=\"".$teacher['TeacherID']."\">".$teacher['TeacherFullName']."</option>";
	}	   
	echo "</select>"

?>
<br>
<script type="text/javascript">
function change_teacher(){
	var current_selected = document.getElementById('teacher-select').value;
	var url = "/teachers/start_teaching/"+current_selected;
	window.location.href = url;
	//window.location.href = 
}
</script>