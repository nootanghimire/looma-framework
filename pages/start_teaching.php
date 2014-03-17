<a href="/contents/new_class/">Start a New Class</a>
<br><br>
<?php
if($hasSession)
{
	if($hasContent){
?>
	You were teaching  <?=$content['Subcategory']?> under <?=$content['Category']?> for subject <?=$subject['SubjectName']?> for Class <?=$subject['ClassNumber']?>
<?php
	} else {
?>
	You were teaching for subject <?=$subject['SubjectName']?> for Class <?=$subject['ClassNumber']?>
	

<?php 
	}
	?><a href="/contents/<?=$url_map?>/<?=$resumeID?>">Resume Saved Session</a><?php
}
?>
