<?php
class Admin{

    private $conn;
    private $table_name = "adminlogin";
    public $id,$fullName,$userName,$password,$createdOn,$createdBy;
    public function __construct($db){
        $this->conn = $db;
    }

    function adm_login(){
        $query="Select 
        id, password, userName, fullName, createdOn, updatedOn  from " .$this->table_name .  " where userName=:userName and password=:password";
        $stmt = $this->conn->prepare($query); 
        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":password", $this->password);

        $stmt->execute();
        return $stmt;
    }
}
    ?>