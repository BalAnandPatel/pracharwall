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
    !empty($data->ticketAmount) &&
    !empty($data->lotteryNum) &&
    !empty($data->lotteryAmount) &&
    !empty($data->userId) &&
    !empty($data->userName) &&
    !empty($data->bankName) &&
    !empty($data->branchName) &&
    !empty($data->accountNum) &&
    !empty($data->ifscCode) &&
    !empty($data->accountHolder) &&
    !empty($data->paymentMode) &&
    !empty($data->slipNum) &&
    !empty($data->remark) &&
    !empty($data->status) 
)

{
    $payment->ticketId = $data->ticketId;
    $payment->ticketAmount = $data->ticketAmount;
    $payment->lotteryNum = $data->lotteryNum;
    $payment->lotteryAmount = $data->lotteryAmount;
    $payment->userId = $data->userId;
    $payment->userName = $data->userName;
    $payment->bankName = $data->bankName;
    $payment->branchName = $data->branchName;
    $payment->accountNum = $data->accountNum;
    $payment->ifscCode = $data->ifscCode;
    $payment->accountHolder = $data->accountHolder;
    $payment->paymentMode = $data->paymentMode;
    $payment->slipNum = $data->slipNum;
    $payment->remark = $data->remark;
    $payment->status = $data->status;
    $payment->createdOn = $data->createdOn;
    $payment->createdBy = $data->createdBy;
       
    // var_dump($data);
    // create the reg
    if($payment->paymentEentry()){
        // echo "done";

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