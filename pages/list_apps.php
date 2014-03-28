<ul id="apps-list">
<?php
foreach ($apps as $app) {
	echo "<a href='/apps/show_app/".$app['appid']."''><li>".$app['app_name']."</li></a>";
	//echo $app['app_desc'];
	//echo $app['app_type'];
	//echo "<br><br>";
	//TODO: Links
}
?>
</ul>