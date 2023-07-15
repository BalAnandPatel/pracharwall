<?php
include '../../constant.php';

if(isset($_POST["submit"])){

$remark=ucfirst($_POST['remark']);
$userId=$_POST["userId"];
$status=2;
$date=date("Y-m-d h:i:s");
$rejectedBy="Admin"; 
$url=$URL. "user/update_user_reject.php";

 $data = array("userId"=>$userId, "remark"=>$remark, "status"=>$status, "updatedOn"=>$date, "updatedBy"=>$date);

 //print_r($data);
 $postdata = json_encode($data);
 $result=url_encode_Decode($url,$postdata);
 //print_r($result);

 header('Location:../users_update_list.php');

 }

 function url_encode_Decode($url,$postdata){
 $client = curl_init($url);
 curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
 $response = curl_exec($client);
 //print_r($response);
 $result = json_decode($response);
 return $result;

}

?>