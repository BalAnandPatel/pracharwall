<?php
include '../../constant.php';

if(isset($_SESSION["USER_ID"])){

 $userPass=$_POST["userPass"];
 $id=$_SESSION["USER_ID"];  
 $userType=$_SESSION["USER_TYPE"];

 $url=$URL. "user_login/update_user_password.php";
 $data = array("userPass"=>$userPass, "userType"=>$userType, "id"=>$id);

 //print_r($data);
 $postdata = json_encode($data);
 $result=url_encode_Decode($url,$postdata);
 //print_r($result);
 if($result->message=="User password updated successfully"){
 header('Location:../adm_dashboard.php');
 $_SESSION['change_userpass_success']="Password cheanged successfully";
 } 
 header('Location:../adm_dashboard.php');
  }else{
  header('Location:../adm_dashboard.php');
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