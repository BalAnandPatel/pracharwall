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
include_once '../../objects/user.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$read_userprofile = new User($db);
  
$data = json_decode(file_get_contents("php://input"));
//print_r($data);

$read_userprofile->userType=$data->userType;
$read_userprofile->id=$data->id;
// $exam->id=$data->id;

$stmt = $read_userprofile->readUserProfile();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $read_userprofiles_arr=array();
    $read_userprofiles_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     
        extract($row);
  
        $read_userprofile_item=array(

            "id"=>$id,
            "userType"=>$userType,
            "userRole"=>$userRole,
            "userName"=>$userName,
            "userEmail"=>$userEmail,
            "userMobile"=>$userMobile,
            "status"=>$status,
            "accountHolder"=>$accountHolder,
            "bankName"=>$bankName,
            "branchName"=>$branchName,
            "ifscCode"=>$ifscCode,
            "googlePayNum"=>$googlePayNum,
            "phonePayNum"=>$phonePayNum,
            "accountNum"=>$accountNum,
            "createdOn"=>$createdOn,
            "createdBy"=>$createdBy 
        );
  
        array_push($read_userprofiles_arr["records"], $read_userprofile_item);
    }
  
    // show products data in json format
    echo json_encode($read_userprofiles_arr);

     // set response code - 200 OK
     http_response_code(200);
}
  
// no products found will be here
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No user profile details found.")
    );
}
?>