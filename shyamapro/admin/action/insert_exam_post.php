<?php
include '../../constant.php';

if(isset($_POST["exam_name"])){

 $exam_name=strtoupper($_POST["exam_name"]);
 $type=ucfirst($_POST["type"]);
 $general_fee=$_POST["general_fee"];
 $obc_fee=$_POST["obc_fee"];
 $sc_fee=$_POST["sc_fee"];
 $st_fee=$_POST["st_fee"];
 $ews_fee=$_POST["ews_fee"];
 $eligibility=ucfirst($_POST["eligibility"]);
 $total_post=$_POST["total_post"];
 $age=$_POST["age"];
 $exam_date_start=date("d-m-Y", strtotime($_POST["exam_date_start"]));
 $exam_date_end=date("d-m-Y", strtotime($_POST["exam_date_end"]));
 $admit_card_date=date("d-m-Y", strtotime($_POST["admit_card_date"]));
 $result_date=date("d-m-Y", strtotime($_POST["result_date"]));
 $created_on=date("Y-m-d h:i:s");
 $url=$URL. "exam/insert_exam.php";
 $read_exam_url=$URL. "exam/read_only_examname.php";
 $read_exam_data = array("exam_name"=>$exam_name);
  //print_r($data);
  $read_exam_postdata = json_encode($read_exam_data);
  $read_exam_result=url_encode_Decode($read_exam_url,$read_exam_postdata);
  //print_r($read_exam_result);
  $check_exam=$read_exam_result->records[0]->exam_name;
  $text=strcmp($check_exam,$exam_name);
  //echo $text;
  //print_r($check_exam);
  if($read_exam_result->message="No exam name found" && $text!='0'){

// echo "Not Matchd";
$data = array("exam_name"=>$exam_name,"general_fee"=>$general_fee, "obc_fee"=>$obc_fee, "sc_fee"=>$sc_fee, "st_fee"=>$st_fee, "ews_fee"=>$ews_fee, "eligibility"=>$eligibility, 
"total_post"=>$total_post, "type"=>$type, "age"=>$age, "exam_date_start"=>$exam_date_start,
"admit_card_date"=>$admit_card_date, "result_date"=>$result_date, "status"=>"1", "created_by"=>"Admin",
"exam_date_end"=>$exam_date_end, "created_on"=>$created_on);

//print_r($data);
$postdata = json_encode($data);
$result=url_encode_Decode($url,$postdata);
//print_r($result);
 if($result->message=="Successfull"){
 $msg="Successfully Created";
 $_SESSION["exam_post_success"]=$msg;   
 header('Location:../exam_list.php');
 }else{
 header('Location:../insert_exam.php');
 } 
  }else{
 $msg="Sorry, Post already exists.";
 $_SESSION["exam_post_faild"]=$msg;
 header('location:../insert_exam.php');
  }

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