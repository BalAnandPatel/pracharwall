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
include_once '../../objects/registration.php';
  
$database = new Database();
$db = $database->getConnection();
  
$reg = new registration($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
// print_r($data);  
// make sure data is not empty
if(
    
    !empty($data->full_name) &&
    !empty($data->father_name) &&
    !empty($data->mother_name) &&
    !empty($data->dob) &&
    !empty($data->mobile) &&
    !empty($data->email) &&
    !empty($data->address1) &&
    !empty($data->district) &&
    !empty($data->state) &&
    !empty($data->created_on)
)

{
    $reg->full_name = $data->full_name;
    $reg->mother_name = $data->mother_name;
    $reg->father_name = $data->father_name;
    $reg->status = $data->status;
    $reg->result = $data->result;
    $reg->admit_card = $data->admit_card;
    $reg->password = $data->password;
    $reg->marital_status = $data->marital_status;
    $reg->spouse_name = $data->spouse_name;
    $reg->gender = $data->gender;
    $reg->dob = $data->dob;
    $reg->mobile = $data->mobile;
    $reg->alternate_mobile = $data->alternate_mobile;
    $reg->email = $data->email;
    $reg->address1 = $data->address1;
    $reg->address2 = $data->address2;
    $reg->address3 = $data->address3;
    $reg->cor_address = $data->cor_address;
    $reg->district = $data->district;
    $reg->state = $data->state;
    $reg->pincode = $data->pincode;
    $reg->religion = $data->religion;
    $reg->category = $data->category;
    $reg->nationality=$data->nationality;
    $reg->h_qualification = $data->h_qualification;
    $reg->subject = $data->subject;
    $reg->passing_date = $data->passing_date;
    $reg->h_percentage = $data->h_percentage;
    $reg->grade = $data->grade;
    $reg->languages = $data->languages;
    $reg->is_read = $data->is_read;
    $reg->is_write = $data->is_write;
    $reg->is_speak=$data->is_speak;
    $reg->disability_cat = $data->disability_cat;
    $reg->disability_type = $data->disability_type;
    $reg->ex_serviceman = $data->ex_serviceman;
    $reg->serving_defence_per = $data->serving_defence_per;
    $reg->exam_name=$data->exam_name;
    $reg->service_period = $data->service_period;
    $reg->created_by = $data->created_by;
    $reg->created_on = $data->created_on;
    $reg->registration_no = $data->registration_no;
    
    //var_dump($reg);
    // create the reg
    if($reg->insert_registration()){

        http_response_code(201);
        echo json_encode(array("message" => "Successfull"));
    }
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create registration"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create registration. Data is incomplete."));
}
?>