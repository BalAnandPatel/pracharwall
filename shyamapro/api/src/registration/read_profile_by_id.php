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
include_once '../../objects/registration.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$reg = new registration($db);
  
$data = json_decode(file_get_contents("php://input"));
// is_read products will be here
$reg->id=$data->id;

// query products
$stmt = $reg->read_profile_by_id();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $regs_arr=array();
    $regs_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     
        extract($row);
  
        $reg_item=array(

    "id" => $id,
    "full_name"=>$full_name,
    "mother_name"=>$mother_name,
    "father_name"=>$father_name,
    "spouse_name"=>$spouse_name,
    "status"=>$status,
    "admit_card"=>$admit_card,
    "result"=>$result,
    "password"=>$password,
    "marital_status"=>$marital_status,
    "gender"=>$gender,
    "dob"=>$dob,
    "mobile"=>$mobile,
    "alternate_mobile"=>$alternate_mobile,
    "email"=>$email,
    "address1"=>$address1,
    "address2"=>$address2,
    "address3"=>$address3,
    "cor_address"=>$cor_address,
    "district"=>$district,
    "state"=>$state,
    "pincode"=>$pincode,
    "religion"=>$religion,
    "category"=>$category,
    "nationality"=>$nationality,
    "h_qualification"=>$h_qualification,
    "subject"=>$subject,
    "passing_date"=>$passing_date,
    "h_percentage"=>$h_percentage,
    "grade"=>$grade,
    "languages"=>$languages,
    "is_read"=>$is_read,
    "is_write"=>$is_write,
    "is_speak"=>$is_speak,
    "zone"=>$zone,
    "post"=>$post,
    "postcode"=>$postcode,
    "disability_cat"=>$disability_cat,
    "disability_type"=>$disability_type,
    "ex_serviceman"=>$ex_serviceman,
    "exam_name"=>$exam_name,
    "serving_defence_per"=>$serving_defence_per,
    "service_period"=>$service_period,
    "created_by"=>$created_by,
    "created_on"=>$created_on,
    "registration_no"=>$registration_no,   
        );
  
        array_push($regs_arr["records"], $reg_item);
    }
  
    // show products data in json format
    echo json_encode($regs_arr);

     // set response code - 200 OK
     http_response_code(200);
}
  
// no products found will be here
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No user found.")
    );
}
?>