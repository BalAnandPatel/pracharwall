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
  
$insert_regwall = new User($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);  
// make sure data is not empty
if(
    
    !empty($data->serviceName) &&
    !empty($data->serviceType) &&
    !empty($data->email) &&
    !empty($data->city) &&
    !empty($data->mobile) &&
    !empty($data->description) 
)

{
    $insert_regwall->serviceName = $data->serviceName;
    $insert_regwall->serviceType = $data->serviceType;
    $insert_regwall->email = $data->email;
    $insert_regwall->city = $data->city;
    $insert_regwall->mobile = $data->mobile;
    $insert_regwall->description = $data->description;
    $insert_regwall->status = $data->status;
    $insert_regwall->createdOn = $data->createdOn;
    $insert_regwall->createdBy = $data->createdBy;

       
    //var_dump($exam);
    // create the reg
    if($insert_regwall->insertRegisterWall()){

        http_response_code(201);
        echo json_encode(array("message"=>"Successfull"));
    }
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to insert register wall"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to insert user account. Data is incomplete."));
}
?>