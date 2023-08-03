<?php
include "../../constant.php";

$id = $_POST['userId'];
$user_file_path = "../image/user_profile/".$id."/user_img_".$id.".png";
$wall_file_path = "../image/walluploads/".$id."/";

  // Get user's business banner img to be deleted
  $wall_url = $URL."user/read_user_wall.php";
  $wall_data = array("status"=>'1',"userId"=>$id);
  //print_r($wall_data);
  $wall_postdata = json_encode($wall_data);
  $wall_result = giplCurl($wall_url,$wall_postdata);
  $wall_img = $wall_result->records[0]->wallImg;

  $url = $URL."user/delete_user.php";
  $data = array('id'=>$id);
  //print_r($data);
  $postdata = json_encode($data);
  $result = giplCurl($url,$postdata);
  // print_r($result);

  if(file_exists($user_file_path)){
  unlink($user_file_path); 
  }

  if(file_exists($wall_file_path.$wall_img)){
  unlink($wall_file_path.$wall_img); 
  }

  if(is_dir('../image/walluploads/'.$id)){
    rmdir('../image/walluploads/'.$id); 
  }

  if(is_dir('../image/user_profile/'.$id)){
    rmdir('../image/user_profile/'.$id); 
  }

  if($result->message=="Record has been deleted."){

  $_SESSION['user_delete_msg']="User deleted successfully";
  header('location:../approved_users_list.php');
  }else{
  header('location:../approved_users_list.php');
  }

  function giplCurl($url,$postdata){
  $client= curl_init($url);
  curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
  curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
  $response = curl_exec($client);
  // print_r($response);    
  $result = json_decode($response);
  return $result;
  }

?>