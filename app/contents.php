<?php
class contents extends baseapp{
	protected $subjects_data;

	public function __construct(){
		$this->subjects_data = $this->abstraction('subjects_info');
		$this->contents_data = $this->abstraction('contents_info');
	}
	public function new_class(){
		//What would you do for new class?
		//Show the file for selecting classes.
		
		$ret['file1']['template_file'] = "new_class";
		$ret['file1']['data']['classes'] = $this->subjects_data->getClassList();
		return $ret;
	}

	public function classes($subjectNumber){
		if(!is_numeric($subjectNumber)){
			throw new Exception("Subject Should be Number!", 6);
			
		}

		$ret['file1']['template_file'] = "contents_list";
		//$ret['file1']['data']['contents'] = 0; //Get all contents of this class here
		$hold = $this->subjects_data->getSubjectsInfo($subjectNumber);	
		$ret['file1']['data']['currentsubject'] = $hold[0];
		$ret['file1']['data']['subjects'] = ($this->subjects_data->getSubjectsForClass($ret['file1']['data']['currentsubject']['ClassNumber']));
		$ret['file1']['data']['contents'] = $this->contents_data->getContentsFromSubject($subjectNumber);
		$ret['file1']['data']['classes']  = $this->subjects_data->getClassList();
		return $ret;
	}

	public function in($classNumber){
		if(!is_numeric($classNumber)){
			throw new Exception("Class Should be Number!", 6);
		}
		$ret['file1']['template_file'] = "select_subject";
		$ret['file1']['data']['currentclass']=$classNumber;
		$ret['file1']['data']['classes']=$this->subjects_data->getClassList();
		$ret['file1']['data']['subjects'] = $this->subjects_data->getSubjectsForClass($classNumber);

		return $ret;
	}

	public function view($contentID){
		if(!is_numeric($contentID)){
			throw new Exception("ContentID Shoudl be a Number!");
		}
		$contentInfo = $this->contents_data->getContentInfo($contentID);
		$contentInfo = $contentInfo[0];
		$fileInfo = $this->contents_data->getFileInfo($contentInfo['ContentFileID']);
		//print_r($fileInfo);
		$fileInfo = $fileInfo[0];
		switch($fileInfo['FileType']) {
		case "pdf":
			$ret['file1']['template_file'] = "fragments/pdfviewer";
			break;
		default:
			$ret['file1']['template_file'] = "fragments/htmlviewer";
			break;
		}
		$ret['file1']['data']['file'] = "resources/".$fileInfo['FileName']; //path relative to DocRoot/Resources/
		//$ret['file2']['template_file'] = 'fragments/view_basic_controls';
		return $ret;
	}

	
}