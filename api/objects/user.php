<?php

class User
{

    private $conn;
    private $user_profile = "user_profile";
    private $user_profile_history = "user_profile_history";
    private $business_category = "business_category";
    private $customer_inquiry = "customer_inquiry";
    private $user_registration = "user_registration";
    private $user_type = "user_type";
    private $wall_uploads = "wall_uploads";
    private $wall_upload_history = "wall_upload_history";
    // private $table_payment = "payment";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public $id, $userId, $userType, $city, $state, $userName, $userEmail, $userPass, $userMobile, $businessCategory, $categoryId, $userAddress, $alterMobile, $businessDay, $userWebsite, $businessName, $establishmentYear, $paymentMode, $businessTiming, $userServices, $aboutUser, $status, $remark, $createdOn, $createdBy,$wallImg, $updatedOn, $updatedBy;

    public $cuId, $cuName,$cuEmail, $cuAddress, $cuMobile, $requiredService;
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

        if($this->userType=='3'){
            
        $query = "Select up.id, user.id, user.userType, up.remark, city, state, userName, userMobile, userEmail, up.status, bc.id as categoryId, bc.businessCategory, alterMobile, businessName, userWebsite, establishmentYear, userAddress, paymentMode, businessTiming, businessDay, userServices, aboutUser, user.createdOn, user.createdBy, up.updatedOn, up.updatedBy from " . $this->user_registration . " as user LEFT JOIN " . $this->user_profile . " as up ON user.id=up.userId LEFT JOIN ".$this->business_category." as bc ON bc.id=up.businessCategory where up.status=1 and user.userType=2 and user.id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

    }else{
        // $query = "Select up.id, user.id, user.userType, up.remark, city, state, userName, userMobile, userEmail, up.status, bc.id as categoryId, bc.businessCategory, alterMobile, businessName, userWebsite, establishmentYear, userAddress, paymentMode, businessTiming, businessDay, userServices, aboutUser, user.createdOn, user.createdBy, up.updatedOn, up.updatedBy from " . $this->user_registration . " as user LEFT JOIN " . $this->user_profile . " as up ON user.id=up.userId LEFT JOIN ".$this->business_category." as bc ON bc.id=up.businessCategory where user.userType=:userType and user.id=:id and (up.status=1 or up.status=0 or up.status=2)";
        $query = "Select ph.id, user.id, user.userType, ph.remark, city, state, userName, userMobile, userEmail, ph.status, bc.id as categoryId, bc.businessCategory, alterMobile, businessName, userWebsite, establishmentYear, userAddress, paymentMode, wallImg, businessTiming, businessDay, userServices, aboutUser, user.createdOn, user.createdBy, ph.updatedOn, ph.updatedBy from " . $this->user_registration . " as user  LEFT JOIN ".$this->wall_uploads." as wall ON user.id=wall.userId LEFT JOIN " . $this->user_profile_history . " as ph ON user.id=ph.userId LEFT JOIN ".$this->business_category." as bc ON bc.id=ph.businessCategory where user.userType=:userType and user.id=:id and (ph.status=1 or ph.status=0 or ph.status=2) ORDER BY ph.id DESC limit 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":userType", $this->userType);
        $stmt->bindParam(":id", $this->id); 
    }
        $stmt->execute();
        return $stmt;
    }

        public function readAllProfileByCategory()
    {
        $query = "Select up.id, userId, user.userType, up.remark, up.city, up.state, userName, userMobile, userEmail, up.status, bc.businessCategory, alterMobile, businessName, userWebsite, establishmentYear, userAddress, paymentMode, businessTiming, businessDay, userServices, aboutUser, user.createdOn, user.createdBy, up.updatedOn, up.updatedBy from " . $this->user_registration . " as user LEFT JOIN " . $this->user_profile . " as up ON user.id=up.userId LEFT JOIN ".$this->business_category." as bc ON bc.id=up.businessCategory where up.businessCategory=:businessCategory and up.status=1 and user.userType=:userType";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":userType", $this->userType);
        $stmt->bindParam(":businessCategory", $this->businessCategory);
        $stmt->execute();
        return $stmt;
    }

    
