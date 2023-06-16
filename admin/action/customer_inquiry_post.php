<?php
include '../../constant.php';
 
 $cuId=$_POST["cuId"];
 $userId=$_POST["userId"];
 $cuName=ucwords($_POST["cuName"]);
 $cuMobile=$_POST["cuMobile"];
 $cuEmail=$_POST["cuEmail"];
 $cuAddress=$_POST["cuAddress"];
 $requiredService=ucfirst($_POST["requiredService"]);
 $createdOn=date("Y-m-d h:i:S");
 $createdBy=$_POST["cuName"];
// $cuName="MS";
//  $cuEmail="ms@gmail.com";
//  $requiredService="serv";
//  $createdOn=date("Y-m-d h:i:S");
//  $createdBy="ms";
 
 $url=$URL. "user/insert_customer_inquiry.php";

 $data = array("cuId"=>$cuId, "userId"=>$userId, "cuName"=>$cuName, "cuMobile"=>$cuMobile, "cuAddress"=>$cuAddress, "cuEmail"=>$cuEmail, "requiredService"=>$requiredService, "createdOn"=>$createdOn, "createdBy"=>$createdBy);

 //print_r($data);
 $postdata = json_encode($data);
 $inquiry_result=url_encode_Decode($url,$postdata);
 //print_r($inquiry_result);
 if($inquiry_result->message=="Successfull"){
 echo "1";
//  header('Location:../../profile_view.php');   
 }else{
 echo "0";    
 }

 // header('Location:../purchase_ticket.php');


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