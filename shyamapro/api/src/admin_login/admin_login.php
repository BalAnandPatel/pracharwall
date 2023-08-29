<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require '../../../constant.php';
include_once '../../config/database.php';
include_once '../../objects/admin_login.php';
require '../../../common/php-jwt/src/JWT.php';
require '../../../common/php-jwt/src/ExpiredException.php';
require '../../../common/php-jwt/src/SignatureInvalidException.php';
require '../../../common/php-jwt/src/BeforeValidException.php';
use \Firebase\JWT\JWT;

 $issuedat_claim = time(); // issued at
 $notbefore_claim = $issuedat_claim ; //not before in seconds
 $expire_claim = $issuedat_claim + 30; // expire time in seconds

$database = new Database();
$db = $database->getConnection();

$login = new Admin($db);

$data = json_decode(file_get_contents("php://input"));
//print_r($data);

$login->userName = $data->userName;
$login->password = $data->password;
//$login->updated_on=date('Y-m-d H:i:s');

$stmt = $login->adm_login();
$num = $stmt->rowCount();
if($num>0){       
        
if ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
       // var_dump($row);
        extract($row);
	$token = array(
            "iss" => $ISSUER_CLAIM,
            "aud" => $AUDIENCE_CLAIM,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => array(
                "message" => $LOGIN_SUCCESS_MSG,
                "userName" => $userName,
                "fullName" =>$fullName,
                "password" =>$password,
                "id"=>$id,
                "createdOn"=>$createdOn
                
               
        ));
	//var_dump($token);
   $jwt = JWT::encode($token, $SECRET_KEY);     
   
        echo json_encode(
            array(
                "access_token" => $jwt
            ));
        }
        http_response_code(200);
}

else{

        http_response_code(401);
        echo json_encode(array("message"=>$LOGIN_FAILED_MSG));
}

?>