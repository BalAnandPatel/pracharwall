<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$BASE_URL="http://localhost/pracharwall/";
// website file path on server

// $URL="http://krishilimited.com/api/src/";
// $ADMIN_IMG_PATH="http://krishilimited.com/user/img/";
// $GALLERY_IMG_PATH="http://krishilimited.com/admin/image/gallery/";

// website file path on localhost
$URL="http://localhost/pracharwall/api/src/";
$USER_PROFILE_IMGPATH="http://localhost/pracharwall/admin/image/user_profile/";
$CATEGORY_IMGPATH="http://localhost/pracharwall/admin/image/uploads/img_";

$SECRET_KEY = "dKgLINTEL2013aN99840$@";  
$ISSUER_CLAIM = "GLINTEL TECHNOLOGY PVT LTD"; // this can be the servername
$AUDIENCE_CLAIM = "PRACHARWALL";

$LOGIN_SUCCESS_MSG="Login Successful";
$LOGIN_FAILED_MSG="Request Failed";

$ROLE="";
if(isset($_SESSION["USER_ROLE"]))
// echo $_SESSION["USER_ROLE"];
if($_SESSION["USER_ROLE"]=="")
{
$ROLE="";    
}else if($_SESSION["USER_ROLE"]=="User"){
$ROLE="profile_user";    
}else if($_SESSION["USER_ROLE"]=="Customer"){
$ROLE="profile_customer";    
}

$PROFILE_USER="profile_user";
$PROFILE_CUSTOMER="profile_customer";

?>