<?php
class Users{

    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
	public $ID;
    public $FirstName;
    public $LastName;
    public $Email;
    public $Payment;
    public $class;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

	// create member
	function create(){

		// query to insert record
		$query = "INSERT INTO 
					" . $this->table_name . "
				SET 
					FirstName=:FirstName, LastName=:LastName, Email=:Email, Payment=:Payment, class=:class";

		// prepare query
		$stmt = $this->conn->prepare($query);

		// posted values
		$this->FirstName=htmlspecialchars(strip_tags($this->FirstName));
		$this->LastName=htmlspecialchars(strip_tags($this->LastName));
        $this->Email=htmlspecialchars(strip_tags($this->Email));


		// bind values
		$stmt->bindParam(":FirstName", $this->FirstName);
		$stmt->bindParam(":LastName", $this->LastName);
		$stmt->bindParam(":Email", $this->Email);
        $stmt->bindParam(":Payment", $this->Payment);
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

	// read products
	function readAll(){

		// select all query
		$query = "SELECT 
                ID, FirstName, LastName, Email, Payment, class 
            FROM 
                " . $this->table_name . "
            ORDER BY 
                ID DESC";

		// prepare query statement
		$stmt = $this->conn->prepare( $query );

		// execute query
		$stmt->execute();

		return $stmt;
	}

	// update the member
	function update(){

		// update query
		$query = "UPDATE 
					" . $this->table_name . "
				SET 
					FirstName=:FirstName, LastName=:LastName, Email=:Email, Payment=:Payment, class=:class
				WHERE
					ID = :ID";

		// prepare query statement
		$stmt = $this->conn->prepare($query);

		// posted values
		$this->FirstName=htmlspecialchars(strip_tags($this->FirstName));
		$this->LastName=htmlspecialchars(strip_tags($this->LastName));
        $this->Email=htmlspecialchars(strip_tags($this->Email));

		// bind new values
		$stmt->bindParam(":FirstName", $this->FirstName);
		$stmt->bindParam(":LastName", $this->LastName);
		$stmt->bindParam(":Email", $this->Email);
        $stmt->bindParam(":Payment", $this->Payment);
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
		$query = "DELETE FROM " . $this->table_name . " WHERE ID = ?";

		// prepare query
		$stmt = $this->conn->prepare($query);

		// bind id of record to delete
		$stmt->bindParam(1, $this->ID);

		// execute query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>
