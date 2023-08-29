<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
//database connection will be here

// include database and object files
include_once '../../config/database.php';
include_once '../../objects/payment.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$pay = new payment($db);
  
$data = json_decode(file_get_contents("php://input"));
// read products will be here
$pay->tracking_id=$data->tracking_id;
$pay->order_id=$data->order_id;
$pay->bank_ref_no=$data->bank_ref_no;
$pay->order_status=$data->order_status;
$pay->failure_message=$data->failure_message;
$pay->payment_mode=$data->payment_mode;
$pay->card_name=$data->card_name;
$pay->status_code=$data->status_code;
$pay->billing_tel=$data->billing_tel;
$pay->billing_email=$data->billing_email;
$pay->vault=$data->vault;
$pay->offer_type=$data->offer_type;
$pay->offer_code=$data->offer_code;
$pay->amount=$data->amount;
$pay->eci_value=$data->eci_value;
$pay->retry=$data->retry;
$pay->response_code=$data->response_code;
$pay->billing_notes=$data->billing_notes;
$pay->trans_date=$data->trans_date;



 if($pay->update_payment_details()){
  
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
        echo json_encode(array("message" => "Unable to update registration"));
    }
?>