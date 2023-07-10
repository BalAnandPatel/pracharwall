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
  
$user_wall_approve = new User($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
// print_r($data);
// mavarke sure data is not empty
if(
    !empty($data->userId) &&
    !empty($data->status)
)

{
  
    $user_wall_approve->userId=$data->userId;
    $user_wall_approve->wallImg=$data->wallImg;
    $user_wall_approve->status=$data->status;
    $user_wall_approve->updatedOn=$data->updatedOn;
    $user_wall_approve->updatedBy=$data->updatedBy;

    if($user_wall_approve->approveUserwall()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "User wall approved successfully"));
    }
  
    // if unable to create the reg, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to approve user wall"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to approve user wall. Data is incomplete."));
}
?>