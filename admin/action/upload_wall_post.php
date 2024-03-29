<?php
include '../../constant.php';

if(isset($_POST["uploadWall"])){
  
  $url = $URL . "user/insert_user_wall.php";
  $wall_histroy_url = $URL . "user/read_user_wall_history.php";
  $history_url = $URL . "user/insert_user_wall_history.php";
  $wall_read_url = $URL . "user/read_user_wall_status.php";

  $userId=$_POST['userId'];
  $categoryId=$_POST['categoryId'];
  $date = date("Y-m-d h:i:s"); 
  $createdBy=$_POST['userId'];
  $target_dir = "../image/walluploads/";
  $path = "../image/walluploads/".$userId."/";
  $rand_no = rand(10,100);
  $status="0";
  
  // get users wall status from wall_upload_history table
  $wall_history_data = array("status"=>'0', "userId"=>$userId);
  $wall_history_postdata = json_encode($wall_history_data);
  $wall_history_result = url_encode_Decode($wall_histroy_url,$wall_history_postdata);
  //print_r($wall_history_result);
  $wall_history_status="";
  $pre_exist_file="";
  if(isset($wall_history_result->records[0]->status)){
  $wall_history_status = $wall_history_result->records[0]->status;
  $pre_exist_file = $path.$wall_history_result->records[0]->wallImg;
  }


  // Check if file already exists
  if($wall_history_status=='0' || $wall_history_status=='5' || $wall_history_status=='2'){
          if (file_exists($pre_exist_file)) {
           
          unlink($pre_exist_file);

       }   
    }   

  //get wall status from wall_uploads table
  $wall_read_data = array("userId"=>$userId);
  $wall_read_postdata = json_encode($wall_read_data);
  $wall_read_result = url_encode_Decode($wall_read_url,$wall_read_postdata);
  // print_r($wall_read_result);
  $wall_status="";
  if(isset($wall_read_result->records[0]->status)){
  $wall_status = $wall_read_result->records[0]->status;
  }

    if (!is_dir($path)){
    mkdir($path, 0777, true);
    // echo "directory created";
    header('Location:../../profile.php');
    }
    else{ 
     // echo "unable to create directory";
    header('Location:../../profile.php');
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

    $target_file = $path."wall_img_".$userId."_".$rand_no.".".$imageFileType;
    $wallImg = "wall_img_".$userId."_".$rand_no.".".$imageFileType;
   
    if (move_uploaded_file($_FILES["uploadWallFile"]["tmp_name"], $target_file)) {


        if($wall_status=="" || $wall_status=='0'){

        //user wall entry 
        $data = array("userId"=>$userId, "wallImg"=>$wallImg, "categoryId"=>$categoryId, "status"=>'0', "wall_status"=>$wall_status, "createdOn"=>$date, "createdBy"=>$createdBy);
        $postdata = json_encode($data);
        $result = url_encode_Decode($url,$postdata);
        //print_r($result);
        //create user wall upload history
        $history_data = array("userId"=>$userId, "wallImg"=>$wallImg, "categoryId"=>$categoryId, "status"=>'5', "wall_history_status"=>$wall_history_status, "createdOn"=>$date, "createdBy"=>$createdBy);
        $history_postdata = json_encode($history_data);
        $history_result = url_encode_Decode($history_url,$history_postdata);
         //print_r($history_result);
        }else{
        //create user wall upload history
        $history_data = array("userId"=>$userId, "wallImg"=>$wallImg, "categoryId"=>$categoryId, "status"=>$status, "wall_history_status"=>$wall_history_status, "createdOn"=>$date, "createdBy"=>$createdBy);
        $history_postdata = json_encode($history_data);
        $history_result = url_encode_Decode($history_url,$history_postdata);
        //print_r($history_result); 
        }

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