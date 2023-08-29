<?php
session_start();

date_default_timezone_set('Asia/Kolkata');
$BASE_URL="website/index.php";
// website file path on server

// $URL="http://krishilimited.com/api/src/";
// $ADMIN_IMG_PATH="http://krishilimited.com/user/img/";
// $GALLERY_IMG_PATH="http://krishilimited.com/admin/image/gallery/";
// $GALLERY_VIDEO_PATH="http://krishilimited.com/admin/uploads/videos/";
// $GALLERY_NEWS_PATH="http://krishilimited.com/admin/uploads/news/";

// website file path on localhost
$URL="http://localhost/shyamapro/api/src/"; 
$ADMIN_IMG_PATH="http://localhost/shyamapro/user/img/";
$GALLERY_IMG_PATH="http://localhost/shyamapro/admin/image/gallery/";
$GALLERY_VIDEO_PATH="http://localhost/shyamapro/admin/uploads/videos/";
$GALLERY_NEWS_PATH="http://localhost/shyamapro/admin/uploads/news/";

$EXAM_NAME="UPPCL EXAMINATION";
$HOME="website/index.php"; 

$SECRET_KEY = "dKgLINTEL2013aN99840$@";  
$ISSUER_CLAIM = "GLINTEL TECHNOLOGY PVT LTD"; // this can be the servername
$AUDIENCE_CLAIM = "PSP NEWS";

$LOGIN_SUCCESS_MSG="Login Successful";
$LOGIN_FAILED_MSG="Request Failed";

?>