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
include_once '../../objects/ticket.php';
  
$database = new Database();
$db = $database->getConnection();
  
$create_tickethistory = new Ticket($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);  
// make sure data is not empty
if(

   !empty($data->ticketAmount) &&
   !empty($data->lotteryAmount)  
)

{   
    $create_tickethistory->ticketId = $data->ticketId;
    $create_tickethistory->userId = $data->userId;
    $create_tickethistory->ticketAmount = $data->ticketAmount;
    $create_tickethistory->lotteryAmount = $data->lotteryAmount;
    $create_tickethistory->lotteryNum = $data->lotteryNum;
    $create_tickethistory->status = $data->status;
    $create_tickethistory->createdOn = $data->createdOn;
    $create_tickethistory->createdBy = $data->createdBy;

    
    //var_dump($reg);
    // create the reg
    if($create_tickethistory->createTicketHistory()){

        http_response_code(201);
        echo json_encode(array("message" => "Successfull"));
    }
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create ticket history"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create ticket history. Data is incomplete."));
}
?>