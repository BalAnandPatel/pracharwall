<?php

  if(isset($_POST['delete'])){
   
  include "../../constant.php";

  $id = $_POST['id'];

  $file = "../uploads/videos/gallery_video_".$id.".mp4";  

  $url = $URL."gallery/delete_video_gallery.php";

  $data = array('id'=>$id);
  //print_r($data);

  $postdata = json_encode($data);
  $client= curl_init($url);
  curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
  curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
  $response = curl_exec($client);
  //print_r($response);    
  $result = json_decode($response);
  //print_r($result);

  if($result->message=="Record has been deleted."){

   unlink($file);
   $_SESSION["video_delete_success"] = "Successfully Deleted";

  }else{
  header('location:../gallery_video_records.php');
  }

  header('location:../gallery_video_records.php');

  }

?>