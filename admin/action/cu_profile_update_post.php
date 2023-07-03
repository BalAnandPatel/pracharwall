<?php
 include "../../constant.php";

 // $userId='69';
 $userId=$_POST["cuId"];
 $businessName="na";
 $businessCategory="na";
 // $userAddress="add";
 $userAddress=ucwords($_POST["cuAddress"]);
 $state="na";
 $userServices = "na";
 $city="na";
 $alterMobile="na";
 $establishmentYear="na";
 $businessTiming="na";
 $paymentMode ="na";
 $businessDay ="na";
 $userWebsite="na";
 $aboutUser="na";
 $updatedOn=date("Y-m-d");
 // $updatedBy="rahul";
 $updatedBy=$_POST["cuId"];
  
 $url = $URL . "user/update_user_profile.php";

 $data = array("userId"=>$userId, "businessName"=>$businessName, "businessCategory"=>$businessCategory, "userAddress"=>$userAddress, "city"=>$city, "state"=>$state, "userServices"=>$userServices, "alterMobile"=>$alterMobile, "establishmentYear"=>$establishmentYear, "businessDay"=>$businessDay, "businessTiming"=>$businessTiming, "paymentMode"=>$paymentMode, "aboutUser"=>$aboutUser, "userWebsite"=>$userWebsite, "updatedOn"=>$updatedOn, "updatedBy"=>$updatedBy);

  //print_r($data);

 $postdata = json_encode($data);
 $result=url_encode_Decode($url,$postdata);
  //print_r($result);
//  if($result->message=="User profile updated successfully"){
//   $_SESSION['profileupdate_success']="Updated successfully"; 
//   header('location:../../profile.php');
//  }else{
//   header('location:../../update_user.php');
//  }   

    

    function url_encode_Decode($url,$postdata){
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
    $response = curl_exec($client);
    print_r($response);
    return $result = json_decode($response);

}


?>