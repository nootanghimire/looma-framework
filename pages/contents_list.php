<script src="/template/scripts/jquery.dataTables.js"></script>
<link href="/template/styles/jquery.dataTables.css" rel="stylesheet" />
<style>
	.content-table{
		width:80%;
	}
</style>
<!-- List all contents here -->
<?php
//TODO: Everything... :D (Maybe host a full-day hackathon to complete it)

//Make a jQuery UI table and load everything which should be able to filter out!
//Variables Available
/**
 * $currentsubject => 1D Array with indexes:  SubjectID, SubjectName, ClassNumber
 * $subjects => Array of $currentSubject Array (actually, array of all the subjects for specific class)
 * $contents => Array of Array(ContentID, ContentFileID, SubjectID, Category, Subcategory) 
 * $classes => Array of Classes;
 */

/*echo "CurrentSubject: <br><br>";
print_r($currentsubject);
echo "<br><br>";
echo "subjects: <br><br>";
print_r($subjects);
echo "<br><br>";
echo "contents: <br><br>";*/
?>
<center>
	<div class="content-table">
		<table id="contents" width="100%">
			<thead>
				<tr>
					<th>Category</th>
					<th>Subcategory</th>
					<th>Type</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($contents as $content) {
					# code...
					?>
						<tr>
						<td><?=$content['Category']?></td>
						<td><?=$content['Subcategory']?></td>
						<td><a href="/contents/view/<?=$content['ContentFileID']?>"><?=$content['ContentType']?></a></td>
						</tr>
					<?php
					}
					?>				
			</tbody>
		</table>
	</div>
</center>
<?php
/*print_r($contents);
echo "<br><br>";
echo "classes: <br><br>";
print_r($classes);*/
?>
<script>
$(document).ready( function () {
  var table = $('#contents').DataTable();
});

</script>