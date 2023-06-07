<?php
include "../../constant.php";
$url_profile = $URL . "user/read_user_profile.php";
$userType='2';
$status = '0';

// read user profile detais
// if(isset($_POST["userId"])){
$userId=$_POST["userId"];

$data_profile = array("status"=>$status, "userType"=>$userType, "id"=>$userId);
//print_r($data);
$postdata_profile = json_encode($data_profile);
$profile_result = giplCurl($url_profile,$postdata_profile);
// print_r($profile_result);
// }

function giplCurl($url,$postdata){
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($client, CURLOPT_POST, 5);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
print_r($response);
// return $result = json_decode($response);
}
?>