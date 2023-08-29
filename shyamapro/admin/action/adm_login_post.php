<?php
include '../../constant.php';
include '../../common/php-jwt/src/JWT.php';
include '../../common/php-jwt/src/ExpiredException.php';
include '../../common/php-jwt/src/SignatureInvalidException.php';
include '../../common/php-jwt/src/BeforeValidException.php';
use \Firebase\JWT\JWT;

$pwd= $_POST["password"]; 
$userName= $_POST["userName"];
$url = $URL."admin_login/admin_login.php";
$data = array("userName" =>$userName, "password" =>$pwd);
//print_r($data);
$postdata = json_encode($data);
$client = curl_init($url);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($client, CURLOPT_CONNECTTIMEOUT, 0); 
curl_setopt($client, CURLOPT_TIMEOUT, 4); //timeout in seconds
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
// curl_close($client);
//print_r($response);
$decode = json_decode($response);
  // print_r($decode->data->message);    
//  exit();
if(isset($decode->access_token)){
  //echo "hello";
  $result = JWT::decode($decode->access_token, $SECRET_KEY, array('HS256'));
  // print_r($result);
  $u_name=$result->data->userName;
  $password=$result->data->password;
  $uid=$result->data->id;
  $name=$result->data->fullName;
  
  if($userName==$_POST["userName"] && $password==$_POST["password"]){
    $_SESSION["ID"]=$uid;
    $_SESSION["USERNAME"]=$userName;
    $_SESSION["NAME"]=$name;
    $_SESSION["JWT"]=$result;
    $_SESSION['MEMBBER_FROM']=$result->data->createdOn;
   //print_r($_SESSION['SPONSOR_ID']);
  
    header('Location:../adm_dashboard.php');
  }

 }else{
 $_SESSION["login_faild_msg"]="Request Failed! Please try again";
 header('Location:../index.php');
 }

// function giplCurl($api,$postdata){
//    $url = $api; 
//    $client = curl_init($url);
//     curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
//     curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
//     $response = curl_exec($client);
//   //  print_r($response);
//     return $result = json_decode($response);
// }

?>