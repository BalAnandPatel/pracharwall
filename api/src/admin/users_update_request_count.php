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
include_once '../../objects/admin.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$users_update_request_count = new Admin($db);
  
$data = json_decode(file_get_contents("php://input"));
//print_r($data);

$users_update_request_count->userType = $data->userType;
$users_update_request_count->status = $data->status;

$stmt = $users_update_request_count->usersUpdateReqCount();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $users_update_request_counts_arr=array();
    $users_update_request_counts_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     
        extract($row);
  
        $users_update_request_count_item=array(

            "users_update_req"=>$users_update_req

             );
  
        array_push($users_update_request_counts_arr["records"], $users_update_request_count_item);
    }
  
    // show products data in json format
    echo json_encode($users_update_request_counts_arr);

     // set response code - 200 OK
     http_response_code(200);
}
  
// no products found will be here
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No detail found.")
    );
}
?>