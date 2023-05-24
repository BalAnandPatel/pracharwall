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
include_once '../../objects/user_login.php';
  
$database = new Database();
$db = $database->getConnection();
  
$update_userpass = new Userlogin($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);
// mavarke sure data is not empty
if(

    !empty($data->userType) &&     
    !empty($data->userPass) &&
    !empty($data->id) 
  
)

{
    $update_userpass->userType=$data->userType;
    $update_userpass->userPass=$data->userPass;
    $update_userpass->id=$data->id;

    if($update_userpass->changeUserPass()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "User password updated successfully"));
    }
  
    // if unable to create the reg, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update user Password"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update user Password. Data is incomplete."));
}
?>