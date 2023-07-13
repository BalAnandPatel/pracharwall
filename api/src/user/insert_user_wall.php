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
  
$insert_user_wall = new User($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);
// make sure data is not empty

if(
    !empty($data->wallImg) &&
    !empty($data->userId) &&
    !empty($data->categoryId)
)

{

    $insert_user_wall->userId = $data->userId;
    $insert_user_wall->businessCategory = $data->categoryId;
    $insert_user_wall->wallImg = $data->wallImg;
    $insert_user_wall->status = $data->status;
    $insert_user_wall->createdOn = $data->createdOn;
    $insert_user_wall->createdBy = $data->createdBy;
       
    //var_dump($exam);
    // create the reg
    
    if($insert_user_wall->insertUserWall()){

        http_response_code(201);
        echo json_encode(array("message"=>"Insert Wall Successfully"));
    }
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to insert user wall"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to insert user wall. Data is incomplete."));
}
?>