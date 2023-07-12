<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../../config/database.php';
  
// instantiate reg object
include_once '../../objects/user.php';
  
$database = new Database();
$db = $database->getConnection();
  
$insert_profile_history = new User($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);  
// make sure data is not empty
if(
    
    !empty($data->userId) &&     
    !empty($data->businessName) &&
    !empty($data->businessCategory) &&
    !empty($data->userAddress) &&
    !empty($data->establishmentYear) &&
    !empty($data->businessTiming) &&
    !empty($data->paymentMode) &&
    !empty($data->userServices) &&
    !empty($data->aboutUser) 

)

{
    $insert_profile_history->userId=$data->userId;
    $insert_profile_history->aboutUser=$data->aboutUser;
    $insert_profile_history->businessName=$data->businessName;
    $insert_profile_history->businessCategory = $data->businessCategory;
    $insert_profile_history->userAddress = $data->userAddress;
    $insert_profile_history->city = $data->city;
    $insert_profile_history->state = $data->state;
    $insert_profile_history->alterMobile = $data->alterMobile;
    $insert_profile_history->establishmentYear = $data->establishmentYear;
    $insert_profile_history->businessTiming = $data->businessTiming;
    $insert_profile_history->businessDay = $data->businessDay;
    $insert_profile_history->paymentMode = $data->paymentMode;
    $insert_profile_history->userWebsite = $data->userWebsite;
    $insert_profile_history->userServices = $data->userServices;
    $insert_profile_history->status = $data->status;
    $insert_profile_history->history_status = $data->history_status;
    $insert_profile_history->updatedOn = $data->updatedOn;
    $insert_profile_history->updatedBy = $data->updatedBy;

       
    //var_dump($exam);
    // create the reg
    if($insert_profile_history->insertUserProfileHistory()){

        http_response_code(201);
        echo json_encode(array("message"=>"Profile Histroy Created Successfully"));
    }
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to Create Profile Histroy"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to Create Profile Histroy, Data is incomplete."));
}
?>