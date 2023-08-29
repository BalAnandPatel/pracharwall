<?php
include '../../constant.php';

if(isset($_POST["submit"])){

 $user_id=$_POST["user_id"];
 $amount=$_POST["amount"];
 $transaction_id=$_POST["transaction_id"];
 $status='1';
 $request_id=$_POST["request_id"];
 $created_by="user";
 $created_on=date('d-m-y');


 $url=$URL. "payment/payment_entry.php";
 $data = array("user_id"=>$user_id,"amount"=>$amount, "transaction_id"=>$transaction_id, 
 "status"=>$status, "request_id"=>$request_id, "created_by"=>$created_by, "created_on"=>$created_on);

 //print_r($data);
 $postdata = json_encode($data);
 $result=url_encode_Decode($url,$postdata);
 //print_r($result);
 header('Location:../payment_entry.php');
 }

 function url_encode_Decode($url,$postdata){
 $client = curl_init($url);
 curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
 $response = curl_exec($client);
 //print_r($response);
 $result = json_decode($response);
 return $result;

}

?>