// select quiry for users pending, approve or rejected list 
    public function readAllUsersDetail()
    {

        $query = "Select user.id, user.userType, user.remark, userRole, user.userName, up.userAddress, businessCategory, user.userMobile, user.userEmail, up.status, up.createdOn, up.createdBy from " . $this->user_registration . " as user LEFT JOIN " . $this->user_type . " as ut ON user.userType=ut.userType LEFT JOIN ".$this->user_profile." as up ON user.id=up.userId where up.status=:status and user.userType=:userType";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":userType", $this->userType);
        $stmt->bindParam(":status", $this->status);
        $stmt->execute();
        return $stmt;
    }

// select quiry for users reupdated list

    public function readReupdatedUsersDetail()
    {

    $query = "Select ph.id, ph.userId, user.userType, user.remark, ut.userRole, user.userName, ph.userAddress, ph.businessCategory, user.userMobile, user.userEmail, ph.status, ph.updatedOn, ph.updatedBy from " . $this->user_registration . " as user LEFT JOIN " . $this->user_type . " as ut ON user.userType=ut.userType LEFT JOIN ".$this->user_profile_history." as ph ON user.id=ph.userId where ph.status=:status and user.userType=:userType ORDER BY ph.id DESC limit 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":userType", $this->userType);
        $stmt->bindParam(":status", $this->status);
        $stmt->execute();
        return $stmt;
    }

        public function customerInquiryDetail()
    {

       $query = "Select cui.id, cui.userId, cui.cuId, user.userMobile as cuMobile, user.userEmail as cuEmail, up.userAddress as cuAddress, cui.cuName, cui.requiredService, cui.createdOn, cui.createdBy from ".$this->customer_inquiry.
        " as cui LEFT JOIN ".$this->user_registration." as user ON user.id=cui.cuId LEFT JOIN ".$this->user_profile." as up ON user.id=up.userId where cui.userId=:userId";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":userId", $this->userId);
        $stmt->execute();
        return $stmt;
    }


    // select quiry for read user's wall list 
    public function readUsersWall()
    {
        
        if($this->userId!=""){
        $query = "Select wall.id,wall.userId, user.userName, bc.businessCategory, user.userEmail, user.userMobile, wall.wallImg,wall.status,wall.createdOn,wall.updatedOn,wall.createdBy,wall.updatedBy from " . $this->user_registration . " as user LEFT JOIN ".$this->wall_uploads." as wall ON wall.userId=user.id where wall.status=:status and wall.userId=:userId";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":status", $this->status);
        }else{
        $query = "Select wall.id,wall.userId, user.userName, bc.businessCategory, user.userEmail, user.userMobile, wall.wallImg,wall.status,wall.createdOn,wall.updatedOn,wall.createdBy,wall.updatedBy from " . $this->user_registration . " as user LEFT JOIN ".$this->wall_uploads." as wall ON wall.userId=user.id LEFT JOIN ".$this->business_category." as bc ON bc.id=wall.businessCategory where wall.status=:status";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":status", $this->status);
        }
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

    // insert user prachar wall image in wall_uploads table

    public function insertUserWall()
    {

       $query = "INSERT INTO
        " . $this->wall_uploads . "
    SET      userId=:userId,
             businessCategory=:businessCategory,
             wallImg=:wallImg,
             createdOn=:createdOn,
             createdBy=:createdBy
               ";

        $stmt = $this->conn->prepare($query);
        $this->userId = htmlspecialchars(strip_tags($this->userId));
        $this->businessCategory = htmlspecialchars(strip_tags($this->businessCategory));
        $this->wallImg = htmlspecialchars(strip_tags($this->wallImg));
        $this->createdOn = htmlspecialchars(strip_tags($this->createdOn));
        $this->createdBy = htmlspecialchars(strip_tags($this->createdBy));


        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":businessCategory", $this->businessCategory);
        $stmt->bindParam(":wallImg", $this->wallImg);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":createdBy", $this->createdBy);


        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // create user wall history
    public function insertUserWallHistory()
    {

       $query = "INSERT INTO
        " . $this->wall_upload_history . "
    SET      userId=:userId,
             businessCategory=:businessCategory,
             wallImg=:wallImg,
             createdOn=:createdOn,
             createdBy=:createdBy
               ";

        $stmt = $this->conn->prepare($query);
        $this->userId = htmlspecialchars(strip_tags($this->userId));
        $this->businessCategory = htmlspecialchars(strip_tags($this->businessCategory));
        $this->wallImg = htmlspecialchars(strip_tags($this->wallImg));
        $this->createdOn = htmlspecialchars(strip_tags($this->createdOn));
        $this->createdBy = htmlspecialchars(strip_tags($this->createdBy));


        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":businessCategory", $this->businessCategory);
        $stmt->bindParam(":wallImg", $this->wallImg);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":createdBy", $this->createdBy);


        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


    // update user wall
    public function updateUserWall()
    {

       $query = "UPDATE
        " . $this->wall_uploads . "
    SET      userId=:userId,
             wallImg=:wallImg,
             updatedOn=:updatedOn,
             updatedBy=:updatedBy
             where userId=:userId";

        $stmt = $this->conn->prepare($query);
        $this->userId = htmlspecialchars(strip_tags($this->userId));
        $this->wallImg = htmlspecialchars(strip_tags($this->wallImg));
        $this->updatedOn = htmlspecialchars(strip_tags($this->updatedOn));
        $this->updatedBy = htmlspecialchars(strip_tags($this->updatedBy));


        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":wallImg", $this->wallImg);
        $stmt->bindParam(":updatedOn", $this->updatedOn);
        $stmt->bindParam(":updatedBy", $this->updatedBy);


        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

