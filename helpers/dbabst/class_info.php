<?php
class class_info{
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

}