<?php
include '../../constant.php';

if(isset($_POST["full_name"])){
 $id=$_POST["id"];
$full_name=strtoupper($_POST["full_name"]);
$father_name=strtoupper($_POST["father_name"]);
$mother_name=strtoupper($_POST["mother_name"]);
$marital_status=$_POST["marital_status"];
$spouse_name=$_POST["spouse_name"];
$dob=date("Y-m-d", strtotime($_POST["dob"]));
$gender=strtoupper($_POST["gender"]);
$email=$_POST["email"];
$mobile=$_POST["mobile"];
$alternate_mobile=$_POST["alternate_mobile"];
$address1=strtoupper($_POST["address1"]);
$address2=strtoupper($_POST["address2"]);
$address3=strtoupper($_POST["address3"]);
$cor_address=strtoupper($_POST["cor_address"]);
$district=strtoupper($_POST["district"]);
$state=strtoupper($_POST["state"]);
$pincode=$_POST["pincode"];
$religion=strtoupper($_POST["religion"]);
$category=strtoupper($_POST["category"]);
$nationality=strtoupper($_POST["nationality"]);
$h_qualification=strtoupper($_POST["h_qualification"]);
$subject=strtoupper($_POST["subject"]);
$passing_date=date("Y-m-d", strtotime($_POST["passing_date"]));
$h_percentage=$_POST["h_percentage"];
$grade=$_POST["grade"];
$languages=strtoupper($_POST["languages"]);
$is_read=$_POST["is_read"];
$is_write=$_POST["is_write"];
$is_speak=$_POST["is_speak"];
$disability_cat=$_POST["disability_cat"];
$disability_type=$_POST["disability_type"];
$ex_serviceman=$_POST["ex_serviceman"];
$serving_defence_per=$_POST["serving_defence_per"];
$service_period=$_POST["service_period"];
$registration_no =$_POST["registration_no"];
$exam_name=$_POST["exam_name"];
$password= date("dmY", strtotime($dob));

$url = $URL . "registration/update_registration.php";

$data = array( "id"=>$id,
  "full_name" => $full_name,  "father_name" => $father_name,  "mother_name" => $mother_name, 
  "status"=>"0","admit_card"=>"0","result"=>"0","password"=>$password, "spouse_name" => $spouse_name, 
  "marital_status"=>$marital_status, "dob" => $dob,  "gender" => $gender, "email" => $email, "mobile" => $mobile, 
  "alternate_mobile" => $alternate_mobile,   "address1" => $address1,  "address2" => $address2, 
   "address3" => $address3,
   "cor_address"=>$cor_address, "district" => $district,  "state" => $state,  
     "pincode" => $pincode,
    "religion" => $religion,  "category" => $category,"nationality"=>$nationality, 
      "h_qualification" => $h_qualification, "subject" => $subject, 
      "passing_date" => $passing_date, 
      "h_percentage" => $h_percentage, "grade" => $grade, "languages" => $languages, 
      "is_read" => $is_read, "is_write" => $is_write,
      "is_speak"=>$is_speak,
      
       "disability_cat" => $disability_cat, 
        "disability_type" => $disability_type,
         "ex_serviceman" => $ex_serviceman,  
      
         "serving_defence_per" => $serving_defence_per,
            "service_period" => $service_period, 
            
            "registration_no"=>$registration_no,"exam_name"=>$exam_name);

    //  print_r($data);
     $postdata = json_encode($data);

$result_registration=url_encode_Decode($url,$postdata);
//print_r($result_registration);
if($result_registration->message=="Successfull"){
  

  //$_SESSION["registration"] = "Sorry, there was an error uploading your file.";
  header('Location:../registration_view.php?id='.$id);
     }
      else {

       // echo "not updated";
     //  $_SESSION["registration"] = "Sorry, there was an error uploading your file.";
       header('Location:../registration_view.php?id='.$id);
      }
    }
    

function url_encode_Decode($url,$postdata){
    $client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
return $result = json_decode($response);

}


?>