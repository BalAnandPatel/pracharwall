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
  
$insert_user = new User($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);  
// make sure data is not empty
if(
    
    !empty($data->userType) &&
    !empty($data->userName) &&
    !empty($data->userMobile) &&
    !empty($data->userEmail) &&
    !empty($data->userPass)
)

{
    $insert_user->userType = $data->userType;
    $insert_user->userName = $data->userName;
    $insert_user->userEmail = $data->userEmail;
    $insert_user->userMobile = $data->userMobile;
    $insert_user->userPass = $data->userPass;
    $insert_user->status = $data->status;
    $insert_user->createdOn = $data->createdOn;
    $insert_user->createdBy = $data->createdBy;
       
    //var_dump($exam);
    // create the reg
    if($insert_user->insertUser()){

        http_response_code(201);
        echo json_encode(array("message"=>"Successfull"));
    }
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to insert user"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to insert user. Data is incomplete."));
}
?>