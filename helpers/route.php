<?php 

/* Just a little class which does the work of a router
 * No, Not a Wifi Router. It's a different thing ;) :p
 */
Class Route {

	public $current_url;  //The public variable which is meant to hold current_url
	private $response;    //The private variable which is meant to hold response object


	/* The constrcutor function
	 * When you are doing Route('This'), 
	 * php actually does Route->__construct('This');
	 */
	public function __construct($url_to_route) {

		$this->current_url = $url_to_route; //just a simple assigning 
		$this->response = new Response();   //instantiate a Response Class
		/** Remember spl_autoload_register()? This does the trick again **/

		$this->route(); //Calling a route() method which is in this class.
	}

	/* The private function route()
	 * This is private function. so you cannot call it from outside the class
	 * It's basic work is to analyse the request (the url) and send it to places
	 *
	 * The basic idea is: Suppose user entered www.mysite.com/thing1/thing2/thing3 
	 * We are loading specific things that depend upon thing1, thing2 and thing3
	 */
	private function route(){

		global $route;
		//global declaration. $route is a variable declared in config.php
		//Even though we included config.php in this file (index.php) that var is not available for us to use yet
		//Writing this simple expression let us do so.

		$url = $this->current_url; //A Simple Assign

		if(trim($url) == ''){            //if url is empty (if nothing is requested.) (or if client just visited site.)
			//stick to the default route
			$url = $route['default'];    //looks in the config file and ask for default place to route. :)
		}

		//The following block now manipulates the request (the url) and works accordingly

		$arrayedUrl = explode("/", $url);  //http://php.net/manual/en/function.explode.php > Converts a string to array

		$class = $arrayedUrl[0]; //The first thing (thing1) in the request will be name of class

		if(count($arrayedUrl)>=3){ //if there are thing(n)

			$method = $arrayedUrl[1]; //The second one (thing2) is the method of thing1 class

			unset($arrayedUrl[0]); unset($arrayedUrl[1]); //We delete out thing1 and thing2 

			$args = array_merge($arrayedUrl, array()); //And this trick will re_number the array

			$this->response->init($class, $method, $args); //We pass this to init method of response class (we instantiated in __construct)

		} elseif(count($arrayedUrl)>1) { //if there is only thing1 and thing2, do not pass $args to init method
			$method = $arrayedUrl[1];
			$this->response->init($class, $method);

		} else {					  //if there is only thing1, do not pass $method and $args to init method
			$this->response->init($class);
		}

	} #End Function 

} #End Class
/** Now the control has been shifted to response class. It gives the response back by manipulating requests! See response.php  **/