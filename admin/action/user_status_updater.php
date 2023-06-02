<?php
include '../../constant.php';

if(isset($_POST["submit"])){

$remark=$_POST["remark"];
$userId=$_POST["userId"];
$status=$_POST["status"];
 
 $url=$URL. "user/update_user_status.php";

 $data = array("userId"=>$userId, "remark"=>$remark, "status"=>$status);

 //print_r($data);
 $postdata = json_encode($data);
 $result=url_encode_Decode($url,$postdata);
 //print_r($result);

 header('Location:../user_registration_list.php');

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