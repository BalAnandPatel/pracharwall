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
include_once '../../objects/admin.php';
  
$database = new Database();
$db = $database->getConnection();
  
$update_category = new Admin($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
// print_r($data);  
// make sure data is not empty
if(

   !empty($data->businessCategory) 
)

{
    $update_category->id = $data->categoryId;
    $update_category->businessCategory = $data->businessCategory;
    $update_category->subCategory = $data->subCategory;
    $update_category->status = $data->status;
    $update_category->updatedOn = $data->updatedOn;
    $update_category->updatedBy = $data->updatedBy;

    
    //var_dump($reg);
    // create the reg
    if($update_category->updateBusinessCategory()){

        http_response_code(201);
        echo json_encode(array("message" => "Successfully updated"));
    }
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update category"));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update category, Data is incomplete."));
}
?>