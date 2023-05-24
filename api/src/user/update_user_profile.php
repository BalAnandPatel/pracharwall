<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../../config/database.php';
  
//instantiate reg object
include_once '../../objects/user.php';
  
$database = new Database();
$db = $database->getConnection();
  
$update_userprofile = new User($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);
// mavarke sure data is not empty
if(

    !empty($data->accountHolder) &&     
    !empty($data->bankName) &&
    !empty($data->branchName) &&
    !empty($data->ifscCode) &&
    !empty($data->accountNum) &&
    !empty($data->phonePayNum) &&
    !empty($data->googlePayNum) 
  
)

{
    $update_userprofile->userId=$data->userId;
    $update_userprofile->accountHolder=$data->accountHolder;
    $update_userprofile->bankName = $data->bankName;
    $update_userprofile->branchName = $data->branchName;
    $update_userprofile->ifscCode = $data->ifscCode;
    $update_userprofile->accountNum = $data->accountNum;
    $update_userprofile->phonePayNum = $data->phonePayNum;
    $update_userprofile->googlePayNum = $data->googlePayNum;
    $update_userprofile->updatedOn = $data->updatedOn;
    $update_userprofile->updatedBy = $data->updatedBy;

    if($update_userprofile->updateUserProfile()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "User profile updated successfully"));
    }
  
    // if unable to create the reg, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update user Profile"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update user Profile. Data is incomplete."));
}
?>