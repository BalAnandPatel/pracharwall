<?php 

 class exam{
    private $conn;
    private $table_name = "exam";
    private $table_registration = "registration";
    private $table_payment = "payment_details";
    public function __construct($db){
        $this->conn = $db;
    }

    public $id,$full_name,$registration_no,$dob,$mobile,$exam_name,$type,$age,$total_post,$amount,$general_fee,$obc_fee,$sc_fee,$st_fee,$ews_fee,$eligibility,$status,$exam_date_start,$exam_date_end,$result_date,$admit_card_date,$created_by,$created_on,$updated_on,$updated_by;
   public $tracking_id,$order_id,$bank_ref_no,$order_status,$failure_message,$payment_mode,$card_name,$status_code,$billing_tel,$billing_email,
    $vault,$offer_type,$offer_code,$eci_value,$retry,$response_code,$billing_notes,$trans_date;
    
    public function read_only_examname(){
        $query="Select exam_name from " .$this->table_name .  " where exam_name=:exam_name";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":exam_name", $this->exam_name); 
        $stmt->execute();
        return $stmt;
    }

    public function read_exam(){
        $query="Select  id,exam_name,type,age, amount,status,exam_date_start, result_date,admit_card_date,created_by,created_on
        from " .$this->table_name .  " where status=1";
        $stmt = $this->conn->prepare($query); 
        $stmt->execute();
        return $stmt;
    }

    public function read_exam_details(){
        $query="Select  id, exam_name, type, age, total_post, eligibility, general_fee,obc_fee,sc_fee,st_fee,ews_fee, status, exam_date_start, exam_date_end, result_date, admit_card_date, created_by, created_on
        from " .$this->table_name . " where exam_name=:exam_name";
        $stmt = $this->conn->prepare($query); 
        $stmt->bindParam(":exam_name", $this->exam_name);
        // $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

     public function read_payment_varify_details(){
      $query="Select  reg.id,reg.full_name,reg.category,reg.registration_no,dob,mobile,reg.email,reg.exam_name,general_fee,obc_fee,sc_fee,st_fee,ews_fee,reg.address1,reg.address2,reg.address3,reg.pincode,reg.nationality,reg.state,reg.status,
        reg.created_on, reg.created_by from " .$this->table_registration . " as reg left join "
         . $this->table_name . " as exam on reg.exam_name=exam.exam_name where reg.registration_no=:registration_no and reg.mobile=:mobile";
        $stmt = $this->conn->prepare($query); 
        $stmt->bindParam(":registration_no", $this->registration_no);
        $stmt->bindParam(":mobile", $this->mobile);
        $stmt->execute();
        return $stmt;
    }

    //  public function read_payment_varify_details(){
    //     $query="Select  reg.id,reg.full_name,dob,mobile,reg.exam_name,reg.status,
    //     reg.created_on, reg.created_by from " .$this->table_registration ." as reg
    //     where reg.registration_no=:registration_no and reg.mobile=:mobile and reg.dob=:dob";
    //     $stmt = $this->conn->prepare($query); 
    //     $stmt->bindParam(":registration_no", $this->registration_no);
    //     $stmt->bindParam(":mobile", $this->mobile);
    //     $stmt->bindParam(":dob", $this->dob);
    //     $stmt->execute();
    //     return $stmt;
    // }

    public function read_print_varify_details(){
       $query="Select  pay.order_id, reg.id as user_id, reg.full_name,reg.registration_no,dob,mobile,reg.exam_name,tracking_id,amount, pay.order_status,pay.trans_date from " .$this->table_registration . " as reg left join "
         . $this->table_payment . " as pay on reg.payment_id=pay.order_id 
         where reg.registration_no=:registration_no and reg.mobile=:mobile and reg.payment_status='Success'";
        $stmt = $this->conn->prepare($query); 
        $stmt->bindParam(":registration_no", $this->registration_no);
        $stmt->bindParam(":mobile", $this->mobile);
        $stmt->execute();
        return $stmt;
    }

        public function get_reg_number(){
        $query="Select  id,full_name,exam_name,mobile,registration_no,status
          from " .$this->table_registration .  " where full_name=:full_name and mobile=:mobile";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":full_name", $this->full_name);
        $stmt->bindParam(":mobile", $this->mobile); 
        $stmt->execute();
        return $stmt;
    }

    public function read_exam_list(){
        $query="Select id,exam_name,type,age,total_post,eligibility,general_fee,obc_fee,sc_fee,st_fee,ews_fee,status,exam_date_start,exam_date_end,result_date,admit_card_date,created_by,created_on
        from " .$this->table_name;
        $stmt = $this->conn->prepare($query); 
        $stmt->execute();
        return $stmt;
    }

    public function insert_exam(){

        $query="INSERT INTO
        " . $this->table_name . "
    SET
             exam_name=:exam_name,
             type=:type,
             general_fee=:general_fee, 
             obc_fee=:obc_fee, 
             sc_fee=:sc_fee, 
             st_fee=:st_fee, 
             ews_fee=:ews_fee, 
             eligibility=:eligibility,
             age=:age,
             total_post=:total_post,
             exam_date_start=:exam_date_start,
             exam_date_end=:exam_date_end,
             status=:status,
             result_date=:result_date,
             admit_card_date=:admit_card_date,
             created_on=:created_on,
             created_by=:created_by
               ";

        $stmt = $this->conn->prepare($query);
        $this->exam_name=htmlspecialchars(strip_tags($this->exam_name));
        $this->type=htmlspecialchars(strip_tags($this->type));
        $this->general_fee=htmlspecialchars(strip_tags($this->general_fee));
        $this->obc_fee=htmlspecialchars(strip_tags($this->obc_fee));
        $this->sc_fee=htmlspecialchars(strip_tags($this->sc_fee));
        $this->st_fee=htmlspecialchars(strip_tags($this->st_fee));
        $this->ews_fee=htmlspecialchars(strip_tags($this->ews_fee));
        $this->age=htmlspecialchars(strip_tags($this->age));
        $this->total_post=htmlspecialchars(strip_tags($this->total_post));
        $this->eligibility=htmlspecialchars(strip_tags($this->eligibility));
        $this->exam_date_end=htmlspecialchars(strip_tags($this->exam_date_end));
        $this->exam_date_start=htmlspecialchars(strip_tags($this->exam_date_start));
        $this->admit_card_date=htmlspecialchars(strip_tags($this->admit_card_date));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->result_date=htmlspecialchars(strip_tags($this->result_date));
        $this->created_by=htmlspecialchars(strip_tags($this->created_by));
        $this->created_on=htmlspecialchars(strip_tags($this->created_on));


        $stmt->bindParam(":exam_name", $this->exam_name);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":general_fee", $this->general_fee);
        $stmt->bindParam(":obc_fee", $this->obc_fee);
        $stmt->bindParam(":sc_fee", $this->sc_fee);
        $stmt->bindParam(":st_fee", $this->st_fee);
        $stmt->bindParam(":ews_fee", $this->ews_fee);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":total_post", $this->total_post);
        $stmt->bindParam(":eligibility", $this->eligibility);
        $stmt->bindParam(":exam_date_end", $this->exam_date_end);
        $stmt->bindParam(":exam_date_start", $this->exam_date_start);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":admit_card_date", $this->admit_card_date);
        $stmt->bindParam(":result_date", $this->result_date);
        $stmt->bindParam(":created_by", $this->created_by);
        $stmt->bindParam(":created_on", $this->created_on);
       
         // execute query
         if($stmt->execute()){
            return true;
        }
      
        return false;
    }



    function update_exam(){
  
        // query to insert record
       $query = "UPDATE 
                    " . $this->table_name . "
                SET
                   exam_name=:exam_name,
                   type=:type,
                   general_fee=:general_fee, 
                   obc_fee=:obc_fee, 
                   sc_fee=:sc_fee, 
                   st_fee=:st_fee, 
                   ews_fee=:ews_fee, 
                   eligibility=:eligibility,
                   age=:age,
                   total_post=:total_post,
                   exam_date_start=:exam_date_start,
                   exam_date_end=:exam_date_end,
                   result_date=:result_date,
                   admit_card_date=:admit_card_date,
                   status=:status,
                   updated_on=:updated_on,
                   updated_by=:updated_by 
                   where id=:id";
                          
        // prepare query
        $stmt = $this->conn->prepare($query);
        $this->exam_name=htmlspecialchars(strip_tags($this->exam_name));
        $this->type=htmlspecialchars(strip_tags($this->type));
        $this->general_fee=htmlspecialchars(strip_tags($this->general_fee));
        $this->obc_fee=htmlspecialchars(strip_tags($this->obc_fee));
        $this->sc_fee=htmlspecialchars(strip_tags($this->sc_fee));
        $this->st_fee=htmlspecialchars(strip_tags($this->st_fee));
        $this->ews_fee=htmlspecialchars(strip_tags($this->ews_fee));
        $this->age=htmlspecialchars(strip_tags($this->age));
        $this->total_post=htmlspecialchars(strip_tags($this->total_post));
        $this->eligibility=htmlspecialchars(strip_tags($this->eligibility));
        $this->exam_date_end=htmlspecialchars(strip_tags($this->exam_date_end));
        $this->exam_date_start=htmlspecialchars(strip_tags($this->exam_date_start));
        $this->admit_card_date=htmlspecialchars(strip_tags($this->admit_card_date));
        $this->result_date=htmlspecialchars(strip_tags($this->result_date));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->updated_on=htmlspecialchars(strip_tags($this->updated_on));
        $this->updated_by=htmlspecialchars(strip_tags($this->updated_by));
        
        
        //bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":exam_name", $this->exam_name);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":general_fee", $this->general_fee);
        $stmt->bindParam(":obc_fee", $this->obc_fee);
        $stmt->bindParam(":sc_fee", $this->sc_fee);
        $stmt->bindParam(":st_fee", $this->st_fee);
        $stmt->bindParam(":ews_fee", $this->ews_fee);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":total_post", $this->total_post);
        $stmt->bindParam(":eligibility", $this->eligibility);
        $stmt->bindParam(":exam_date_end", $this->exam_date_end);
        $stmt->bindParam(":exam_date_start", $this->exam_date_start);
        $stmt->bindParam(":admit_card_date", $this->admit_card_date);
        $stmt->bindParam(":result_date", $this->result_date);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":updated_on", $this->updated_on);
        $stmt->bindParam(":updated_by", $this->updated_by);
        
      
        // execute query
        if($stmt->execute()){
            return true;
        }
      
        return false;
          
    }


   function delete_exam(){
  
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