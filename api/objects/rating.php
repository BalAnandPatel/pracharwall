<?php 

 class Rating{

    private $conn;
    private $review_table = "review_table";

    public function __construct($db){
        $this->conn = $db;
    }

    public $review_id,$user_name,$business_owner,$user_id,$user_rating,$review_reply,$reply_by,$user_review,$created_on,$created_by;
    public $average_rating,$total_review,$five_star_review,$four_star_review,$three_star_review,$two_star_review,$one_star_review,$total_user_rating; 



    public function insert_rating(){

        $query="INSERT INTO
        " . $this->review_table . "
    SET
             user_name=:user_name,
             user_id=:user_id,
             business_owner=:business_owner,
             user_rating=:user_rating, 
             user_review=:user_review,
             created_on=:created_on
               ";

        $stmt = $this->conn->prepare($query);
        $this->user_name=htmlspecialchars(strip_tags($this->user_name));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->business_owner=htmlspecialchars(strip_tags($this->business_owner));
        $this->user_rating=htmlspecialchars(strip_tags($this->user_rating));
        $this->user_review=htmlspecialchars(strip_tags($this->user_review));
        $this->created_on=htmlspecialchars(strip_tags($this->created_on));

        $stmt->bindParam(":user_name", $this->user_name);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":business_owner", $this->business_owner);
        $stmt->bindParam(":user_rating", $this->user_rating);
        $stmt->bindParam(":user_review", $this->user_review);
        $stmt->bindParam(":created_on", $this->created_on);
       
         // execute query
         if($stmt->execute()){
            return true;
        }
      
        return false;
    }


 public function update_rating_reply(){

        $query="UPDATE
        " . $this->review_table . "
    SET
             review_reply=:review_reply,
             business_owner=:business_owner,
             reply_by=:reply_by,
             updated_on=:updated_on
             where business_owner=:business_owner and review_id=:review_id";

        $stmt = $this->conn->prepare($query);
        $this->review_reply=htmlspecialchars(strip_tags($this->review_reply));
        $this->business_owner=htmlspecialchars(strip_tags($this->business_owner));
        $this->review_id=htmlspecialchars(strip_tags($this->review_id));
        $this->reply_by=htmlspecialchars(strip_tags($this->reply_by));
        $this->updated_on=htmlspecialchars(strip_tags($this->updated_on));

        $stmt->bindParam(":review_reply", $this->review_reply);
        $stmt->bindParam(":business_owner", $this->business_owner);
        $stmt->bindParam(":review_id", $this->review_id);
        $stmt->bindParam(":reply_by", $this->reply_by);
        $stmt->bindParam(":updated_on", $this->updated_on);

         // execute query
         if($stmt->execute()){
            return true;
        }
      
        return false;
    }


function update_rating(){
  
        // query to insert record
       $query = "UPDATE 
                    " . $this->review_table . "
                SET
                   user_name=:user_name,
                   user_id=:user_id,
                   business_owner=:business_owner,
                   user_rating=:user_rating, 
                   user_review=:user_review,
                   created_on=:created_on
                   where business_owner=:business_owner and user_id=:user_id";
                          
        // prepare query
        $stmt = $this->conn->prepare($query);
        $this->user_name=htmlspecialchars(strip_tags($this->user_name));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->business_owner=htmlspecialchars(strip_tags($this->business_owner));
        $this->user_rating=htmlspecialchars(strip_tags($this->user_rating));
        $this->user_review=htmlspecialchars(strip_tags($this->user_review));
        $this->created_on=htmlspecialchars(strip_tags($this->created_on));
        
        
        //bind values
        $stmt->bindParam(":user_name", $this->user_name);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":business_owner", $this->business_owner);
        $stmt->bindParam(":user_rating", $this->user_rating);
        $stmt->bindParam(":user_review", $this->user_review);
        $stmt->bindParam(":created_on", $this->created_on);
        
      
        // execute query
        if($stmt->execute()){
            return true;
        }
      
        return false;
          
    }
 


  public function readRating(){
        $query="Select review_id,user_name,user_id,business_owner,user_rating,user_review,review_reply,reply_by,updated_on,created_on from " .$this->review_table ." where business_owner=:business_owner ORDER BY review_id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":business_owner", $this->business_owner); 
        $stmt->execute();
        return $stmt;

}

  public function readRatingBYUserId(){
        $query="Select review_id,user_name,user_id,business_owner,user_rating,user_review,created_on from " .$this->review_table ." where business_owner=:business_owner and user_id=:user_id ORDER BY review_id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":business_owner", $this->business_owner); 
        $stmt->bindParam(":user_id", $this->user_id); 
        $stmt->execute();
        return $stmt;

}

 }
?>