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
  
$insert_user_wall_history = new User($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);  
// make sure data is not empty
if(

    !empty($data->wallImg) &&
    !empty($data->userId) &&
    !empty($data->status) &&
    !empty($data->categoryId)
   
)

{
    $insert_user_wall_history->userId = $data->userId;
    $insert_user_wall_history->businessCategory = $data->categoryId;
    $insert_user_wall_history->wallImg = $data->wallImg;
    $insert_user_wall_history->status = $data->status;
    $insert_user_wall_history->wall_history_status = $data->wall_history_status;
    $insert_user_wall_history->createdOn = $data->createdOn;
    $insert_user_wall_history->createdBy = $data->createdBy;
       
    //var_dump($exam);
    // create the reg
    
    if($insert_user_wall_history->insertUserWallHistory()){

        http_response_code(201);
        echo json_encode(array("message"=>"Insert Wall history Successfully"));
    }
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to insert user wall history"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to insert user wall history. Data is incomplete."));
}
?>