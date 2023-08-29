<?php
include '../../constant.php';

require('config.php');



require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
             
 
  $_SESSION['transaction_id']=$_POST['razorpay_payment_id'];
  $user_id = $_SESSION['user_id'];
  $amount = $_SESSION['amount'];
 //$payment_id = 123456789;
 //$amount = 1;
 $transaction_id = $_POST['razorpay_payment_id'];
 $status='1';
 $request_id = $_SESSION['razorpay_order_id'];
 $created_by = $_SESSION['full_name'];
 //$created_by = "anand";
 $created_on=date('Y-m-d h:i:s');
 
 $url=$URL. "payment/payment_entry.php";
  
 $data = array("user_id"=>$user_id,"amount"=>$amount, "transaction_id"=>$transaction_id, 
 "status"=>$status, "request_id"=>$request_id, "created_by"=>$created_by, "created_on"=>$created_on);
 
 //print_r($data);
 $postdata = json_encode($data);
 //$result=url_encode_Decode($url,$postdata);
 //print_r($result);
 
 //function url_encode_Decode($url,$postdata){
    
 $client = curl_init($url);
 curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
 $response = curl_exec($client);
 //print_r($response);
 $result = json_decode($response);
 //print_r($result);
// return $result;
// }
 
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

// echo $html;
echo '<script type="text/javascript">
window.location = "https://krishilimited.com/user/confirm_payment.php"
</script>';
// echo '<script type="text/javascript">
// window.location = "http://localhost/krishilimited/krishilimitedfinal/user/confirm_payment.php"
// </script>';

//header('http://localhost/krishilimited/krishilimitedfinal/user/confirm_payment.php');
?>
