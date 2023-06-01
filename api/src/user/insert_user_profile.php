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
  
$insert_profile = new User($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);  
// make sure data is not empty
if(
    
    !empty($data->userId) &&
    !empty($data->createdOn) &&
    !empty($data->createdBy) 

)

{
    $insert_profile->userId = $data->userId;
    $insert_profile->status = $data->status;
    $insert_profile->createdOn = $data->createdOn;
    $insert_profile->createdBy = $data->createdBy;

       
    //var_dump($exam);
    // create the reg
    if($insert_profile->insertUserProfile()){

        http_response_code(201);
        echo json_encode(array("message"=>"Profile Inserted Successfully"));
    }
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to insert profile data"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to insert profile data. Data is incomplete."));
}
?>