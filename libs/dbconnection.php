<?php
//DB Configuration for blinx server
$database = "blinx";
$host = "localhost";
$user = "root";
$pass = "blinx";
class DB {
	
	protected $db_name = "blinx";
	protected $db_user = "root";
	protected $db_pass = "blinx";
	protected $db_host = "localhost";
	
	// Open a connect to the database.
	// Make sure this is called on every page that needs to use the database.
	
	public function connect() {
	
		$mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		if ($mysqli->connect_error) 
		{
			die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
		}
		else
		{
			return $mysqli;
		}
		return 'NO';
	}
	private function close($connection)
	{
		if(!mysqli_close($connection)){
			return "Connection close failed.";
		}
	}
	public function runSelectQuery($query) {
		$conn= $this -> connect();
		if($conn!='')
		{
			$result = $conn -> query($query);
			if (!$result) 
			{       $conn->close();
				return "Could not successfully run query ($query) from DB: " . mysql_error();
				exit;
			}
			else
			{
				$data = array();
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
				{
					array_push($data, $row);
				}
				printf ("%s (%s)\n", $row[0], $row[1]);
				$result->free();
				$conn->close();
				return $data;
			}
			return '';
		}
		return '';
	}
	public function runQuery($query) {
		$conn= $this -> connect();
		if($conn!='')
		{
			$result = $conn -> query($query);
			if (!$result) 
			{
                                $conn->close();
				return "Could not successfully run query ($query) from DB: " . mysql_error();
				exit;
			}
			else
			{
                            if($conn->affected_rows>=1)
                            {
                                $count=$conn->affected_rows;
                                $conn->close();
                                return $count;
                            }
			}
			return 0;
		}
		return 0;
	}
        public function runMultipleQuery($query1,$query2) {
		$conn= $this -> connect();
                //$conn->begin_transaction(MYSQLI_TRANS_START_READ_ONLY);
		if($conn!='')
		{
			$result1 = $conn ->query($query1);
                        $result2 = $conn -> query($query2);
			if (!$result1 ||!$result2 ) 
			{       
                                //$conn->rollback();
                                $conn->close();
				return 'Connect Error (' . $conn->connect_errno . ') '. $conn->connect_error.'';
			}
			else
			{
                            if($result1 && $result2)
                            {
                                //$conn->commit();
                                $conn->close();
                                return true;
                            }
                            else
                                return false;
			}
			return false;
		}
		return false;
	}
}
?>



