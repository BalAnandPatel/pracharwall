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
  
$ticket_purchased = new Ticket($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//var_dump($data);  
// mavarke sure data is not empty
if(
    
    !empty($data->ticketId) &&
    !empty($data->status) 

)

{
    $ticket_purchased->id=$data->ticketId;
    $ticket_purchased->status = $data->status;
    $ticket_purchased->updatedOn=$data->updatedOn;
    $ticket_purchased->updatedBy=$data->updatedBy;
   

    if($ticket_purchased->updateTicketPurchased()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Successfull"));
    }
  
    // if unable to create the reg, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update ticket status"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update ticket status. Data is incomplete."));
}
?>