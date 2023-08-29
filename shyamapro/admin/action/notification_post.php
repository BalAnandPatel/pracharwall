<?php
include '../../constant.php';
// var_dump($_POST);
// if(isset($_POST["full_name"])){
$n_title=ucfirst($_POST["n_title"]);
// $n_description=ucfirst($_POST["n_description"]);
$created_on=date("Y-m-d H:i:s");
$created_by="Admin";


$url = $URL . "notification/insert_notification.php";
$url_read_maxId=$URL . "notification/read_maxId.php";

$data = array(

  "n_title" => $n_title,
  "n_description" =>$n_description,
  "created_on" => $created_on, 
  "created_by" => $created_by
);

//  print_r($data);
$postdata = json_encode($data);

$result_notification=url_encode_Decode($url,$postdata);
 //print_r($result_notification);
if($result_notification->message=="Successfull"){

  /* --- get maximum userid -----*/

    $data_maxId=array();
    $maxId_postdata = json_encode($data_maxId);
    $result_max_notification=url_encode_Decode($url_read_maxId,$maxId_postdata);
   $id=$result_max_notification->records[0]->id;

/*--- update the images in img folder inside user folder ---*/

    $target_dir = "../image/notification_pdf/";
    $path="../image/notification_pdf/".$id."/pdf/";
    if (!is_dir($path)){
    mkdir($path, 0777, true);
    //echo "directory created";
    }
    else{ 
     // echo "unable to create directory";
    }
    $target_file = $target_dir.$id."/pdf/".$id.".pdf";  

    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    //Check if image file is a actual image or fake image
    // if(isset($_POST["submit"])) {
    //  $check = getimagesize($_FILES["pdf_file"]["tmp_name"]);

    //   if(($check !== false)){
        
    //     $uploadOk = 1;
    //   }
    //    else {
    //     $uploadOk = 0;
    //   }
    // }
    
    // Check if file already exists
    if (file_exists($target_file)) {
     $msg="file already exists";
      $uploadOk = 0;
      header('Location:../insert_notification.php?error='.$msg);
    }
    

    // Check file size
    if ($_FILES["pdf_file"]["size"] > 9000000) {
      $msg="file is over size";
      $uploadOk = 0;
      header('Location:../insert_notification.php?error='.$msg);
    }

    
    // Allow certain file formats
    if($FileType!= "pdf"){
      $uploadOk = 0;
      $msg="only pdf files are allowed";
      header('Location:../insert_notification.php?error='.$msg);
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $msg="Sorry, your file was not uploaded.";
      header('Location:../insert_notification.php?error='.$msg);
    
    } else {

      if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $target_file)) {
  
       $msg="File uploaded succesfully.";
       header('Location:../insert_notification.php?success='.$msg);
      }
       else {
        //echo "Sorry, there was an error uploading your file.";
      
      $msg="Sorry, there was an error uploading your file.";
      header('Location:../insert_notification.php?error='.$msg);
    }
  }   
   
}
else{
 //header('Location:../insert_notification.php?msg=Failed');
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