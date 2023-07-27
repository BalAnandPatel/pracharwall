<?php
include "../../constant.php";

$id = $_POST['id'];
$file_path = "../image/uploads/img_".$id.".png";

  $url = $URL."user/delete_user.php";

  $data = array('id'=>$id);
  //print_r($data);

  $postdata = json_encode($data);
  $client= curl_init($url);
  curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
  curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
  $response = curl_exec($client);
  print_r($response);    
  $result = json_decode($response);
  print_r($result);

  // if($result->message=="Record has been deleted."){
  //   unlink($file_path);
  //   echo "1";
  // }else{
  //  echo "0";
  // }

?>