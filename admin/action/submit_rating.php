<?php
include "../../constant.php";

if(isset($_POST["rating_data"]) && isset($_SESSION["USER_EMAIL"]))
{

$url = $URL."rating/insert_rating.php";
$read_url = $URL."rating/read_rating_by_user_id.php";
$update_url = $URL."rating/update_rating.php";

$user_rating = $_POST["rating_data"];
$user_name = ucwords($_POST["user_name"]);
$user_id = $_POST["user_id"];
$business_owner = $_POST["business_owner"];
$user_review = ucfirst($_POST["user_review"]);
$date = time();

// $user_name = "Mrityunjay singh";
// $user_rating = "5";
// $user_id = '128';
// $business_owner = '129';
// $user_review = 'good';
// $date = time();

$read_data = array("business_owner"=>$business_owner,"user_id"=>$user_id);
$read_postdata = json_encode($read_data);
$read_result = giplCurl($read_url,$read_postdata);
//print_r($read_result);

if(isset($read_result->records[0]->user_id) && $read_result->records[0]->user_id==$user_id){
// echo "user already given ratings";
$update_data = array(
"user_name"=>$user_name,
"user_id"=>$user_id,
"business_owner"=>$business_owner,
"user_rating"=>$user_rating,
"user_review"=>$user_review,
"created_on"=>$date
);

// print_r($update_data);

$update_postdata = json_encode($update_data);
$update_result = giplCurl($update_url,$update_postdata);

if($update_result->message=="successfully_updated"){
 echo "Your Review & Rating Successfully Submitted";
}
exit();
}

$data = array(
"user_name"=>$user_name,
"user_id"=>$user_id,
"business_owner"=>$business_owner,
"user_rating"=>$user_rating,
"user_review"=>$user_review,
"created_on"=>$date
);

// print_r($data);

$postdata = json_encode($data);
$result = giplCurl($url,$postdata);

if($result->message=="Successfull"){
 echo "success";
}

}else{
echo "session_expire";	
}

function giplCurl($url,$postdata){
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
// print_r($response);
$result = json_decode($response);
return $result;	
}
?>