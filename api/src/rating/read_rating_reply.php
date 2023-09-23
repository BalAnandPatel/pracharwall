<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// database connection will be here

// include database and object files
include_once '../../config/database.php';
include_once '../../objects/rating.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$read_rating_reply = new Rating($db);
  
$data = json_decode(file_get_contents("php://input"));
$read_rating_reply->review_id = $data->review_id;

$stmt = $read_rating_reply->readRatingReply();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $read_rating_replys_arr=array();
    $read_rating_replys_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     
        extract($row);
  
        $read_rating_reply_item=array(

            "id"=>$id,
            "user_id"=>$user_id,
            "business_owner"=>$business_owner,
            "user_reply"=>$user_reply,
            "created_on"=>$created_on

             );
  
        array_push($read_rating_replys_arr["records"], $read_rating_reply_item);
    }
  
    // show products data in json format
    echo json_encode($read_rating_replys_arr);

     // set response code - 200 OK
     http_response_code(200);
}
  
// no products found will be here
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No ratings reply found.")
    );
}
?>