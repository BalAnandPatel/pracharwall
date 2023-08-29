<?php
class Notice{

    private $conn;
    private $table_name = "notification";

    public $id, $n_title, $created_on, $created_by;

    public function __construct($db){
        $this->conn = $db;
    }

    function insert_notification(){
  
        // query to insert record
    $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                         n_title=:n_title,
                         created_by=:created_by, 
                         created_on=:created_on
                    "; 
                          
        // prepare query
        $stmt = $this->conn->prepare($query);
        $this->n_title=htmlspecialchars(strip_tags($this->n_title));
        // $this->n_description=htmlspecialchars(strip_tags($this->n_description));
        $this->created_by=htmlspecialchars(strip_tags($this->created_by));
        $this->created_on=htmlspecialchars(strip_tags($this->created_on));
        
        //bind values
        $stmt->bindParam(":n_title", $this->n_title);
        // $stmt->bindParam(":n_description", $this->n_description);
        $stmt->bindParam(":created_by", $this->created_by);
        $stmt->bindParam(":created_on", $this->created_on);
    
       
      
        // execute query
        if($stmt->execute()){
            return true;
        }
      
        return false;
          
    }
    function read_notice_maxId(){
        $query="Select max(id) as id from " . $this->table_name ."";
        $stmt = $this->conn->prepare($query); 
        $stmt->execute();
        return $stmt;
    }

    function read_notification(){
        $query="Select 
        id, n_title, created_by, created_on
        
        from " .$this->table_name;
        $stmt = $this->conn->prepare($query); 
        // $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

  function delete_notification(){
  
    // delete query
    $query = " DELETE FROM " . $this->table_name . " 
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
  
}
?>