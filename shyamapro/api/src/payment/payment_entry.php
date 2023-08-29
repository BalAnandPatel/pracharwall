<?php
//required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../../config/database.php';
  
// instantiate reg object
include_once '../../objects/payment.php';
  
$database = new Database();
$db = $database->getConnection();
  
$payment = new payment($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);  
// make sure data is not empty
if(
    !empty($data->user_id) &&
    !empty($data->amount) &&
    !empty($data->transaction_id) &&
    !empty($data->status) &&
    !empty($data->created_on) &&
    !empty($data->created_by)
)

{
    $payment->user_id = $data->user_id;
    $payment->amount = $data->amount;
    $payment->transaction_id = $data->transaction_id;
    $payment->request_id = $data->request_id;
    $payment->status = $data->status;
    $payment->created_by = $data->created_by;
    $payment->created_on = $data->created_on;
       
    var_dump($data);
    // create the reg
    if($payment->payment_entry()){
        echo "done";

        http_response_code(201);
        echo json_encode(array("message"=>"Successfull"));
    }
    else{
   echo "fail";
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to insert payment"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to insert payment. Data is incomplete."));
}
?>