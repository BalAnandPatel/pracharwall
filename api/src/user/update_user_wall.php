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
  
$update_user_wall = new User($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
// print_r($data);
// mavarke sure data is not empty
if(
   
    !empty($data->wallImg) &&
    !empty($data->userId)
  
)

{
    $update_user_wall->userId = $data->userId;
    $update_user_wall->wallImg = $data->wallImg;
    $update_user_wall->updatedOn = $data->updatedOn;
    $update_user_wall->updatedBy = $data->updatedBy;

    if($update_user_wall->updateUserWall()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "User wall updated successfully"));
    }
  
    // if unable to create the reg, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update user wall"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update user wall. Data is incomplete."));
}
?>