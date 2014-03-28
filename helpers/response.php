<?php
/****
 * Response Class
 * See What happens in this class is:
 * Routes.php sends at least the (thing1)
 * which is a class  that must be defined in apps/thing1.php
 * Now this class calls the thing1 class with appropritae arguments, 
 * and then returns a good html.
 */
Class Response{

	private $classContainer; //A private variable to contain class

	/*********************************************************
	 * function init: It initializes things. See the function
	 */
	public function init($className, $methodName="index", $args=null){ 
		echo "Response Called: " . $className . " -- Method: ". $methodName . " -- Args: ";
		#var_dump($args);
		$this->classContainer = new $className(); //As i said earlier, $classname is thing1 and that is being instantiated 
		//call_user_func_array(array($obj, $method_name), $params);
		if($args!==null) {
			$this->view(call_user_func_array(array($this->classContainer, $methodName),$args)); 
		} else {
			$this->view($this->classContainer->$methodName($args));
		}


		// ^ Calling specific methods of specific class (which were sent by routes.php)
		// and passing the returned value to 'view' method 
	}	

	//The view method. It recieves the array

	public function view($array_data){
		//parse array and load specific file
		/*******************************************************************************
		 *
		 * The format of array will be: "file1":{
		 *										 "template_file" : "relative_to_folder_pages_path_to_file",
		 *			                              "data": {"var1":"value1", "var2":"value2"}
		 *										},
		 *								"file2":{
		 *										"template_file" : "relative_to_folder_pages_path_to_file",
		 *			                              "data": {"var1":"value1", "var2":"value2"}
		 *										}		
		 *
		 ********************************************************************************/
		//First load header and footer
		include ROOT . DIRECTORY_SEPARATOR ."template".DIRECTORY_SEPARATOR ."header.php"; //loading header file 

		//This blocks iterates through the array, and includes necessary files
		//Those necessary files could use the variable names var1 , var2 (as in the above example) in them
		foreach ($array_data as $file_data){
			
				extract($file_data['data']); // This trick makes the var1, var2 thing available to files
				include ROOT . DIRECTORY_SEPARATOR ."pages".DIRECTORY_SEPARATOR .$file_data["template_file"].".php"; 
			
		}

		include ROOT . DIRECTORY_SEPARATOR ."template".DIRECTORY_SEPARATOR ."footer.php"; //loading footer file

	}
}
//End This thing. Now take a look and app/sample.php IF ye looked at config.php the defualt route was sample. Let's see how shoud we write that.