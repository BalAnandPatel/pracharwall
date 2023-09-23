<?php
include "../../constant.php";

if(isset($_POST["user_reply"]) && isset($_SESSION["USER_EMAIL"]))
{

$url = $URL."rating/insert_rating_reply.php";
$read_url = $URL."rating/read_rating_by_user_id.php";
$update_url = $URL."rating/update_rating.php";

$review_id = $_POST["review_id"];
$user_reply = $_POST["user_reply"];
$user_id = $_POST["user_id"];
$business_owner = $_POST["business_owner"];
$date = time();
$created_by = $_POST["business_owner"];


// $read_data = array("business_owner"=>$business_owner,"user_id"=>$user_id);
// $read_postdata = json_encode($read_data);
// $read_result = giplCurl($read_url,$read_postdata);
//print_r($read_result);

// if(isset($read_result->records[0]->user_id) && $read_result->records[0]->user_id==$user_id){
// // echo "user already given ratings";
// $update_data = array(
// "user_name"=>$user_name,
// "user_id"=>$user_id,
// "business_owner"=>$business_owner,
// "user_rating"=>$user_rating,
// "user_review"=>$user_review,
// "created_on"=>$date
// );

// // print_r($update_data);

// $update_postdata = json_encode($update_data);
// $update_result = giplCurl($update_url,$update_postdata);

// if($update_result->message=="successfully_updated"){
//  echo "Your Review & Rating Successfully Submitted";
// }
// exit();
// }

$data = array(
"review_id"=>$review_id,
"user_reply"=>$user_reply,
"user_id"=>$user_id,
"business_owner"=>$business_owner,
"created_on"=>$date,
"created_by"=>$created_by
);

// print_r($data);

$postdata = json_encode($data);
$result = giplCurl($url,$postdata);
//print_r($result);

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
//print_r($response);
$result = json_decode($response);
return $result;	
}
?>