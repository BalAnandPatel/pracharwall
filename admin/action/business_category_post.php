<?php
include '../../constant.php';

if(isset($_POST["submit"])){

  $businessCategory=$_POST['businessCategory'];
  $subCategory=$_POST['subCategory'];
  $status='1';
  $createdOn=date('Y-m-d h:i:s');
  $createdBy="Admin";
  $url=$URL."admin/insert_business_category.php";
  $url_maxId=$URL."admin/read_category_maxid.php";
  $data = array("businessCategory"=>$businessCategory, "subCategory"=>$subCategory, "status"=>$status, "createdOn"=>$createdOn, "createdBy"=>$createdBy);
  // print_r($data);

  $target_dir = "../image/uploads/";

  // $path = "../image/uploads/".$userId."/";

  //   if (!is_dir($path)){
  //   mkdir($path, 0777, true);
  //   echo "directory created";
  //   }
  //   else{ 
  //    echo "unable to create directory";
  //   }

  $target_file_type = basename($_FILES["busineshImg"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file_type,PATHINFO_EXTENSION));


  $check = getimagesize($_FILES["busineshImg"]["tmp_name"]);
  //print_r($check);

  if($check !== false){ 
        $uploadOk = 1;
      }
      else {
        $uploadOk = 0;
    }
    

    // Check file size
    if ($_FILES["busineshImg"]["size"] > 5000000) {
    $msg = "Sorry, your file is too large.";
    $_SESSION["categoryUploadErrors"] = $msg;
    header('Location:../business_category_entry.php');
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $msg = "Sorry, only JPG, JPEG, PNG files are allowed.";
    $_SESSION["categoryUploadErrors"] = $msg;
    header('Location:../business_category_entry.php');
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $msg = "Sorry, your file was not uploaded.";
      //header('Location:../business_category_entry.php');
    } else {

    $postdata = json_encode($data);
    $result_category=url_encode_Decode($url,$postdata);
    //print_r($result_category);

    if($result_category->message=="Successfull"){
     $data_maxId = array();
     $postdata_maxid = json_encode($data_maxId);
     $result_maxid=url_encode_Decode($url_maxId,$postdata_maxid);
     //print_r($result_maxid);
     $id = $result_maxid->records[0]->id;
    

    $target_file = $target_dir."/img_".$id.".png";
   
    if (move_uploaded_file($_FILES["busineshImg"]["tmp_name"], $target_file)) {
    
         $_SESSION["categoryUploadSuccess"] = "Record added succesfully.";
         header('Location:../business_category_entry.php');
         }
          else {
        //   echo "Sorry, there was an error uploading your file.";
          $_SESSION["categoryUploadErrors"] = "Sorry, there was an error uploading your file.";
          header('Location:../business_category_entry.php');
      }
    }else{
      $msg = "record not inserted";  
    }

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