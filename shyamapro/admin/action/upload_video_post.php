<?php
include '../../constant.php';
$url = $URL."gallery/insert_video_gallery.php";
$url_read_maxId = $URL."gallery/read_video_maxid.php";
$videoTitle = ucfirst($_POST["videoTitle"]);
$videoDescription = ucfirst($_POST["videoDescription"]);
$created_on=date("Y-m-d H:i:s");
$created_by="Admin";
if(isset($_POST["submit"])){

  $target_dir = "../uploads/videos/";
  $target_file_type = basename($_FILES["uploaded_video"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file_type,PATHINFO_EXTENSION));

  $check = mime_content_type($_FILES["uploaded_video"]["tmp_name"]);
  //print_r($check);

    
  if(strstr($check, "video/")){
      // this code for video
      $uploadOk = 1;
      // echo "file is video";
  } else {
      // this code for image
      $uploadOk = 0;
      // echo "file is image";
  }

    // Check file size
    if ($_FILES["uploaded_video"]["size"] > 20000000) {
    $msg = "Sorry, your Video file is too large.";
    $_SESSION["videoErrors"] = $msg;
    header('Location:../upload_video.php');
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "mp4") {
    $msg = "Sorry, only mp4 videos files are allowed.";
    $_SESSION["videoErrors"] = $msg;
    header('Location:../upload_video.php');
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $msg = "Sorry, your file was not uploaded.";
      // header('Location:../upload_video.php');
    } else {

      $data = array(
        
        "videoTitle"=>$videoTitle,
        "videoDescription"=>$videoDescription,
        "created_on" => $created_on, 
        "created_by" => $created_by
      
      );
      
     //print_r($data);
     $postdata = json_encode($data);
     $result_gallery = url_encode_Decode($url,$postdata);
    //  print_r($result_gallery);

     /* --- get maximum userid -----*/

    $data_maxId=array();
    $maxId_postdata = json_encode($data_maxId);
    $result_video_MaxId=url_encode_Decode($url_read_maxId,$maxId_postdata);
    //print_r($result_galleryMaxId);
    $id=$result_video_MaxId->records[0]->id;
      

    $target_file = $target_dir."gallery_video_".$id.".mp4";
   
    if (move_uploaded_file($_FILES["uploaded_video"]["tmp_name"], $target_file)){
    
          $_SESSION["videoSuccessMsg"] = "Video uploaded succesfully.";
          header('Location:../upload_video.php');
         }
          else {
        //   echo "Sorry, there was an error uploading your file.";
          $_SESSION["videoErrors"] = "Sorry, there was an error uploading your file.";
          header('Location:../upload_video.php');
      }

     }

}else{
$_SESSION["videoErrors"] = "Sorry, your Video file is too large.";
header('Location:../upload_video.php');
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