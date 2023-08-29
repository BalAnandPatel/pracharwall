<?php 

 class payment{
    private $conn;
    private $table_name = "payment";
    private $table_name2 = "payment_details";
    public function __construct($db){
        $this->conn = $db;
    }

    public $pid,$user_id,$transaction_id,$amount,$status,$request_id ,$created_by,$created_on;
    public $tracking_id,$order_id,$bank_ref_no,$order_status,$failure_message,$payment_mode,$card_name,$status_code,$billing_tel,$billing_email,
    $vault,$offer_type,$offer_code,$eci_value,$retry,$response_code,$billing_notes,$trans_date;

       public function payment_entry(){

        $query="INSERT INTO
        " . $this->table_name . "
    SET
             user_id=:user_id,
             transaction_id=:transaction_id,
             amount=:amount, 
             request_id=:request_id,
             status=:status,
             created_on=:created_on,
             created_by=:created_by 
             ";

        $stmt = $this->conn->prepare($query);
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->transaction_id=htmlspecialchars(strip_tags($this->transaction_id));
        $this->amount=htmlspecialchars(strip_tags($this->amount));
        $this->request_id=htmlspecialchars(strip_tags($this->request_id));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->created_by=htmlspecialchars(strip_tags($this->created_by));
        $this->created_on=htmlspecialchars(strip_tags($this->created_on));


        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":transaction_id", $this->transaction_id);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":request_id", $this->request_id);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":created_by", $this->created_by);
        $stmt->bindParam(":created_on", $this->created_on);
       
         // execute query
         if($stmt->execute()){
            return true;
        }
      
        return false;
    }


    public function read_payment_details(){
        $query="Select order_id,tracking_id,bank_ref_no,order_status,payment_mode,billing_tel,failure_message,billing_email,vault,card_name,status_code,amount,trans_date
        from " .$this->table_name2 .  " where order_id=:order_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":order_id", $this->order_id);
        $stmt->execute();
        return $stmt;
    }

    public function confirm_payment(){
        
       $query = "Select order_id,tracking_id,bank_ref_no,order_status,payment_mode,billing_tel,failure_message,billing_email,vault,card_name,status_code,amount,trans_date  from " . $this->table_name2 ." where order_id=:order_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":order_id", $this->order_id);

        $stmt->execute();
        return $stmt;
    }
    
    
     public function update_payment_details(){

        $query="INSERT INTO
        " . $this->table_name2 . "
    SET
             order_id=:order_id,
             tracking_id=:tracking_id,
             bank_ref_no=:bank_ref_no, 
             order_status=:order_status,
             failure_message=:failure_message,
             payment_mode=:payment_mode,
             card_name=:card_name,
              status_code=:status_code,
             billing_tel=:billing_tel,
             billing_email=:billing_email,
             vault=:vault ,
              offer_type=:offer_type,
              offer_code=:offer_code,
             discount_value=:discount_value,
             amount=:amount,
             eci_value=:eci_value ,
             retry=:retry,
             response_code=:response_code,
             billing_notes=:billing_notes,
             trans_date=:trans_date
             ";

        $stmt = $this->conn->prepare($query);
        $this->order_id=htmlspecialchars(strip_tags($this->order_id));
        $this->tracking_id=htmlspecialchars(strip_tags($this->tracking_id));
        $this->bank_ref_no=htmlspecialchars(strip_tags($this->bank_ref_no));
        $this->order_status=htmlspecialchars(strip_tags($this->order_status));
        $this->failure_message=htmlspecialchars(strip_tags($this->failure_message));
        $this->payment_mode=htmlspecialchars(strip_tags($this->payment_mode));
        $this->card_name=htmlspecialchars(strip_tags($this->card_name));
        $this->status_code=htmlspecialchars(strip_tags($this->status_code));
        $this->billing_tel=htmlspecialchars(strip_tags($this->billing_tel));
        $this->billing_email=htmlspecialchars(strip_tags($this->billing_email));
        $this->vault=htmlspecialchars(strip_tags($this->vault));
        $this->offer_type=htmlspecialchars(strip_tags($this->offer_type));
        $this->offer_code=htmlspecialchars(strip_tags($this->offer_code));
        $this->discount_value=htmlspecialchars(strip_tags($this->discount_value));
        $this->amount=htmlspecialchars(strip_tags($this->amount));
        $this->eci_value=htmlspecialchars(strip_tags($this->eci_value));
        $this->retry=htmlspecialchars(strip_tags($this->retry));
        $this->response_code=htmlspecialchars(strip_tags($this->response_code));
        $this->billing_notes=htmlspecialchars(strip_tags($this->billing_notes));
        $this->trans_date=htmlspecialchars(strip_tags($this->trans_date));



        $stmt->bindParam(":order_id", $this->order_id);
        $stmt->bindParam(":tracking_id", $this->tracking_id);
        $stmt->bindParam(":bank_ref_no", $this->bank_ref_no);
        $stmt->bindParam(":order_status", $this->order_status);
        $stmt->bindParam(":failure_message", $this->failure_message);
        $stmt->bindParam(":payment_mode", $this->payment_mode);
        $stmt->bindParam(":card_name", $this->card_name);
        $stmt->bindParam(":status_code", $this->status_code);
        $stmt->bindParam(":billing_tel", $this->billing_tel);
        $stmt->bindParam(":billing_email", $this->billing_email);
        $stmt->bindParam(":vault", $this->vault);
        $stmt->bindParam(":offer_type", $this->offer_type);
        $stmt->bindParam(":offer_code", $this->offer_code);
        $stmt->bindParam(":discount_value", $this->discount_value);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":eci_value", $this->eci_value);
        $stmt->bindParam(":retry", $this->retry);
        $stmt->bindParam(":response_code", $this->response_code);
        $stmt->bindParam(":billing_notes", $this->billing_notes);
        $stmt->bindParam(":trans_date", $this->trans_date);
       
         // execute query
         if($stmt->execute()){
             echo $stmt->fullQuery;
            return true;
        }
      echo $stmt->fullQuery;
        return false;
    }
}

?>