<?php
class Login{

    private $conn;
    private $table_name = "user_login";
    public $id,$userType,$userRole,$userName,$userEmail,$userPass,$status,$createdOn,$createdBy;
    public function __construct($db){
        $this->conn = $db;
    }

    function userLoginVerify(){
        $query="Select 
        id, userType, userRole, userName, userEmail, userPass, createdOn  from " .$this->table_name .  " where userEmail=:userEmail and userPass=:userPass";
        $stmt = $this->conn->prepare($query); 
        $stmt->bindParam(":userEmail", $this->userEmail);
        $stmt->bindParam(":userPass", $this->userPass);

        $stmt->execute();
        return $stmt;
    }
    
    function changeUserPass(){
  
        // query to insert record
        $query = "UPDATE 
                    " . $this->table_name . "
                SET
                   userPass=:userPass
                   where id=:id and userType=:userType and status=1";
                          
        // prepare query
        $stmt = $this->conn->prepare($query);
        $this->userPass=htmlspecialchars(strip_tags($this->userPass));
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->userType=htmlspecialchars(strip_tags($this->userType));
         
        //bind values
        $stmt->bindParam(":userPass", $this->userPass);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":userType", $this->userType);   
      
        // execute query
        if($stmt->execute()){
            return true;
        }
      
        return false;
          
    }

}
    ?>