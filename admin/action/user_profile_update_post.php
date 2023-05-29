<?php
 include "../../constant.php";
if(isset($_POST["update_profile"])){	
 
 $userId=$_POST["userId"];
 $accountHolder=ucwords($_POST["accountHolder"]);
 $bankName=ucwords($_POST["bankName"]);
 $branchName=ucwords($_POST["branchName"]);
 $ifscCode=strtoupper($_POST["ifscCode"]);
 $accountNum=$_POST["accountNum"];
 $phonePayNum=$_POST["phonePayNum"];
 $googlePayNum=$_POST["googlePayNum"];
 $updatedOn=date("Y-m-d");
 $updatedBy=$_POST["userId"];

 $url = $URL . "user/update_user_profile.php";

 $data = array("userId"=>$userId, "accountHolder"=>$accountHolder, "bankName"=>$bankName, "branchName"=>$branchName, "ifscCode"=>$ifscCode, "accountNum"=>$accountNum, "phonePayNum"=>$phonePayNum, "googlePayNum"=>$googlePayNum, "updatedOn"=>$updatedOn, "updatedBy"=>$updatedBy);

  //print_r($data);

 $postdata = json_encode($data);
 $result=url_encode_Decode($url,$postdata);
 //print_r($result);
 if($result->message=="User profile updated successfully"){
   $_SESSION['profileupdate_success']="Updated successfully"; 
   header('location:../user_profile.php');
 }else{
  header('location:../user_profile_update.php');
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