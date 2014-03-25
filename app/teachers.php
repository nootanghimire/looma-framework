<?php
Class teachers extends baseapp {
	protected $teachersData;
	/* This is a default function. When only class name is passed. This function is automatically called*/
	public function __construct(){
		//init things
		$this->teachersData = $this->abstraction('teachers_info');
	}
	public function index(){
		/*$returnArray['file1']['template_file'] = "sample"; //It says the first file to return in sample.php
		//Note that the file is considered to be in /pages/ directory (see the response.php)
		$returnArray['file1']['data']['var1'] = "Contents of Var1"; //It says the variable $var1 can be used in file_1 (i.e., sample.php)
		$returnArray['file1']['data']['var2'] = "Contents of Var2"; //Similar for var2*/
		//return $returnArray; 
		return   $this->select_teacher();

	}

	public function select_teacher(){
		$ret['file1']['template_file'] = "select_teachers";
		$ret['file1']['data']['teachers_list'] = $this->teachersData->get_teachers_list();
		return $ret;
	}

	public function start_teaching($teacherID){
		//save the teachers id in an cookie
		setcookie('teachers',$teacherID,0,'/');
		//check if there is a saved session for the teacher	
		$ret['file1']['template_file'] = 'start_teaching';
		if($this->teachersData->hasSaved($teacherID)){
			$ret['file1']['data']['hasSession'] = true;
			$stateInfo = ($this->teachersData->getStateInformation($teacherID));
			if(!$stateInfo){
				throw new Exception("Ambigous State Information", 2);	
			}
			$saveType = $stateInfo[0]['savetype'];
			$saveTypeID = $stateInfo[0]['state'];
			$ret['file1']['data']['resumeID'] = $saveTypeID;
			$flag = 0;
			if($saveType=='content'){
				$ret['file1']['data']['url_map'] = 'view';
				$reqAbsData = $this->abstraction('contents_info');
				$contents = $reqAbsData->getContentInfo($saveTypeID);
				if(!$contents){
					throw new Exception("Ambigous Content Information", 2);	
				}
				$contents = $contents[0];
				$ret['file1']['data']['content'] = $contents;
				$ret['file1']['data']['hasContent']= true;
				$subID = $contents['SubjectID'];	
			} else {
				$subID = $saveTypeID;
				$ret['file1']['data']['hasContent']= false;
				$ret['file1']['data']['url_map'] = 'classes';
			}
			$reqAbsData = $this->abstraction('subjects_info');
			$subjects = $reqAbsData->getSubjectsInfo($subID);
			$subjects = $subjects[0];
			$ret['file1']['data']['subject'] = $subjects; //Will Always be Present
		} else {
			$ret['file1']['data']['hasSession'] = false;
		}
		return $ret;
	}
}
//Now lets see the sample.php file in pages folder.