<?php
include '../../constant.php';

 // $userId=$_SESSION["USER_ID"];
 $cuName=$_POST["cuName"];
 $cuEmail=$_POST["cuEmail"];
 $requiredService=$_POST["requiredService"];
 $createdOn=date("Y-m-d h:i:S");
 $createdBy=$_POST["cuName"];
// $cuName="MS";
//  $cuEmail="ms@gmail.com";
//  $requiredService="serv";
//  $createdOn=date("Y-m-d h:i:S");
//  $createdBy="ms";
 
 $url=$URL. "user/insert_customer_inquiry.php";

 $data = array("cuName"=>$cuName, "cuEmail"=>$cuEmail, "requiredService"=>$requiredService, "createdOn"=>$createdOn, "createdBy"=>$createdBy);

 //print_r($data);
 $postdata = json_encode($data);
 $inquiry_result=url_encode_Decode($url,$postdata);
 //print_r($inquiry_result);
 if($inquiry_result=="Successfull"){
 $_SESSION['inquiry_msg']="Inquiry sent successfully";
 header('Location:../../profile_view.php');   
 }else{
 $_SESSION['inquiry_msg']="faild";    
 }

 // header('Location:../purchase_ticket.php');


 function url_encode_Decode($url,$postdata){
 $client = curl_init($url);
 curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
 $response = curl_exec($client);
 print_r($response);
 $result = json_decode($response);
 return $result;

}

?>