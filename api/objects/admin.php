<?php
class Admin{

    private $conn;
    private $business_category = "business_category";
    private $user_registration = "user_registration";

    public $id, $businessCategory, $subCategory, $status, $createdOn, $createdBy, $updatedOn, $updatedBy;
    public $userType;

    public function __construct($db){
        $this->conn = $db;
    }

    // created business category by admin

    function insertBusinessCategory(){
  
        // query to insert record
    $query = "INSERT INTO
                    " . $this->business_category . "
                SET
                         businessCategory=:businessCategory,
                         subCategory=:subCategory,
                         status=:status, 
                         createdOn=:createdOn,
                         createdBy=:createdBy
                    "; 
                          
        // prepare query
        $stmt = $this->conn->prepare($query);
        $this->businessCategory=htmlspecialchars(strip_tags($this->businessCategory));
        $this->subCategory=htmlspecialchars(strip_tags($this->subCategory));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->createdOn=htmlspecialchars(strip_tags($this->createdOn));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
        
        //bind values
        $stmt->bindParam(":businessCategory", $this->businessCategory);
        $stmt->bindParam(":subCategory", $this->subCategory);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":createdBy", $this->createdBy);
    
       
      
        // execute query
        if($stmt->execute()){
            return true;
        }
      
        return false;
          
    }



    function readCategoryMaxId(){
        $query="Select max(id) as id from " . $this->business_category ."";
        $stmt = $this->conn->prepare($query); 
        $stmt->execute();
        return $stmt;
    }

    function readBusinessCategory(){
      $query="Select 
        id, businessCategory, subCategory, status, createdOn, createdBy from " .$this->business_category;
        $stmt = $this->conn->prepare($query); 
        // $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

  function deleteCategory(){
  
    // delete query
    $query = " DELETE FROM " . $this->business_category . " 
    WHERE id= ? ";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}
  
// counting details for admin dashboard 
 
// Users Count

function usersCount(){
     
    // select all query
	   $query = "SELECT COUNT(id) as users_count FROM " . $this->user_registration . " where userType=:userType and status=:status";
    
    $stmt = $this->conn->prepare($query);
  
   $stmt->bindParam(":userType", $this->userType);
   $stmt->bindParam(":status", $this->status);
    // execute query
    $stmt->execute();
  
    return $stmt;
}

function categoryCount(){
     
    // select all query
    $query = "SELECT COUNT(id) as category_count FROM " . $this->business_category;
    
    $stmt = $this->conn->prepare($query); 
    // $stmt->bindParam(":status", $this->status);
    // execute query
    $stmt->execute();
  
    return $stmt;
}


}
?>