<?php
include '../../constant.php';


 $userName=ucwords($_POST["userName"]);
 $userType=$_POST['userType'];
 $status='0';
 $userMobile=$_POST["userMobile"];
 $userEmail=$_POST["userEmail"];
 $userPass=$_POST["userPass"];
 $createdOn=date("Y-m-d h:i:s");
 $createdBy=ucwords($_POST["userName"]);

 $url=$URL. "user/insert_user.php";
 $url_maxId=$URL. "user/read_max_userid.php";
 $url_profile=$URL. "user/insert_user_profile.php";
 

 $data = array("userName"=>$userName, "userType"=>$userType, "status"=>$status, "userMobile"=>$userMobile, "userEmail"=>$userEmail, "userPass"=>$userPass, "createdOn"=>$createdOn, "createdBy"=>$createdBy);

//print_r($data);
$postdata = json_encode($data);
$result=url_encode_Decode($url,$postdata);
//print_r($result);

if($result->message=="Successfull"){

$data_maxId = array();
//print_r($data_maxId);
$postdata_maxid = json_encode($data_maxId);
$result_maxid=url_encode_Decode($url_maxId,$postdata_maxid);
//print_r($result_maxid);
$userId = $result_maxid->records[0]->userId;

$data_profile = array("userId"=>$userId, "status"=>$status, "createdOn"=>$createdOn, "createdBy"=>$createdBy);
//print_r($data_profile);
$postdata_profile = json_encode($data_profile);
$result_profile=url_encode_Decode($url_profile,$postdata_profile);
//print_r($postdata_profile);


$_SESSION['user_reg_success']="You have successfully registered.";
header('location:../../index.php');
}else{
$_SESSION['user_reg_error']="User already registered.";  
header('location:../../index.php');  
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