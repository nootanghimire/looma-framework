<!-- List all contents here -->
<?php
//Variables Available
/**
 * $currentsubject => 1D Array with indexes:  SubjectID, SubjectName, ClassNumber
 * $subjects => Array of $currentSubject Array (actually, array of all the subjects for specific class)
 * $contents => Array of Array(ContentID, ContentFileID, SubjectID, Category, Subcategory) 
 * $classes => Array of Classes;
 */

echo "CurrentSubject: <br><br>";
print_r($currentsubject);
echo "<br><br>";
echo "subjects: <br><br>";
print_r($subjects);
echo "<br><br>";
echo "contents: <br><br>";
print_r($contents);
echo "<br><br>";
echo "classes: <br><br>";
print_r($classes);
?>

