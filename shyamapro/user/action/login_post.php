<?php
session_start();
include '../../constant.php';
include '../../common/php-jwt/src/JWT.php';
include '../../common/php-jwt/src/ExpiredException.php';
include '../../common/php-jwt/src/SignatureInvalidException.php';
include '../../common/php-jwt/src/BeforeValidException.php';


use \Firebase\JWT\JWT;
$pwd= $_POST["password"]; 
$email= $_POST["email"];
$url = $URL."registration/login.php";
$data = array( "password" =>$pwd, "email" =>$email);
//print_r($data);
$postdata = json_encode($data);
$client = curl_init($url);

curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($client, CURLOPT_CONNECTTIMEOUT, 0); 
curl_setopt($client, CURLOPT_TIMEOUT, 4); //timeout in seconds
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
curl_close($client);
 //print_r($response);

$decode = (json_decode($response));

$result = JWT::decode($decode->access_token, $SECRET_KEY, array('HS256'));
 
 //print_r($result);
if($result->data->message=="Login Successful"){

 $uid=$result->data->id;
 $name=$result->data->full_name;

 $_SESSION["ID"]=$uid;
 $_SESSION["EMAIL"]=$result->data->email;
 $_SESSION["NAME"]=$name;
 $_SESSION["JWT"]=$result;
 $_SESSION['LAST_LOGIN']=$result->data->updated_on;
 $_SESSION['MEMBBER_FROM']=$result->data->created_on;
 header('Location:../dashboard.php');
} else
{
 header('Location:../index.php?msg='.$result->message);
}

function giplCurl($api,$postdata){
   $url = $api; 
    $client = curl_init($url);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
    $response = curl_exec($client);
  //print_r($response);
    return $result = json_decode($response);
}

?>