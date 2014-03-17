<?php
class teachers_info{
	//Contains methods to get information from database

	protected $dbObj;

	public function __construct(){
		$this->dbObj = new Database();
	}	

	public function get_teachers_list(){
		$query = "SELECT * FROM teachers";
		return $this->dbObj->fetch_array($this->dbObj->query_exec($query));
	}

	public function hasSaved($teacherID){
		if(!is_numeric($teacherID)){
			throw new Exception("Teacher ID Should be a number!", 1);
			return false;
		}
		$query = "SELECT COUNT(*) FROM savedsessions WHERE TeacherID = $teacherID;";
		$result = $this->dbObj->query_exec($query);
		if(!$result){
			echo mysqli_error($this->dbObj->getConnection());
		}
		$row = mysqli_fetch_row($result);
		if($row[0]>=1){
			return true;
		} else {
			return false;
		}
	}

	public function getStateInformation($teacherID){
		if($this->hasSaved($teacherID)){
			$query = "SELECT SaveType AS savetype, StateID AS state FROM savedsessions WHERE TeacherID=$teacherID;";
			return $this->dbObj->fetch_array($this->dbObj->query_exec($query));
		}
		return false;
	}
}