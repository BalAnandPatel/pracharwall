<?php

class User
{

    private $conn;
    private $user_profile = "user_profile";
    private $user_registration = "user_registration";
    private $user_type = "user_type";
    // private $table_payment = "payment";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public $id, $userId, $userType, $city, $state, $userName, $userEmail, $userPass, $userMobile, $businessCategory, $userAddress, $alterMobile, $businessDay, $userWebsite, $businessName, $establishmentYear, $paymentMode, $businessTiming, $userServices, $aboutUser, $status, $remark, $createdOn, $createdBy, $updatedOn, $updatedBy;

    public function readMaxUserId()
    {
        $query = "Select max(id) as userId from " . $this->user_registration;
        $stmt = $this->conn->prepare($query);
        // $stmt->bindParam(":userName", $this->userName); 
        $stmt->execute();
        return $stmt;
    }

    public function readUserProfile()
    {
        $query = "Select up.id, user.id, user.userType, city, state, userName, userMobile, userEmail, user.status, businessCategory, alterMobile, businessName, userWebsite, establishmentYear, userAddress, paymentMode, businessTiming, businessDay, userServices, aboutUser, user.createdOn, user.createdBy, up.updatedOn, up.updatedBy from " . $this->user_registration . " as user LEFT JOIN " . $this->user_profile . " as up ON user.id=up.userId where user.status=1 and userType=:userType and user.id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":userType", $this->userType);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

    public function readAllUsersDetail()
    {

        $query = "Select user.id, user.userType, userRole, userName, userMobile, userEmail, user.status, user.createdOn, user.createdBy from " . $this->user_registration . " as user LEFT JOIN " . $this->user_type . " as ut ON user.userType=ut.userType where user.status=:status";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":status", $this->status);
        $stmt->execute();
        return $stmt;
    }



    public function insertUser()
    {

        $query = "INSERT INTO
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
        $this->userType = htmlspecialchars(strip_tags($this->userType));
        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->userMobile = htmlspecialchars(strip_tags($this->userMobile));
        $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
        $this->userPass = htmlspecialchars(strip_tags($this->userPass));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->createdBy = htmlspecialchars(strip_tags($this->createdBy));
        $this->createdOn = htmlspecialchars(strip_tags($this->createdOn));

        $stmt->bindParam(":userType", $this->userType);
        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":userMobile", $this->userMobile);
        $stmt->bindParam(":userEmail", $this->userEmail);
        $stmt->bindParam(":userPass", $this->userPass);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":createdBy", $this->createdBy);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function insertUserProfile()
    {

        $query = "INSERT INTO
        " . $this->user_profile . "
    SET      userId=:userId,
             status=:status,
             createdOn=:createdOn,
             createdBy=:createdBy
               ";

        $stmt = $this->conn->prepare($query);
        $this->userId = htmlspecialchars(strip_tags($this->userId));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->createdOn = htmlspecialchars(strip_tags($this->createdOn));
        $this->createdBy = htmlspecialchars(strip_tags($this->createdBy));


        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":createdBy", $this->createdBy);


        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


    function updateUserProfile()
    {

        // query to insert record
        $query = "UPDATE 
                    " . $this->user_profile . "
                SET
                   businessName=:businessName,
                   businessCategory=:businessCategory,
                   userAddress=:userAddress,
                   city=:city,
                   state=:state, 
                   alterMobile=:alterMobile,
                   aboutUser=:aboutUser,
                   establishmentYear=:establishmentYear,
                   businessTiming=:businessTiming,
                   businessDay=:businessDay,
                   paymentMode=:paymentMode,
                   userWebsite=:userWebsite,
                   updatedOn=:updatedOn,
                   updatedBy=:updatedBy
                   where userId=:userId";

        // prepare query
        $stmt = $this->conn->prepare($query);
        $this->businessName = htmlspecialchars(strip_tags($this->businessName));
        $this->businessCategory = htmlspecialchars(strip_tags($this->businessCategory));
        $this->userAddress = htmlspecialchars(strip_tags($this->userAddress));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->state = htmlspecialchars(strip_tags($this->state));
        $this->alterMobile = htmlspecialchars(strip_tags($this->alterMobile));
        $this->aboutUser = htmlspecialchars(strip_tags($this->aboutUser));
        $this->establishmentYear = htmlspecialchars(strip_tags($this->establishmentYear));
        $this->businessTiming = htmlspecialchars(strip_tags($this->businessTiming));
        $this->businessDay = htmlspecialchars(strip_tags($this->businessDay));
        $this->paymentMode = htmlspecialchars(strip_tags($this->paymentMode));
        $this->userWebsite = htmlspecialchars(strip_tags($this->userWebsite));
        $this->updatedOn = htmlspecialchars(strip_tags($this->updatedOn));
        $this->updatedBy = htmlspecialchars(strip_tags($this->updatedBy));

        //bind values
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":businessName", $this->businessName);
        $stmt->bindParam(":businessCategory", $this->businessCategory);
        $stmt->bindParam(":userAddress", $this->userAddress);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":state", $this->state);
        $stmt->bindParam(":alterMobile", $this->alterMobile);
        $stmt->bindParam(":aboutUser", $this->aboutUser);
        $stmt->bindParam(":establishmentYear", $this->establishmentYear);
        $stmt->bindParam(":businessTiming", $this->businessTiming);
        $stmt->bindParam(":businessDay", $this->businessDay);
        $stmt->bindParam(":paymentMode", $this->paymentMode);
        $stmt->bindParam(":userWebsite", $this->userWebsite);
        $stmt->bindParam(":updatedOn", $this->updatedOn);
        $stmt->bindParam(":updatedBy", $this->updatedBy);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;

    }

    function updateUserStatus()
    {

        // query to insert record
        $query = "UPDATE 
         " . $this->user_registration . "
     SET
        remark=:remark,
        status=:status
        where id=:id";

        // prepare query
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->remark = htmlspecialchars(strip_tags($this->remark));
        $this->status = htmlspecialchars(strip_tags($this->status));

        //bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":remark", $this->remark);
        $stmt->bindParam(":status", $this->status);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


}
?>