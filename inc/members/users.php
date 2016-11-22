<?php
class Users{
     
    // database connection and table name
    private $conn;
    private $table_name = "users";
     
    // object properties
	protected $User_ID; 
    protected $FirstName;
    protected $LastName;
    protected $Position;
    protected $status;
    protected $class;
     
    // constructor with $db as database connection
    protected function __construct($db){
        $this->conn = $db;
    }
	
	// create member
	function create(){
     
		// query to insert record
		$query = "INSERT INTO 
					" . $this->table_name . "
				SET 
					FirstName=:FirstName, LastName=:LastName, Position=:Position, status=:status, class=:class";
     
		// prepare query
		$stmt = $this->conn->prepare($query);
 
		// posted values
		$this->name=htmlspecialchars(strip_tags($this->FirstName));
		$this->price=htmlspecialchars(strip_tags($this->LastName));

 
		// bind values
		$stmt->bindParam(":FirstName", $this->FirstName);
		$stmt->bindParam(":LastName", $this->LastName);
		$stmt->bindParam(":Position", $this->Position);
		$stmt->bindParam(":status", $this->status);
		$stmt->bindParam(":class", $this->class);
     
		// execute query
		if($stmt->execute()){
			return true;
		}else{
			echo "<pre>";
				print_r($stmt->errorInfo());
			echo "</pre>";
 
			return false;
		}
	}
	
	// update the member
	function update(){
 
		// update query
		$query = "UPDATE 
					" . $this->table_name . "
				SET 
					FirstName=:FirstName, LastName=:LastName, Position=:Position, status=:status, class=:class
				WHERE
					User_ID = :User_ID";
 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
 
		// posted values
		$this->name=htmlspecialchars(strip_tags($this->FirstName));
		$this->price=htmlspecialchars(strip_tags($this->LastName));
 
		// bind new values
		$stmt->bindParam(":FirstName", $this->FirstName);
		$stmt->bindParam(":LastName", $this->LastName);
		$stmt->bindParam(":Position", $this->Position);
		$stmt->bindParam(":status", $this->status);
		$stmt->bindParam(":class", $this->class);
     
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	// delete the member
	function delete(){
 
		// delete query
		$query = "DELETE FROM " . $this->table_name . " WHERE User_ID = ?";
     
		// prepare query
		$stmt = $this->conn->prepare($query);
     
		// bind id of record to delete
		$stmt->bindParam(1, $this->User_ID);
 
		// execute query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>
