<?php
include '../../constant.php';

if(isset($_POST["submit"])){

 $farmerName=ucwords($_POST["farmerName"]);
 $farmerMobile=$_POST["farmerMobile"];
 $farmerDistrict=ucfirst($_POST["farmerDistrict"]);
 $farmerMsg=ucfirst($_POST["farmerMsg"]);
 $createdOn=date("Y-m-d h:i:s");
 $createdBy=ucwords($_POST["farmerName"]);

$url=$URL. "registration/farmers_registration.php";

// echo "Not Matchd";
$data = array("farmerName"=>$farmerName,"farmerMobile"=>$farmerMobile, "farmerDistrict"=>$farmerDistrict, 
"farmerMsg"=>$farmerMsg, "createdOn"=>$createdOn, "createdBy"=>$createdBy);

//print_r($data);
$postdata = json_encode($data);
$result=url_encode_Decode($url,$postdata);
//print_r($result);
if($result->message=="Successfull"){
$_SESSION["farmer_reg_success"]="Registred Successfully";    
header('location:../../website/farmers.php');    
}else{
header('location:../../website/farmers.php');    
}

 }

 function url_encode_Decode($url,$postdata){
 $client = curl_init($url);
 curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
 $response = curl_exec($client);
// print_r($response);
 $result = json_decode($response);
 return $result;

}

?>