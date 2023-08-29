<?php
include '../../constant.php';
$url = $URL."gallery/insert_gallery_news.php";
$url_read_maxId = $URL."gallery/read_news_maxid.php";
$newsTitle = ucfirst($_POST["newsTitle"]);
$newsDescription = ucfirst($_POST["newsDescription"]);
$created_on=date("Y-m-d H:i:s");
$created_by="Admin";

if(isset($_POST["submit"])){

  $target_dir = "../uploads/news/";
  $target_file_type = basename($_FILES["uploaded_news"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file_type,PATHINFO_EXTENSION));


  $check = getimagesize($_FILES["uploaded_news"]["tmp_name"]);
  //print_r($check);

  if($check !== false){ 
        $uploadOk = 1;
      }
      else {
        $uploadOk = 0;
    }
    

    // Check file size
    if ($_FILES["uploaded_news"]["size"] > 5000000) {
    $msg = "Sorry, your file is too large.";
    $_SESSION["galleryNewsErrors"] = $msg;
    header('Location:../upload_gallery_news.php');
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $msg = "Sorry, only JPG, JPEG, PNG files are allowed.";
    $_SESSION["galleryNewsErrors"] = $msg;
    header('Location:../upload_gallery_news.php');
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $msg = "Sorry, your file was not uploaded.";
      header('Location:../upload_gallery_news.php');
    } else {

      $data = array(
        
        "newsTitle"=>$newsTitle,
        "newsDescription"=>$newsDescription,
        "created_on" => $created_on, 
        "created_by" => $created_by
      
      );
      
     //print_r($data);
     $postdata = json_encode($data);
     $result_gallery = url_encode_Decode($url,$postdata);
     //print_r($result_gallery);

     /* --- get maximum userid -----*/

    $data_maxId=array();
    $maxId_postdata = json_encode($data_maxId);
    $result_galleryMaxId=url_encode_Decode($url_read_maxId,$maxId_postdata);
    //print_r($result_galleryMaxId);
    $id=$result_galleryMaxId->records[0]->id;
      

    $target_file = $target_dir."news_".$id.".png";
   
    if (move_uploaded_file($_FILES["uploaded_news"]["tmp_name"], $target_file)){
    
          $_SESSION["galleryNewsSuccessMsg"] = "File uploaded succesfully.";
          header('Location:../upload_gallery_news.php');
         }
          else {
        //   echo "Sorry, there was an error uploading your file.";
          $_SESSION["galleryNewsErrors"] = "Sorry, there was an error uploading your file.";
          header('Location:../upload_gallery_news.php');
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