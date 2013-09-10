<?php 

//This is a databse function. In beta. Cannot make you understand it right now :) 
//By the way, don't open up random files, start from index.php and open the next file as mentiond in the comment
//That way, things will run nice ;) :)
Class Database {

	
	private $db_user, $db_pass, $db_name, $db_host, $connection;
	

	public function __construct($user=null, $pass=null, $db_name=null, $host=null) {
		global $database;
		$this->db_user = ($user == null ) ? $database['user'] : $user;
		$this->db_pass = ($pass == null ) ? $database['pass'] : $pass;
		$this->db_host = ($host == null ) ? $database['host'] : $host;

		$this->db_name = ($db_name == null) ? $database['name'] : $db_name;

		return $this->connectDB();
	}

	public function setUser($user = null, $pass = null ){
		//Explicitly Used to set database user
		if($user == null || $pass == null){
			throw new Exception('NULL passed in function setUser');
			return false;
		}
		$this->db_user = $user;
		$this->db_pass = $pass;
		return $this->connectDB();
	}

	public function setHost($host= null){
		if($host == null){
			throw new Exception("NULL passed in function setHost");
			return false;
		}
		$this->db_host = $host;
		return true;
	}

	private function connectDB(){
		if($this->connection) mysqli_close($this->connection);
		$this->connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		return $this->connection;
	}

	public function selectQuery($what, $table, $array_where=null){
		global $database;
		$query = "SELECT " . $what. " FROM ". $table;
		if(is_array($array_where)){
			$count = 0;
			$query .= " WHERE ";
			foreach ($array_where as $key => $value) {
				$query .= $key ."=?";
				$count++;
				if($count == $count) break;
				$query .= " AND ";
			} # Foreach
		} #End If
		echo $query;
		
	} #End Function

} #End Class