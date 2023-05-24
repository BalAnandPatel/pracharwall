<?php 

 class User{

    private $conn;
    private $user_registration = "user_registration";
    private $user_type = "user_type";
    // private $table_payment = "payment";

    public function __construct($db){
        $this->conn = $db;
    }

    public $id, $userId, $userType, $userName, $userEmail, $userPass, $userMobile, $status, $createdOn, $createdBy, $updatedOn, $updatedBy;
    
    // public function readMaxUserId(){
    //     $query="Select max(id) as userId from " .$this->table_name;
    //     $stmt = $this->conn->prepare($query);
    //     // $stmt->bindParam(":userName", $this->userName); 
    //     $stmt->execute();
    //     return $stmt;
    // }

    public function readUserProfile(){
     $query="Select user.id, userType, userRole, userName, userMobile, userEmail, user.status, user.createdOn, user.createdBy, accountHolder, bankName, branchName, ifscCode, accountNum, googlePayNum, phonePayNum
        from " .$this->table_name. " as user LEFT JOIN " .$this->user_account ." as ua ON user.id=ua.userId where user.status=1 and user.userType=:userType and user.id=:id";
        $stmt = $this->conn->prepare($query); 
        $stmt->bindParam(":userType", $this->userType);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

    public function readAllUsersDetail(){

      $query="Select user.id, user.userType, userRole, userName, userMobile, userEmail, user.status, user.createdOn, user.createdBy from " .$this->user_registration. " as user LEFT JOIN " .$this->user_type ." as ut ON user.userType=ut.userType where user.status=:status";

        $stmt = $this->conn->prepare($query); 
        $stmt->bindParam(":status", $this->status);
        $stmt->execute();
        return $stmt;
    }

 

    public function insertUser(){

           $query="INSERT INTO
        " . $this->user_registration . "
    SET      userType=:userType,
             userName=:userName,
             userEmail=:userEmail,
             userMobile=:userMobile, 
             userPass=:userPass,
             status=:status,
             createdOn=:createdOn,
             createdBy=:createdBy
               ";

        $stmt = $this->conn->prepare($query);
        $this->userType=htmlspecialchars(strip_tags($this->userType));
        $this->userName=htmlspecialchars(strip_tags($this->userName));
        $this->userMobile=htmlspecialchars(strip_tags($this->userMobile));
        $this->userEmail=htmlspecialchars(strip_tags($this->userEmail));
        $this->userPass=htmlspecialchars(strip_tags($this->userPass));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
        $this->createdOn=htmlspecialchars(strip_tags($this->createdOn));

        $stmt->bindParam(":userType", $this->userType);
        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":userMobile", $this->userMobile);
        $stmt->bindParam(":userEmail", $this->userEmail);
        $stmt->bindParam(":userPass", $this->userPass);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":createdBy", $this->createdBy);
       
         // execute query
         if($stmt->execute()){
            return true;
        }
      
        return false;
    }

     public function insertUserAccount(){

           $query="INSERT INTO
        " . $this->user_account . "
    SET      userId=:userId,
             status=:status,
             createdOn=:createdOn,
             createdBy=:createdBy
               ";

        $stmt = $this->conn->prepare($query);
        $this->userId=htmlspecialchars(strip_tags($this->userId));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->createdBy=htmlspecialchars(strip_tags($this->createdBy));
        $this->createdOn=htmlspecialchars(strip_tags($this->createdOn));


        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":createdBy", $this->createdBy);
       
         // execute query
         if($stmt->execute()){
            return true;
        }
      
        return false;
    }


    function updateUserProfile(){
  
        // query to insert record
       $query = "UPDATE 
                    " . $this->user_account . "
                SET
                   accountHolder=:accountHolder,
                   bankName=:bankName,
                   branchName=:branchName, 
                   ifscCode=:ifscCode,
                   accountNum=:accountNum,
                   phonePayNum=:phonePayNum,
                   googlePayNum=:googlePayNum,
                   updatedOn=:updatedOn,
                   updatedBy=:updatedBy
                   where userId=:userId";
                          
        // prepare query
        $stmt = $this->conn->prepare($query);
        $this->accountHolder=htmlspecialchars(strip_tags($this->accountHolder));
        $this->bankName=htmlspecialchars(strip_tags($this->bankName));
        $this->branchName=htmlspecialchars(strip_tags($this->branchName));
        $this->ifscCode=htmlspecialchars(strip_tags($this->ifscCode));
        $this->accountNum=htmlspecialchars(strip_tags($this->accountNum));
        $this->phonePayNum=htmlspecialchars(strip_tags($this->phonePayNum));
        $this->googlePayNum=htmlspecialchars(strip_tags($this->googlePayNum));
        $this->updatedOn=htmlspecialchars(strip_tags($this->updatedOn));
        $this->updatedBy=htmlspecialchars(strip_tags($this->updatedBy));
         
        //bind values
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":accountHolder", $this->accountHolder);
         $stmt->bindParam(":bankName", $this->bankName);
        $stmt->bindParam(":branchName", $this->branchName);
        $stmt->bindParam(":ifscCode", $this->ifscCode);
        $stmt->bindParam(":accountNum", $this->accountNum);
        $stmt->bindParam(":phonePayNum", $this->phonePayNum);
        $stmt->bindParam(":googlePayNum", $this->googlePayNum);
        $stmt->bindParam(":updatedOn", $this->updatedOn);
        $stmt->bindParam(":updatedBy", $this->updatedBy);   
      
        // execute query
        if($stmt->execute()){
            return true;
        }
      
        return false;
          
    }


 }
?>