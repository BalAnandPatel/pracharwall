<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../../config/database.php';
  
// instantiate reg_farmers object
include_once '../../objects/registration.php';
  
$database = new Database();
$db = $database->getConnection();
  
$reg_farmers = new registration($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);  
// make sure data is not empty
if(
    
    !empty($data->farmerName) &&
    !empty($data->farmerMobile) &&
    !empty($data->farmerDistrict) &&
    !empty($data->farmerMsg) &&
    !empty($data->createdOn) &&
    !empty($data->createdBy) 
)

{
    $reg_farmers->farmerName = $data->farmerName;
    $reg_farmers->farmerMobile = $data->farmerMobile;
    $reg_farmers->farmerDistrict = $data->farmerDistrict;
    $reg_farmers->farmerMsg = $data->farmerMsg;
    $reg_farmers->createdOn = $data->createdOn;
    $reg_farmers->createdBy = $data->createdBy;
    
    //var_dump($reg_farmers);
    // create the reg_farmers
    if($reg_farmers->farmersRegistration()){

        http_response_code(201);
        echo json_encode(array("message" => "Successfull"));
    }
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create farmers registration"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create farmers registration. Data is incomplete."));
}
?>