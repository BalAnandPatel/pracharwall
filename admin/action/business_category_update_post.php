<?php
include '../../constant.php';

if(isset($_POST["submit"])){
   
  $categoryId=$_POST['categoryId']; 
  $businessCategory=ucwords($_POST['businessCategory']);
  $subCategory="NA";
  $status='1';
  $updatedOn=date('Y-m-d h:i:s');
  $updatedBy="Admin";
  $read_url = $URL."admin/read_business_category_byId.php";
  $url=$URL."admin/update_business_category.php";

  $read_data = array("id"=>$categoryId);
  // print_r($read_data);
  $read_postdata = json_encode($read_data);
  $read_result = url_encode_Decode($read_url,$read_postdata);
  //print_r($read_result);
  $pre_businessCategory = $read_result->records[0]->businessCategory;
  $match_category = strcmp($businessCategory,$pre_businessCategory);

  if($match_category=='0'){
  $_SESSION["categoryUpdateErrors"]="Category already created";
  header('Location:../view_category.php'); 
  exit(); 
  }

  //update category data 
  $data = array("categoryId"=>$categoryId, "businessCategory"=>$businessCategory, "subCategory"=>$subCategory, "status"=>$status, "updatedOn"=>$updatedOn, "updatedBy"=>$updatedBy);
  // print_r($data);

  $target_dir = "../image/uploads/";


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
    $_SESSION["categoryUpdateErrors"] = $msg;
    header('Location:../view_category.php');
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $msg = "Sorry, only JPG, JPEG, PNG files are allowed.";
    $_SESSION["categoryUpdateErrors"] = $msg;
    header('Location:../view_category.php');
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $msg = "Sorry, your file was not uploaded.";
      header('Location:../view_category.php');
    } else {

    $postdata = json_encode($data);
    $result_category=url_encode_Decode($url,$postdata);
    //print_r($result_category);

    if($result_category->message=="Successfully updated"){

    $target_file = $target_dir."/img_".$categoryId.".png";
   
    if (move_uploaded_file($_FILES["busineshImg"]["tmp_name"], $target_file)) {
    
         $_SESSION["categoryUpdateSuccess"] = "Category updated succesfully.";
         header('Location:../view_category.php');
         }
          else {
        //   echo "Sorry, there was an error uploading your file.";
           $_SESSION["categoryUpdateErrors"] = "Sorry, there was an error uploading your file.";
          header('Location:../view_category.php');
      }
    }else{
        $_SESSION["categoryUpdateErrors"] = "Unable to update category";
         header('Location:../view_category.php');  
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