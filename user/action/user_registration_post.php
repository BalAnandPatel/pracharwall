<?php
include '../../constant.php';

if(isset($_POST["submit"])){

 $userName=ucwords($_POST["userName"]);
 $userType=$_POST['userType'];
 $status='0';
 $userMobile=$_POST["userMobile"];
 $userEmail=$_POST["userEmail"];
 $userPass=$_POST["userPass"];
 $createdOn=date("Y-m-d h:i:s");
 $createdBy=ucwords($_POST["userName"]);

 $url=$URL. "user/insert_user.php";
 $max_userid_url=$URL. "user/read_max_userid.php";
 $user_account_url=$URL. "user/insert_user_account.php";

$data = array("userName"=>$userName, "userType"=>$userType, "status"=>$status, "userMobile"=>$userMobile, "userEmail"=>$userEmail, "userPass"=>$userPass, "createdOn"=>$createdOn, "createdBy"=>$createdBy);

//print_r($data);
$postdata = json_encode($data);
$result=url_encode_Decode($url,$postdata);
//print_r($result);

if($result->message=="Successfull"){
$_SESSION['user_reg_success']="You have successfully registered.";
header('location:../../index.php');
}else{
$_SESSION['user_reg_error']="User already registered.";  
header('location:../../index.php');  
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