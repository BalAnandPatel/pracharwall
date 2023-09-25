<?php
include "../../constant.php";

if(isset($_POST["review_reply"]) && isset($_SESSION["USER_EMAIL"]))
{

$url = $URL."rating/update_rating_reply.php";
$read_url = $URL."rating/read_rating_by_user_id.php";
$update_url = $URL."rating/update_rating.php";

$review_reply = ucfirst($_POST["review_reply"]);
$business_owner = $_POST["business_owner"];
$review_id = $_POST["review_id"];
$reply_by = $_POST["reply_by"];
$date = time();


$data = array(
"review_reply"=>$review_reply,
"review_id"=>$review_id,
"reply_by"=>$reply_by,
"business_owner"=>$business_owner,
"updated_on"=>$date
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