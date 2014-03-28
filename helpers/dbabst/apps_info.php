<?php
	class apps_info{
		//TODO: The backend of the thing
		
		public function __construct(){
			$this->dbObj = new Database();
		}	

		public function getAppInfo($id){
			if(!is_numeric($id)){
				throw new Exception("Should be numeric");
			}
			$query = "SELECT * FROM apps WHERE appid=$id";
			return $this->dbObj->fetch_array($this->dbObj->query_exec($query))[0];
		}

		public function getAppsList(){
			$query = "SELECT * FROM apps;";
			return $this->dbObj->fetch_array($this->dbObj->query_exec($query));
		}
	}