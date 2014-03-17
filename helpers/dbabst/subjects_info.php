<?php
class subjects_info {	
	protected $dbObj;

	public function __construct(){
		$this->dbObj = new Database();
	}	

	public function getSubjectsInfo($contID){
		if(!is_numeric($contID)){
			throw new Exception("ContentID Should be a Number", 3);
			return false;	
		}
		$query = "SELECT * FROM subjects WHERE SubjectID=$contID;";
		return $this->dbObj->fetch_array($this->dbObj->query_exec($query));
	}


	public function getClassList(){
		$query = "SELECT DISTINCT ClassNumber FROM subjects;";
		return $this->dbObj->fetch_array($this->dbObj->query_exec($query));	

	}

	public function getSubjectsForClass($classID){
		if(!is_numeric($classID)){
			throw new Exception("ClassID Should be a Number", 3);
			return false;	
		}

		$query = "SELECT * FROM subjects WHERE ClassNumber=$classID;";
		return $this->dbObj->fetch_array($this->dbObj->query_exec($query));
	}

}