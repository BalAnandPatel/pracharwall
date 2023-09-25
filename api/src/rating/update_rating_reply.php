<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../../config/database.php';
  
// instantiate update_rating object
include_once '../../objects/rating.php';
  
$database = new Database();
$db = $database->getConnection();
  
$update_rating = new Rating($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
 // print_r($data);  
// make sure data is not empty
if(
     !empty($data->review_reply) &&
     !empty($data->business_owner) 

)

{
    $update_rating->review_reply = $data->review_reply;
    $update_rating->business_owner = $data->business_owner;
    $update_rating->review_id = $data->review_id;
    $update_rating->reply_by = $data->reply_by;
    $update_rating->updated_on = $data->updated_on;
    
    //var_dump($update_rating);
    // create the update_rating
    if($update_rating->update_rating_reply()){

        http_response_code(201);
        echo json_encode(array("message" => "Successfull"));
    }
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update rating"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update- rating. Data is incomplete."));
}
?>