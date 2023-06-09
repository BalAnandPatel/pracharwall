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
if($_SESSION["USER_ROLE"]=="")
{
$ROLE="";    
}else if($_SESSION["USER_ROLE"]=="Admin"){
$ROLE="
ticket_entry,ticket_list,purchased_ticket_list,result_list,user_profile,user_registration_list,
user_account_list,user_payment_list";    
}else if($_SESSION["USER_ROLE"]=="User"){
$ROLE="user_profile,ticket_list,purchased_ticket_list,purchase_ticket,result_list,
user_payment_list";    
}

$USER_REGISTRATION_LIST="user_registration_list";
$TICKET_ENTRY="ticket_entry";
$TICKET_LIST="ticket_list";
$PURCHASED_TICKET_LIST="purchased_ticket_list";
$RESULT_LIST="result_list"; 
$USER_PROFILE="user_profile";
$USER_ACCOUNT_LIST="user_account_list";
$USER_PAYMENT_LIST="user_payment_list";
$PURCHASE_TICKET="purchase_ticket";


?>