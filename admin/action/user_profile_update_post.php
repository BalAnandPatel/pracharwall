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
 $businessTiming=$_POST["businessTiming"];
 $paymentMode =implode(", ", $_POST["paymentMode"]);
 $businessDay =implode(" - ", $_POST["businessDay"]);
 $userWebsite=$_POST["userWebsite"];
 $aboutUser=$_POST["aboutUser"];
 $updatedOn=date("Y-m-d");
 $updatedBy=$_POST["userId"];
  
 $url = $URL . "user/update_user_profile.php";

 $data = array("userId"=>$userId, "businessName"=>$businessName, "businessCategory"=>$businessCategory, "userAddress"=>$userAddress, "city"=>$city, "state"=>$state, "alterMobile"=>$alterMobile, "establishmentYear"=>$establishmentYear, "businessDay"=>$businessDay, "businessTiming"=>$businessTiming, "paymentMode"=>$paymentMode, "aboutUser"=>$aboutUser, "userWebsite"=>$userWebsite, "updatedOn"=>$updatedOn, "updatedBy"=>$updatedBy);

  //print_r($data);

 $postdata = json_encode($data);
 $result=url_encode_Decode($url,$postdata);
 //print_r($result);
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