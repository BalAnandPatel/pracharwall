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
include_once '../../objects/exam.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$exam = new exam($db);
  
$data = json_decode(file_get_contents("php://input"));
//print_r($data);

$exam->registration_no=$data->registration_no;
$exam->mobile=$data->mobile;

$stmt = $exam->read_payment_varify_details();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $exams_arr=array();
    $exams_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     
        extract($row);
  
        $exam_item=array(

            "id" => $id,
            "full_name"=>$full_name,
            "registration_no"=>$registration_no,
            "exam_name"=>$exam_name,
            "general_fee"=>$general_fee,
            "obc_fee"=>$obc_fee,
            "sc_fee"=>$sc_fee,
            "st_fee"=>$st_fee,
            "ews_fee"=>$ews_fee,
            "category"=>$category,
            "address1"=>$address1,
            "address2"=>$address2,
            "address3"=>$address3,
            "state"=>$state,
            "pincode"=>$pincode,
            "nationality"=>$nationality,
            "mobile"=>$mobile,
            "email"=>$email,
            "dob"=>$dob,
            "status"=>$status,
            "created_on"=>$created_on,
            "created_by"=>$created_by
        );
  
        array_push($exams_arr["records"], $exam_item);
    }
  
    // show products data in json format
    echo json_encode($exams_arr);

     // set response code - 200 OK
     http_response_code(200);
}
  
// no products found will be here
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "payment not verified")
    );
}
?>