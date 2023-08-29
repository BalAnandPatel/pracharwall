<?php

  if(isset($_POST['delete'])){
   
  include "../../constant.php";

  $id = $_POST['id'];

  $file = "../image/".$id."/pdf/".$id.".pdf";

  $url = $URL."notification/delete_notification.php";

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
   rmdir("../image/".$id."/pdf");
   rmdir("../image/".$id);

  }else{
  header('location:../notification_list.php');
  }

  header('location:../notification_list.php');

  }

?>