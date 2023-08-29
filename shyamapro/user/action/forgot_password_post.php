<?php
//This page is used for Approve agent list

include "../../constant.php";
$url = $URL . "registration/forgot_password.php";
$email = $_POST["email"];
$data = array("email" => $email);
//print_r($data);
$postdata = json_encode($data);
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($client, CURLOPT_POST, 5);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
$result = json_decode($response);
print_r($result);

if (isset($result->message)) {

   $_SESSION['ForgotPassword'] = "Enter Email Address does not match!! Please enter valid email address.";
    header('Location:../index.php');
} 
else
 {
   $_SESSION['ForgotPassword'] = "Password sent you registered Email address.";

    if (!empty($result->records[0]->email)){
       $password= $result->records[0]->password;
    }
    echo $to = $result->records[0]->email;
    echo $subject = "Reset Password";
    echo $message = "Dear ". $result->records[0]->name .",\n\n". "Your password is : " . $password;
    "<html>
        <head>
        <title>Reset Password</title>
        </head>
        <body><p>Your Password is</p>
        </body>
        </html>";
    $headers = "Forgot Password " ;
    //$headers .= "Content-type:text/html;charset=UTF-8";
    $headers .= 'From: giplanand@gmail.com';
    mail($to, $subject, $message, $headers);
    $_SESSION['ForgotPassword'] = "Password sent to your email address : " .$email ;
   header('Location:../index.php'); 

}

exit();
