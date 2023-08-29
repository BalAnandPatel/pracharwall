<?php

  if(isset($_POST['delete'])){
   
  include "../../constant.php";

  $id = $_POST['id'];

  $file = "../image/gallery/gallery_img".$id.".png";  

  $url = $URL."gallery/delete_gallery.php";

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
   $_SESSION["gallery_delete_success"] = "Successfully Deleted";

  }else{
  header('location:../gallery_record.php');
  }

  header('location:../gallery_record.php');

  }

?>