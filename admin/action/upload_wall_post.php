<?php
include '../../constant.php';

if(isset($_POST["uploadWall"])){
  
  $userId=$_POST['userId'];
  $target_dir = "../image/walluploads/";
  $path = "../image/walluploads/".$userId."/";

    if (!is_dir($path)){
    mkdir($path, 0777, true);
    echo "directory created";
    }
    else{ 
     echo "unable to create directory";
    }

  $target_file_type = basename($_FILES["uploadWallFile"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file_type,PATHINFO_EXTENSION));


  $check = getimagesize($_FILES["uploadWallFile"]["tmp_name"]);
  //print_r($check);

  if($check !== false){ 
        $uploadOk = 1;
      }
      else {
        $uploadOk = 0;
    }
    

    // Check file size
    if ($_FILES["uploadWallFile"]["size"] > 5000000) {
    $msg = "Sorry, your file is too large.";
    $_SESSION["wallUploadErrors"] = $msg;
    header('Location:../../profile.php');
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $msg = "Sorry, only JPG, JPEG, PNG files are allowed.";
    $_SESSION["wallUploadErrors"] = $msg;
    header('Location:../../profile.php');
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $msg = "Sorry, your file was not uploaded.";
      header('Location:../../profile.php');
    } else {

    $target_file = $path."wall_img_".$userId.".png";
   
    if (move_uploaded_file($_FILES["uploadWallFile"]["tmp_name"], $target_file)) {
    
        $_SESSION["wallUploadSuccess"] = "File uploaded succesfully.";
        header('Location:../../profile.php');
         }
          else {
         //echo "Sorry, there was an error uploading your file.";
         $_SESSION["wallUploadErrors"] = "Sorry, there was an error uploading your file.";
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