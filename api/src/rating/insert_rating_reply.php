<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../../config/database.php';
  
// instantiate insert_rating object
include_once '../../objects/rating.php';
  
$database = new Database();
$db = $database->getConnection();
  
$insert_rating = new Rating($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
 // print_r($data);  
// make sure data is not empty
if(
     !empty($data->user_reply) &&
     !empty($data->user_id) &&
     !empty($data->business_owner) 

)

{
    $insert_rating->user_reply = $data->user_reply;
    $insert_rating->user_id = $data->user_id;
    $insert_rating->business_owner = $data->business_owner;
    $insert_rating->created_on = $data->created_on;
    
    //var_dump($insert_rating);
    // create the insert_rating
    if($insert_rating->insert_rating_reply()){

        http_response_code(201);
        echo json_encode(array("message" => "Successfull"));
    }
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create rating"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create rating. Data is incomplete."));
}
?>