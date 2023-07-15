<?php
include '../../constant.php';

if(isset($_POST["submit"])){

$url=$URL. "user/update_user_wall_status.php";
$get_url = $URL."user/read_user_wall.php";

$userId=$_POST["userId"];
$post_wallImg=$_POST["wallImg"]; 
$status=1;
$remark="Approved";

// get pre uploaded wall image 
$get_data = array("status"=>'1', "userId"=>$userId);
//print_r($get_data);
$get_postdata = json_encode($get_data);
$get_result = url_encode_Decode($get_url,$get_postdata);
// print_r($get_result);
$pre_wall_img = $get_result->records[0]->wallImg;

$data = array("userId"=>$userId, "remark"=>$remark, "wallImg"=>$post_wallImg, "status"=>$status);
//print_r($data);
$postdata = json_encode($data);
$result=url_encode_Decode($url,$postdata);
//print_r($result);
unlink("../image/walluploads/".$userId."/".$pre_wall_img);
header('Location:../post_update_history.php');    
exit();

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