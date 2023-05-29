<?php
include '../../constant.php';
if(isset($_POST['submit'])){

$serviceName=$_POST["serviceName"];
$serviceType=$_POST["serviceType"];
$email=$_POST["email"];
$city=$_POST["city"];
$mobile=$_POST["mobile"];
$description=$_POST["description"];
$status='1';
$createdOn=date("Y-m-d H:i:s");
$createdBy="Costo";


$url = $URL."user/insert_register_wall.php";

$data = array(

  "serviceName" => $serviceName,
  "serviceType" =>$serviceType,
  "email" =>$email,
  "city" =>$city,
  "mobile" => $mobile, 
  "description" => $description,
  "status" => $status,
  "createdOn" => $createdOn,
  "createdBy" => $createdBy
);

//  print_r($data);
$postdata = json_encode($data);

$result_ticket=url_encode_Decode($url,$postdata);
print_r($result_ticket);

// if($result_ticket->message=="Successfull"){
// header('location:../ticket_entry.php');
// $_SESSION['ticket_entry_success']="Ticket creted Successfully";
// }else{
// header('location:../ticket_entry.php');
// }

}


function url_encode_Decode($url,$postdata){
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
print_r($response);
return $result = json_decode($response);

}


?>