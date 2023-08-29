<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../../config/database.php';
  
//instantiate reg object
include_once '../../objects/exam.php';
  
$database = new Database();
$db = $database->getConnection();
  
$exam = new exam($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);
// mavarke sure data is not empty
if(

    !empty($data->exam_name) &&     
    !empty($data->type) &&
    !empty($data->general_fee) &&
    !empty($data->obc_fee) &&
    !empty($data->sc_fee) &&
    !empty($data->st_fee) &&
    !empty($data->ews_fee) &&
    !empty($data->eligibility) &&
    !empty($data->total_post) &&
    !empty($data->age) &&
    !empty($data->exam_date_start) &&
    !empty($data->exam_date_end) &&
    !empty($data->admit_card_date) &&
    !empty($data->result_date)
)

{
    $exam->id=$data->id;
    $exam->exam_name=$data->exam_name;
    $exam->type = $data->type;
    $exam->general_fee = $data->general_fee;
    $exam->obc_fee = $data->obc_fee;
    $exam->sc_fee = $data->sc_fee;
    $exam->st_fee = $data->st_fee;
    $exam->ews_fee = $data->ews_fee;
    $exam->eligibility = $data->eligibility;
    $exam->total_post = $data->total_post;
    $exam->age = $data->age;
    $exam->exam_date_start = $data->exam_date_start;
    $exam->exam_date_end = $data->exam_date_end;
    $exam->admit_card_date = $data->admit_card_date;
    $exam->result_date = $data->result_date;
    $exam->status = $data->status;
    $exam->updated_on = $data->updated_on;
    $exam->updated_by = $data->updated_by;
   

    if($exam->update_exam()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Exam Updated Successfully"));
    }
  
    // if unable to create the reg, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update exam"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update exam. Data is incomplete."));
}
?>