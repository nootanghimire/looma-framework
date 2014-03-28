<?php
/*************************************************
 * Nootan Ghimire <nootan.ghimire@gmail.com>
 * Req&Res(pronounced Reqyendres) Framework
 */


/* 
 * So that you can use anything at ease
 */
spl_autoload_register(function($class){
	if(file_exists("helpers/".strtolower($class). ".php")) {

		include "helpers/".strtolower($class) .".php";

	} elseif (file_exists("app/".strtolower($class).".php")) {

		include "app/".strtolower($class).".php";

	}  elseif (file_exists("helpers/dbabst/".strtolower($class).".php")) {

		include "helpers/dbabst/".strtolower($class).".php";

	} else {

		die("Could not Load Class: ". $class);
		
	} 
});
/*****************************************************************************************
 * spl_autoload_register() is a function ( where we can pass a 
 * function(which automatically loads the file containing class you are instantiating))
 */

function giveyay(){
	//echo "Yay!!!!!";
}


/* define some nasty things!*/
define('ROOT', dirname(__FILE__));  //This just defines the constant ROOT to contain the web root

echo $_SERVER['DOCUMENT_ROOT'];

/* including wierd configs */

include "helpers/config.php";  //includes config.php file from folder helpers. See config.php to know what it has!
/** The magic! **/
$route = new Route($_GET['url']); //It calls the constructer of the route class.

/* Note: We defined "class route" in helpers/route.php.. That spl_autoload_register() does all the work of loading that file */
/* Now it's time to see the route.php */
