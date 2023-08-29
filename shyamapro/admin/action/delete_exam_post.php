<?php

  if(isset($_POST['delete_exam'])){
   
  include "../../constant.php";

  $id = $_POST['id'];

  $url = $URL."exam/delete_exam.php";

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

  header('location:../exam_list.php');

  }

?>