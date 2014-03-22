Select Teachers
<ul class="selectbox">
<?php 
	  //print_r($teachers_list);
	//echo "<select name='teacher-select' id='teacher-select' onchange='change_teacher()'>";
	echo "<li class='disp'>&nbsp;&nbsp;&nbsp;Click to Select a Teacher!</li>";
	echo "<ul>";
	foreach ($teachers_list as $teacher) {
		echo "<li value=\"".$teacher['TeacherID']."\">".$teacher['TeacherFullName']."</li>";
	}	   
	echo "</ul>"

?>
</ul>
<br>