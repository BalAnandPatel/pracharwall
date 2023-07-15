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
include_once '../../objects/user.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$read_rejected_user = new User($db);
  
$data = json_decode(file_get_contents("php://input"));
$read_rejected_user->status = $data->status;
$read_rejected_user->userId = $data->userId;

//print_r($data);

$stmt = $read_rejected_user->readRejectedUsers();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $read_rejected_user_arr=array();
    $read_rejected_user_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     
        extract($row);
  
        $read_rejected_user_item=array(

            "id" => $id,
            "userType"=>$userType,
            "userRole"=>$userRole,
            "businessCategory"=>$businessCategory,
            "userName"=>$userName,
            "userMobile"=>$userMobile,
            "userAddress"=>$userAddress,
            "userEmail"=>$userEmail,
            "status"=>$status,
            "remark"=>$remark,
            "updatedOn"=>$updatedOn,
            "updatedBy"=>$updatedBy 
        );
  
        array_push($read_rejected_user_arr["records"], $read_rejected_user_item);
    }
  
    // show products data in json format
    echo json_encode($read_rejected_user_arr);

     // set response code - 200 OK
     http_response_code(200);
}
  
// no products found will be here
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No rejected user list found.")
    );
}
?>