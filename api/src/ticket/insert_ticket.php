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
  
$insert_ticket = new Ticket($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);  
// make sure data is not empty
if(

   !empty($data->ticketAmount) &&
   !empty($data->lotteryAmount)  
)

{
    $insert_ticket->ticketAmount = $data->ticketAmount;
    $insert_ticket->lotteryAmount = $data->lotteryAmount;
    $insert_ticket->lotteryNum = $data->lotteryNum;
    $insert_ticket->status = $data->status;
    $insert_ticket->createdOn = $data->createdOn;
    $insert_ticket->createdBy = $data->createdBy;

    
    //var_dump($reg);
    // create the reg
    if($insert_ticket->insertTicket()){

        http_response_code(201);
        echo json_encode(array("message" => "Successfull"));
    }
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create ticket"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create ticket. Data is incomplete."));
}
?>