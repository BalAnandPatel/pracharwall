<?php
class Ticket{

    private $conn;
    private $payment_history = "payment_history";
    private $user_login = "user_login";
    private $table_name = "ticket";
    private $ticket_purchase = "ticket_purchase";

    public $id, $userName, $userId, $ticketId, $ticketAmount, $status, $lotteryNum, $lotteryAmount, $createdOn, $createdBy, $updatedOn, $updatedBy;

    public function __construct($db){
        $this->conn = $db;
    }

    function insertTicket(){
  
        // query to insert record
    $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                         ticketAmount=:ticketAmount,
                         lotteryAmount=:lotteryAmount,
                         lotteryNum=:lotteryNum,
                         status=:status, 
                         createdOn=:createdOn,
                         createdBy=:createdBy
                    "; 
                          
        // prepare query
        $stmt = $this->conn->prepare($query);
        $this->ticketAmount=htmlspecialchars(strip_tags($this->ticketAmount));
        $this->lotteryAmount=htmlspecialchars(strip_tags($this->lotteryAmount));
        $this->lotteryNum=htmlspecialchars(strip_tags($this->lotteryNum));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->createdOn=htmlspecialchars(strip_tags($this->createdOn));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
        
        //bind values
        $stmt->bindParam(":ticketAmount", $this->ticketAmount);
        $stmt->bindParam(":lotteryAmount", $this->lotteryAmount);
        $stmt->bindParam(":lotteryNum", $this->lotteryNum);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":createdBy", $this->createdBy);
    
       
      
        // execute query
        if($stmt->execute()){
            return true;
        }
      
        return false;
          
    }


        function createTicketHistory(){
  
        // query to insert record
    $query = "INSERT INTO
                    " . $this->ticket_purchase . "
                SET
                         ticketId=:ticketId,
                         userId=:userId,
                         ticketAmount=:ticketAmount,
                         lotteryAmount=:lotteryAmount,
                         lotteryNum=:lotteryNum,
                         status=:status, 
                         createdOn=:createdOn,
                         createdBy=:createdBy
                    "; 
                          
        // prepare query
        $stmt = $this->conn->prepare($query);
        $this->userId=htmlspecialchars(strip_tags($this->userId));
        $this->ticketId=htmlspecialchars(strip_tags($this->ticketId));
        $this->ticketAmount=htmlspecialchars(strip_tags($this->ticketAmount));
        $this->lotteryAmount=htmlspecialchars(strip_tags($this->lotteryAmount));
        $this->lotteryNum=htmlspecialchars(strip_tags($this->lotteryNum));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->createdOn=htmlspecialchars(strip_tags($this->createdOn));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
        
        //bind values
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":ticketId", $this->ticketId);
        $stmt->bindParam(":ticketAmount", $this->ticketAmount);
        $stmt->bindParam(":lotteryAmount", $this->lotteryAmount);
        $stmt->bindParam(":lotteryNum", $this->lotteryNum);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":createdBy", $this->createdBy);
    
       
      
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

    function readTicketDetails(){
        $query="Select 
        id, ticketAmount, lotteryAmount, lotteryNum, status, createdOn, createdBy from " .$this->table_name." where status=1 or status=2";
        $stmt = $this->conn->prepare($query); 
        // $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }
    
    function readTicketDetailsByStatus(){
        if($this->userType==1){

            // $query="Select th.id, th.userId, th.ticketId, th.ticketAmount, th.lotteryAmount, th.lotteryNum, th.status, th.createdOn, th.createdBy from " .$this->ticket_purchase . " as th left join ".$this->table_name." as td on td.id=th.ticketId where td.status=:status";
            // $stmt = $this->conn->prepare($query); 
            // $stmt->bindParam(":status", $this->status);

            $query="Select th.id, th.userId, th.ticketId, th.ticketAmount, th.lotteryAmount, th.lotteryNum, th.status, th.createdOn, th.createdBy from " .$this->ticket_purchase . " as th left join ".$this->table_name." as td on td.id=th.ticketId where td.status=:status";
            $stmt = $this->conn->prepare($query); 
            $stmt->bindParam(":status", $this->status);

        }else{

            $query="Select id, userId, ticketId, ticketAmount, lotteryAmount, lotteryNum, status, createdOn, createdBy from " .$this->ticket_purchase . " where status=:status and userId=:userId";
            $stmt = $this->conn->prepare($query); 
            $stmt->bindParam(":status", $this->status);
            $stmt->bindParam(":userId", $this->userId);

        }

        $stmt->execute();
        return $stmt;
    }

    function releaseResultsList(){
        if($this->userType==1){


            // $query="Select id, userId, ticketId, ticketAmount, lotteryAmount, lotteryNum, status, createdOn, createdBy from " .$this->ticket_purchase . " where status=:status";
            // $stmt = $this->conn->prepare($query); 
            // $stmt->bindParam(":status", $this->status);

            $query="Select th.id, ph.status as paymentStatus, user.userName, th.userId, th.ticketId, th.ticketAmount, th.lotteryAmount, th.lotteryNum, th.status, th.createdOn, th.createdBy from " .$this->ticket_purchase . " as th left join ".$this->user_login." as user on user.id=th.userId left join ".$this->payment_history." as ph on th.ticketId=ph.ticketId where th.status=:status";
            $stmt = $this->conn->prepare($query); 
            $stmt->bindParam(":status", $this->status);

        }else{

        $query="Select th.id, ph.status as paymentStatus, user.userName, th.userId, th.ticketId, th.ticketAmount, th.lotteryAmount, th.lotteryNum, th.status, th.createdOn, th.createdBy from " .$this->ticket_purchase . " as th left join ".$this->user_login." as user on user.id=th.userId left join ".$this->payment_history." as ph on th.ticketId=ph.ticketId where th.status=:status and th.userId=:userId ";
            $stmt = $this->conn->prepare($query); 
            $stmt->bindParam(":status", $this->status);
            $stmt->bindParam(":userId", $this->userId);

        }

        $stmt->execute();
        return $stmt;
    }

    public function updateTicketPurchased(){
              // query to insert record
       $query = "UPDATE 
                    " . $this->table_name . "
                SET
                            status=:status,
                            updatedOn=:updatedOn,
                            updatedBy=:updatedBy
                            WHERE id=:id"; 
                          
        // prepare query
        $stmt = $this->conn->prepare($query);
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->updatedOn=htmlspecialchars(strip_tags($this->updatedOn));
        $this->updatedBy=htmlspecialchars(strip_tags($this->updatedBy));
        
        //bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":updatedOn", $this->updatedOn); 
        $stmt->bindParam(":updatedBy", $this->updatedBy);       
      
        // execute query
        if($stmt->execute()){
            return true;
        }
      
        return false; 
    }

  function deleteTicket(){
  
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