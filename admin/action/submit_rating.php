<?php
include "../../constant.php";
if(isset($_POST["rating_data"]))
{

$url = $URL."rating/insert_rating.php";
$read_url = $URL."rating/read_rating.php";

$user_rating = $_POST["rating_data"];
$user_name = ucwords($_POST["user_name"]);
$user_id = $_POST["user_id"];
$business_owner = $_POST["business_owner"];
$user_review = ucfirst($_POST["user_review"]);
$date = time();

// $user_name = "Mrityunjay singh";
// $user_rating = "5";
// $user_id = '10';
// $business_owner = '128';
// $user_review = 'good';
// $date = time();

// $read_data = array("business_owner"=>$business_owner);
// $read_postdata = json_encode($read_data);
// $read_result = giplCurl($read_url,$read_postdata);

// if(isset($read_result->racords[0]->user_id) && $read_result->racords[0]->user_id==$user_id){
// echo "user already given ratings";
// exit();
// }

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
 echo "Your Review & Rating Successfully Submitted";
}

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