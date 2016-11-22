<?php
class Users{
     
    // database connection and table name
    private $conn;
    private $table_name = "users";
     
    // object properties
    public $FirstName;
    public $LastName;
    public $Position;
    public $status;
    public $class;
     
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// delete the product
	function delete(){
 
		// delete query
		$query = "DELETE FROM " . $this->table_name . " WHERE FirstName = ?";
     
		// prepare query
		$stmt = $this->conn->prepare($query);
     
		// bind id of record to delete
		$stmt->bindParam(1, $this->FirstName);
 
		// execute query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>