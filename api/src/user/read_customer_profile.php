<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// database connection will be here

// include database and object files
include_once '../../config/database.php';
include_once '../../objects/user.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$read_cu_profile = new User($db);
  
$data = json_decode(file_get_contents("php://input"));
//print_r($data);

$read_cu_profile->userType=$data->userType;
$read_cu_profile->id=$data->id;

$stmt = $read_cu_profile->readCustomerProfile();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $read_cu_profiles_arr=array();
    $read_cu_profiles_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     
        extract($row);
  
        $read_cu_profile_item=array(

            "id"=>$id,
            "userType"=>$userType,
            "userName"=>$userName,
            "userEmail"=>$userEmail,
            "userMobile"=>$userMobile,
            "status"=>$status,
            "businessCategory"=>$businessCategory,
            "categoryId"=>$categoryId,
            "businessName"=>$businessName,
            "establishmentYear"=>$establishmentYear,
            "paymentMode"=>$paymentMode,
            "userAddress"=>$userAddress,
            "city"=>$city,
            "state"=>$state,
            "userWebsite"=>$userWebsite,
            "alterMobile"=>$alterMobile,
            "businessTiming"=>$businessTiming,
            "businessDay"=>$businessDay,
            "userServices"=>$userServices,
            "aboutUser"=>$aboutUser,
            "createdOn"=>$createdOn,
            "createdBy"=>$createdBy,
            "updatedOn"=>$updatedOn,
            "updatedBy"=>$updatedBy
        );
  
        array_push($read_cu_profiles_arr["records"], $read_cu_profile_item);
    }
  
    // show products data in json format
    echo json_encode($read_cu_profiles_arr);

     // set response code - 200 OK
     http_response_code(200);
}
  
// no products found will be here
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No customer profile details found.")
    );
}
?>