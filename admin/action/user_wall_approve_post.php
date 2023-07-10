<?php
include '../../constant.php';

if(isset($_POST["submit"])){

$url=$URL. "user/user_wall_approve.php";

$userId=$_POST["userId"];
$post_wallImg=$_POST["wallImg"]; 
$status=1;
$date = date("Y-m-d h:i:s");

$data = array("status"=>'0');
//print_r($data);
$data = array("userId"=>$userId, "wallImg"=>$post_wallImg, "status"=>$status, "updatedOn"=>$date, "updatedBy"=>$userId);
//print_r($data);
$postdata = json_encode($data);
$result=url_encode_Decode($url,$postdata);
//print_r($result);
header('Location:../new_post_request.php');    
exit();

}

function url_encode_Decode($url,$postdata){
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
// print_r($response);
$result = json_decode($response);
return $result;
}

?>