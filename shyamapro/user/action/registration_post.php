<?php
include '../../constant.php';

// if(isset($_POST["full_name"])){
$full_name=strtoupper($_POST["full_name"]);
$father_name=strtoupper($_POST["father_name"]);
$mother_name=strtoupper($_POST["mother_name"]);
$marital_status=$_POST["marital_status"];
$spouse_name=strtoupper($_POST["spouse_name"]);
$dob=date("d/m/Y",strtotime($_POST["dob"]));
//$dob=date_format($_POST["dob"],"d/m/Y");
// $dob=$_POST["dob"];
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
$passing_date=$_POST["passing_date"];
$h_percentage=$_POST["h_percentage"];
$grade=$_POST["grade"];
$languages=strtoupper($_POST["language"]);
$is_read=$_POST["read"];
$is_write=$_POST["write"];
$is_speak=$_POST["speak"];
$disability_cat=$_POST["disability_cat"]!="" ? $disability_cat=$_POST["disability_cat"] : "NO";
$disability_type=($_POST["disability_type"]!="")? $disability_type=$_POST["disability_type"] : "NO";
$ex_serviceman=$_POST["ex_serviceman"];
$serving_defence_per=$_POST["serving_defence_per"];
$exam_name=$_POST["exam_name"];
$service_period=($_POST["service_period"]!="")? $service_period=$_POST["service_period"] : "0";
$created_on=date("Y-m-d H:i:s");
$created_by="USER";
$registration_no = rand(1000000000,9999999999);
$password= date("dmY", strtotime($dob));

$url = $URL . "registration/insert_registration.php";
 $url_read_maxId=$URL . "registration/read_maxId.php";

$data = array(

  "full_name" => $full_name,
  "father_name" => $father_name,
  "mother_name"=>$mother_name,
  "status"=>"0",
  "admit_card"=>"0",
  "result"=>"0",
  "password"=>$password,
  "spouse_name" => $spouse_name, 
  "marital_status"=>$marital_status, 
  "dob" => $dob, 
  "gender" => $gender,
  "email" => $email,
  "mobile" => $mobile, 
  "alternate_mobile" => $alternate_mobile, 
  "address1" => $address1, 
  "address2" => $address2, 
  "address3" => $address3,
  "cor_address"=>$cor_address,
  "district" => $district,
  "state" => $state,  
  "pincode" => $pincode,
  "religion" => $religion, 
  "category" => $category,
  "nationality"=>$nationality, 
  "h_qualification" => $h_qualification,
  "subject" => $subject, 
  "passing_date" => $passing_date, 
  "h_percentage" => $h_percentage,
  "grade" => $grade, 
  "languages" => $languages, 
  "is_read" => $is_read,
  "is_write" => $is_write,
  "is_speak"=>$is_speak,
  "disability_cat" => $disability_cat, 
  "disability_type" => $disability_type,
  "ex_serviceman" => $ex_serviceman,  
  "exam_name" => $exam_name,
  "serving_defence_per" => $serving_defence_per,
  "service_period" => $service_period, 
  "created_on" => $created_on, 
  "registration_no"=>$registration_no, 
  "created_by" => $created_by);

  //print_r($data);
  $postdata = json_encode($data);

 $result_registration=url_encode_Decode($url,$postdata);
 //print_r($result_registration);
if($result_registration->message=="Successfull"){

  /* --- get maximum userid -----*/

    $data_maxId=array();
    $maxId_postdata = json_encode($data_maxId);
    $result_max_registration=url_encode_Decode($url_read_maxId,$maxId_postdata);
    $id=$result_max_registration->records[0]->id;


/*--- update the images in img folder inside user folder ---*/

    $target_dir = "../img/";
    $path="../img/".$id."/profile/";
    if (!is_dir($path)){
    mkdir($path, 0777, true);
    //echo "directory created";
    }
    else{ 
     // echo "unable to create directory";
    }
   $target_file = $target_dir .$id."/profile/". $id.".png";
    $target_file_thumb = $target_dir .$id."/profile/". $id."_thumb".".png";

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $imageFileTypeThumb = strtolower(pathinfo($target_file_thumb,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
     $check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
     $check_thumb = getimagesize($_FILES["fileUploadThumb"]["tmp_name"]);

      if(($check !== false) &&($check_thumb !== false)) {
        
        $uploadOk = 1;
      }
       else {
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      $uploadOk = 0;
    }
    
    // Check file size
    if (($_FILES["fileUpload"]["size"] > 5000000) && ($_FILES["fileUploadThumb"]["size"] > 5000000)) {
     
      $uploadOk = 0;
    }
    {
      
      $uploadOk = 1;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileTypeThumb != "jpg" && $imageFileTypeThumb != "png" && $imageFileTypeThumb != "jpeg"
    && $imageFileTypeThumb != "gif" ) {
    
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    
    } else {

      if ((move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) 
      && (move_uploaded_file($_FILES["fileUploadThumb"]["tmp_name"], $target_file_thumb))) {
        //echo "The file ". htmlspecialchars( basename( $_FILES["fileUpload"]["name"])). " has been uploaded.";
       // echo "The file ". htmlspecialchars( basename( $_FILES["fileUploadThumb"]["name"])). " has been uploaded.";
        $_SESSION["registration"] = "File uploaded succesfully.";
        header('Location:../registration_view.php?id='.$id);
      }
       else {
        //echo "Sorry, there was an error uploading your file.";
      
      $_SESSION["registration"] = "Sorry, there was an error uploading your file.";
        header('Location:../update_registration.php?id='.$id);
    }
  }   
   
}
else{
   header('Location:../registration.php?msg=Failed');
}

//}

function url_encode_Decode($url,$postdata){
    $client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
return $result = json_decode($response);

}


?>