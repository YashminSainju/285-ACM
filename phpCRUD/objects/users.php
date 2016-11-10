<?php
class Users{
     
    // database connection and table name
    private $conn;
    private $table_name = "users";
     
    // object properties
    public $FirstName;
    public $LastName;
    public $User_ID;
    public $id_token;
    public $Position;
    public $status;
    public $class;
     
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}