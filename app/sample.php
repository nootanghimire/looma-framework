<?php

Class sample {
	
	/* This is a default function. When only class name is passed. This function is automatically called*/
	public function constructor(){
		$returnArray['file1']['template_file'] = "sample"; //It says the first file to return in sample.php
		//Note that the file is considered to be in /pages/ directory (see the response.php)
		$returnArray['file1']['data']['var1'] = "Contents of Var1" //It says the variable $var1 can be used in file_1 (i.e., sample.php)
		$returnArray['file1']['data']['var2'] = "Contents of Var2" //Similar for var2
		return $returnArray; 
	}
}
//Now lets see the sample.php file in pages folder.