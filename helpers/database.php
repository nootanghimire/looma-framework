<?php 


Class Database {

	
	private $db_user, $db_pass, $db_name, $db_host, $connection;
	private $db_config; 
	

	public function __construct($user=null, $pass=null, $db_name=null, $host=null) {
		global $database;
		$this->db_config = $database; 
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
		$query = "SELECT " . $what. " FROM ". $table;
		$values = array();
		if(is_array($array_where)){
			$count = 0;
			$query .= " WHERE ";
			foreach ($array_where as $key => $value) {
				$query .= $key ."=?";
				$values[] = $value;
				$count++;
				if($count == count($array_where)) break;
				$query .= " AND ";
			} # Foreach
		} #End If 
		else 
		{
		#echo $query;
		return $query;
		}
		return array("query"=>$query, "values"=>$values);
		
	} #End Function
	public function insertQuery($array_what, $table, $array_where=null){
		$query = "INSERT INTO $table ";
		if(is_array($array_what)){
			$count = 0; $insertField = $valueField = "";
			foreach ($array_what as $key => $value) {
				$insertField .= $key;
				$valueField .= $value;
				$count++;
				if($count == count($array_what)) break;
				$insertField .= " , ";
				$valueField .= " , ";
			} #End Foreach
			$query .= "( $insertField ) VALUES ( $valueField );";
			#echo $query;
			return $query;
		} #End If
	} #End Function

	public function query_exec($query){
		return mysqli_query($this->connection, $query);
	}
	
	public function prepared_exec_and_fetch($query, $bind_param, $value_array){
		if(is_array($value_array) {
			array_unshift($value_array, $bind_param);
		} else {
			return false;
		}

		if($stmt = mysqli_prepare($this->connection, $query)){
			array_unshift($value_array, $stmt);
			call_user_func_array('mysqli_stmt_bind_param', $value_array);
			mysqli_stmt_execute($stmt);

			/* bind result variables */
			mysqli_stmt_bind_result($stmt, $district);

			/* fetch value */
			$result = mysqli_stmt_get_result($stmt);

			$array = $this->fetch_array($result);

			/* close statement */
			mysqli_stmt_close($stmt);
			return $array;
		}
		return false;
		
	}

	public function fetch_array($result){
			$ret = array();
		while($row = mysqli_fetch_assoc($result)){
			$ret[] = $row;
		}
		return $ret;
	}
} #End Class
