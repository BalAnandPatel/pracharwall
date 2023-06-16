<?php
include '../../constant.php';
include '../../common/php-jwt/src/JWT.php';
include '../../common/php-jwt/src/ExpiredException.php';
include '../../common/php-jwt/src/SignatureInvalidException.php';
include '../../common/php-jwt/src/BeforeValidException.php';
use \Firebase\JWT\JWT;

$userPass= $_POST["userPass"]; 
$userEmail= $_POST["userEmail"];
$url = $URL."user_login/user_login_read.php";
$data = array("userEmail" =>$userEmail, "userPass" =>$userPass);
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
$decode = (json_decode($response));
//print_r($decode);

//  echo $decode->message;

if($decode->message!=="Request Failed"){

$result = JWT::decode($decode->access_token, $SECRET_KEY, array('HS256'));

if($result->data->userEmail==$_POST['userEmail'] &&
$result->data->userPass==$_POST['userPass'])
{
  $uid=$result->data->id;
  $userEmail=$result->data->userEmail;
  $name=$result->data->userName;
  $userType=$result->data->userType;
  $userRole=$result->data->userRole;

  $_SESSION["USER_ID"]=$uid;
  $_SESSION["USER_EMAIL"]=$userEmail;
  $_SESSION["USER_TYPE"]=$userType;
  $_SESSION["USER_ROLE"]=$userRole;
  $_SESSION["NAME"]=$name;
  $_SESSION["JWT"]=$result;
  $_SESSION['MEMBBER_FROM']=$result->data->createdOn;

if($_SESSION["USER_TYPE"]=='1'){
header('Location:../adm_dashboard.php');
}else if($_SESSION['USER_TYPE']=='2'){
header('Location:../../profile.php');  
}else if($_SESSION['USER_TYPE']=='3'){
header('Location:../../cu_profile.php');  
}

}else{
 $msg="Incorrect User Email or Password"; 
 header('Location:../../index.php');
}
 }else{
  print_r($decode->message);
  header('Location:../../index.php?msg='.$decode->message); 
 }

?>