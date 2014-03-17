<?php
class contents_info {	
	protected $dbObj;

	public function __construct(){
		$this->dbObj = new Database();
	}	

	public function getContentInfo($contID){
		if(!is_numeric($contID)){
			throw new Exception("ContentID Should be a Number", 3);
			return false;	
		}
		$query = "SELECT * FROM contents WHERE ContentID=$contID;";
		return $this->dbObj->fetch_array($this->dbObj->query_exec($query));
	}

	public function getContentsFromSubject($subjID){
		if(!is_numeric($subjID)){
			throw new Exception("SubjectId Should be a Number", 3);
			return false;		
		}
		$query = "SELECT * FROM contents WHERE SubjectID=$subjID;";
		return $this->dbObj->fetch_array($this->dbObj->query_exec($query));
	}

	public function getFileInfo($contentFileId){
		if(!is_numeric($contentFileId)){
			throw new Exception("Not numeric");
			return false;		
		}

		$query = "SELECT * FROM contentfiles WHERE ContentFileID=$contentFileId;";
		//$this->dbObj->query_exec($query);
		//echo mysqli_error($this->dbObj->getConnection());
		return $this->dbObj->fetch_array($this->dbObj->query_exec($query));
	}

}