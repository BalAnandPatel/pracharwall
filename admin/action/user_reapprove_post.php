<?php
include '../../constant.php';

if(isset($_POST["submit"])){

$url=$URL. "user/update_user_approve.php";
$url_profile = $URL . "user/read_user_profile.php";
$url_update = $URL . "user/update_user_profile.php";
$userType='2';
$userId=$_POST["userId"]; 
$status=0;

// read resent profile updated details

$data_profile = array("status"=>$status, "userType"=>$userType, "id"=>$userId);
//print_r($data);
$postdata_profile = json_encode($data_profile);
$profile_result = url_encode_Decode($url_profile,$postdata_profile);
//print_r($profile_result);

if($profile_result->records[0]->id==$userId){

// update user profile updated details

 $userId=$profile_result->records[0]->id;
 $businessName=$profile_result->records[0]->businessName;
 $businessCategory=$profile_result->records[0]->categoryId;
 $userAddress=$profile_result->records[0]->userAddress;
 $state=$profile_result->records[0]->state;
 $city=$profile_result->records[0]->city;
 $alterMobile=$profile_result->records[0]->alterMobile;
 $establishmentYear=$profile_result->records[0]->establishmentYear;
 $businessTiming=$profile_result->records[0]->businessTiming;
 $paymentMode =$profile_result->records[0]->paymentMode;
 $businessDay =$profile_result->records[0]->businessDay;
 $userWebsite=$profile_result->records[0]->userWebsite;
 $userServices=$profile_result->records[0]->userServices;
 $aboutUser=$profile_result->records[0]->aboutUser;
 $status="1";
 $remark="Approved";
 $updatedOn=date("Y-m-d");
 $updatedBy=$profile_result->records[0]->id;

$data = array("userId"=>$userId, "businessName"=>$businessName, "businessCategory"=>$businessCategory, "userAddress"=>$userAddress, "city"=>$city, "state"=>$state, "alterMobile"=>$alterMobile, "establishmentYear"=>$establishmentYear, "businessDay"=>$businessDay, "businessTiming"=>$businessTiming, "paymentMode"=>$paymentMode, "aboutUser"=>$aboutUser, "userServices"=>$userServices, "userWebsite"=>$userWebsite,
     "status"=>$status, "remark"=>$remark, "updatedOn"=>$updatedOn, "updatedBy"=>$updatedBy);

// print_r($data);
$postdata = json_encode($data);
$result=url_encode_Decode($url_update,$postdata);
//print_r($result);    
 
$ph_data = array("userId"=>$userId, "remark"=>$remark, "status"=>$status);

//print_r($data);
$ph_postdata = json_encode($ph_data);
$ph_result=url_encode_Decode($url,$ph_postdata);
//print_r($ph_result);
header('Location:../users_update_list.php');
exit();
}

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