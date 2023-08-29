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

$stmt = $exam->read_exam();
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
            "exam_name"=>$exam_name,
            "type"=>$type,
            "result_date"=>$result_date,
            "exam_date_start"=>$exam_date_start,
            "admit_card_date"=>$admit_card_date,
            "status"=>$status,
            "created_by"=>$created_by,
            "created_on"=>$created_on

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
        array("message" => "No user found.")
    );
}
?>