// create user profile history
    
     public function insertUserProfileHistory()
    {

        $query = "INSERT INTO
        " . $this->user_profile_history . "
    SET
                   userId=:userId,
                   businessName=:businessName,
                   businessCategory=:businessCategory,
                   userAddress=:userAddress,
                   city=:city,
                   state=:state, 
                   alterMobile=:alterMobile,
                   aboutUser=:aboutUser,
                   userServices=:userServices,
                   establishmentYear=:establishmentYear,
                   businessTiming=:businessTiming,
                   businessDay=:businessDay,
                   paymentMode=:paymentMode,
                   userWebsite=:userWebsite,
                   status=:status,
                   updatedOn=:updatedOn,
                   updatedBy=:updatedBy
               ";

        $stmt = $this->conn->prepare($query);
        $this->userId = htmlspecialchars(strip_tags($this->userId));
        $this->businessName = htmlspecialchars(strip_tags($this->businessName));
        $this->businessCategory = htmlspecialchars(strip_tags($this->businessCategory));
        $this->userAddress = htmlspecialchars(strip_tags($this->userAddress));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->state = htmlspecialchars(strip_tags($this->state));
        $this->alterMobile = htmlspecialchars(strip_tags($this->alterMobile));
        $this->aboutUser = htmlspecialchars(strip_tags($this->aboutUser));
        $this->userServices = htmlspecialchars(strip_tags($this->userServices));
        $this->establishmentYear = htmlspecialchars(strip_tags($this->establishmentYear));
        $this->businessTiming = htmlspecialchars(strip_tags($this->businessTiming));
        $this->businessDay = htmlspecialchars(strip_tags($this->businessDay));
        $this->paymentMode = htmlspecialchars(strip_tags($this->paymentMode));
        $this->userWebsite = htmlspecialchars(strip_tags($this->userWebsite));
        $this->status = htmlspecialchars(strip_tags($this->status));
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
        $stmt->bindParam(":userServices", $this->userServices);
        $stmt->bindParam(":establishmentYear", $this->establishmentYear);
        $stmt->bindParam(":businessTiming", $this->businessTiming);
        $stmt->bindParam(":businessDay", $this->businessDay);
        $stmt->bindParam(":paymentMode", $this->paymentMode);
        $stmt->bindParam(":userWebsite", $this->userWebsite);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":updatedOn", $this->updatedOn);
        $stmt->bindParam(":updatedBy", $this->updatedBy);


        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

       public function insertCustomerInquiry()
    {

        $query = "INSERT INTO
        " . $this->customer_inquiry . "
    SET      cuId=:cuId,
             userId=:userId,
             cuName=:cuName,
             cuEmail=:cuEmail,
             requiredService=:requiredService,
             createdOn=:createdOn,
             createdBy=:createdBy
               ";

        $stmt = $this->conn->prepare($query);
        $this->cuId = htmlspecialchars(strip_tags($this->cuId));
        $this->userId = htmlspecialchars(strip_tags($this->userId));
        $this->cuName = htmlspecialchars(strip_tags($this->cuName));
        $this->cuEmail = htmlspecialchars(strip_tags($this->cuEmail));
        $this->requiredService = htmlspecialchars(strip_tags($this->requiredService));
        $this->createdOn = htmlspecialchars(strip_tags($this->createdOn));
        $this->createdBy = htmlspecialchars(strip_tags($this->createdBy));


        $stmt->bindParam(":cuId", $this->cuId);
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":cuName", $this->cuName);
        $stmt->bindParam(":cuEmail", $this->cuEmail);
        $stmt->bindParam(":requiredService", $this->requiredService);
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
                   userServices=:userServices,
                   establishmentYear=:establishmentYear,
                   businessTiming=:businessTiming,
                   businessDay=:businessDay,
                   paymentMode=:paymentMode,
                   userWebsite=:userWebsite,
                   status=:status,
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
        $this->userServices = htmlspecialchars(strip_tags($this->userServices));
        $this->establishmentYear = htmlspecialchars(strip_tags($this->establishmentYear));
        $this->businessTiming = htmlspecialchars(strip_tags($this->businessTiming));
        $this->businessDay = htmlspecialchars(strip_tags($this->businessDay));
        $this->paymentMode = htmlspecialchars(strip_tags($this->paymentMode));
        $this->userWebsite = htmlspecialchars(strip_tags($this->userWebsite));
        $this->status = htmlspecialchars(strip_tags($this->status));
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
        $stmt->bindParam(":userServices", $this->userServices);
        $stmt->bindParam(":establishmentYear", $this->establishmentYear);
        $stmt->bindParam(":businessTiming", $this->businessTiming);
        $stmt->bindParam(":businessDay", $this->businessDay);
        $stmt->bindParam(":paymentMode", $this->paymentMode);
        $stmt->bindParam(":userWebsite", $this->userWebsite);
        $stmt->bindParam(":status", $this->status);
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
         " . $this->user_profile . "
     SET
        remark=:remark,
        status=:status
        where userId=:id";

        $query2 = "UPDATE 
         " . $this->user_profile_history . "
     SET
        remark=:remark,
        status=:status
        where userId=:id";

        // prepare query
        $stmt = $this->conn->prepare($query);
        $stmt2 = $this->conn->prepare($query2);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->remark = htmlspecialchars(strip_tags($this->remark));
        $this->status = htmlspecialchars(strip_tags($this->status));

        //bind values with stmt
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":remark", $this->remark);
        $stmt->bindParam(":status", $this->status);
        
        //bind values with stmt2
        $stmt2->bindParam(":id", $this->id);
        $stmt2->bindParam(":remark", $this->remark);
        $stmt2->bindParam(":status", $this->status);

        // execute query2
        if ($stmt->execute() && $stmt2->execute()) {
            return true;
        }

        return false;
    }


}
?>