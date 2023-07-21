<?php
include '../../constant.php';

if(isset($_POST["upload"])){
  
  $userId=$_POST['userId'];
  $target_dir = "../image/user_profile/";
  $path = "../image/user_profile/".$userId."/";

    if (!is_dir($path)){
    mkdir($path, 0777, true);
    //echo "directory created";
    header('Location:../../profile.php');
    }
    else{ 
     // echo "unable to create directory";
     header('Location:../../profile.php');
    }

  $target_file_type = basename($_FILES["userImg"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file_type,PATHINFO_EXTENSION));


  $check = getimagesize($_FILES["userImg"]["tmp_name"]);
  //print_r($check);

  if($check !== false){ 
        $uploadOk = 1;
      }
      else {
        $uploadOk = 0;
    }
    

    // Check file size
    if ($_FILES["userImg"]["size"] > 5000000) {
    echo $msg = "Sorry, your file is too large.";
    $_SESSION["userUploadErrors"] = $msg;
    header('Location:../../profile.php');
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $msg = "Sorry, only JPG, JPEG, PNG files are allowed.";
    $_SESSION["userUploadErrors"] = $msg;
    header('Location:../../profile.php');
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $msg = "Sorry, your file was not uploaded.";
      header('Location:../../profile.php');
    } else {

    $target_file = $path."user_img_".$userId.".png";
   
    if (move_uploaded_file($_FILES["userImg"]["tmp_name"], $target_file)) {
    
         $_SESSION["userUploadSuccess"] = "File uploaded succesfully.";
         header('Location:../../profile.php');
         }
          else {
        //   echo "Sorry, there was an error uploading your file.";
          $_SESSION["userUploadErrors"] = "Sorry, there was an error uploading your file.";
          header('Location:../../profile.php');
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