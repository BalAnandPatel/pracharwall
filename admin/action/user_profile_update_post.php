<?php
 include "../../constant.php";
if(isset($_POST["update_profile"])){
    
 $userId=$_POST["userId"];
 $businessName=ucwords($_POST["businessName"]);
 $businessCategory=ucwords($_POST["businessCategory"]);
 $userAddress=ucwords($_POST["userAddress"]);
 $state=ucwords($_POST["state"]);
 $city=ucwords($_POST["city"]);
 $alterMobile=strtoupper($_POST["alterMobile"]);
 $establishmentYear=$_POST["establishmentYear"];
 $businessTiming=ucwords($_POST["businessTiming"]);
 $paymentMode =implode(", ", $_POST["paymentMode"]);
 $businessDay =implode(" - ", $_POST["businessDay"]);
 $userWebsite=$_POST["userWebsite"];
 $userServices=ucwords($_POST["userServices"]);
 $aboutUser=$_POST["aboutUser"];
 $history_status=$_POST["pre_status"];
 $status="0";
 $updatedOn=date("Y-m-d");
 $updatedBy=$_POST["userId"];


  
 $url = $URL . "user/update_user_profile.php";
 $url_profile_history=$URL. "user/insert_user_profile_history.php";
 $profile_url = $URL . "user/read_allusers_list.php";

$profile_data = array("status"=>'0', "userType"=>'2', "userId"=>$userId);
//print_r($profile_data);
$profile_postdata = json_encode($profile_data);
$profile_result = url_encode_Decode($profile_url,$profile_postdata);
 // print_r($profile_result);


if(isset($profile_result->records[0]->status)){
$pre_profile_status = $profile_result->records[0]->status;
}else{
$pre_profile_status="";    
}

if($pre_profile_status=="0"){

 // update user profile
 $data = array("userId"=>$userId, "businessName"=>$businessName, "businessCategory"=>$businessCategory, "userAddress"=>$userAddress, "city"=>$city, "state"=>$state, "alterMobile"=>$alterMobile, "establishmentYear"=>$establishmentYear, "businessDay"=>$businessDay, "businessTiming"=>$businessTiming, "paymentMode"=>$paymentMode, "aboutUser"=>$aboutUser, "userServices"=>$userServices, "userWebsite"=>$userWebsite,
     "status"=>$status, "updatedOn"=>$updatedOn, "updatedBy"=>$updatedBy);

// print_r($data);

 $postdata = json_encode($data);
 $result=url_encode_Decode($url,$postdata);
 //print_r($result);
 
 // create user profile update history

  $profile_history_data = array("userId"=>$userId, "businessName"=>$businessName, "businessCategory"=>$businessCategory, "userAddress"=>$userAddress, "city"=>$city, "state"=>$state, "alterMobile"=>$alterMobile, "establishmentYear"=>$establishmentYear, "businessDay"=>$businessDay, "businessTiming"=>$businessTiming, "paymentMode"=>$paymentMode, "aboutUser"=>$aboutUser, "userServices"=>$userServices, "userWebsite"=>$userWebsite, "status"=>'5', "history_status"=>$history_status, "updatedOn"=>$updatedOn, "updatedBy"=>$updatedBy);

// print_r($data);

 $profile_history_postdata = json_encode($profile_history_data);
 $profile_history_result=url_encode_Decode($url_profile_history,$profile_history_postdata);
 //print_r($profile_history_result);

}else{

// create user profile update history

  $profile_history_data = array("userId"=>$userId, "businessName"=>$businessName, "businessCategory"=>$businessCategory, "userAddress"=>$userAddress, "city"=>$city, "state"=>$state, "alterMobile"=>$alterMobile, "establishmentYear"=>$establishmentYear, "businessDay"=>$businessDay, "businessTiming"=>$businessTiming, "paymentMode"=>$paymentMode, "aboutUser"=>$aboutUser, "userServices"=>$userServices, "userWebsite"=>$userWebsite, "status"=>$status, "history_status"=>$history_status, "updatedOn"=>$updatedOn, "updatedBy"=>$updatedBy);

// print_r($data);

 $profile_history_postdata = json_encode($profile_history_data);
 $profile_history_result=url_encode_Decode($url_profile_history,$profile_history_postdata);
 //print_r($profile_history_result);
}

 if($result->message=="User profile updated successfully"){
  $_SESSION['profileupdate_success']="Updated successfully"; 
  header('location:../../profile.php');
 }else{
  header('location:../../update_user.php');
 }   

}
    

    function url_encode_Decode($url,$postdata){
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
    $response = curl_exec($client);
    //print_r($response);
    return $result = json_decode($response);

}


?>