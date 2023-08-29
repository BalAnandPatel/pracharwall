<?php
include '../constant.php';
include("Crypto.php");
// error_reporting ( 0 );
$workingKey = "0B9B603ED85529F76503F2195D798DB5"; // Working Key should be provided here.
$encResponse = $_POST ["encResp"]; // This is the response sent by the CCAvenue Server

// print_r($encResponse);
$rcvdString = decrypt ( $encResponse, $workingKey ); // Crypto Decryption used as per the specified working key.
//print_r($rcvdString);

$order_status = "";
$decryptValues = explode ( "&", $rcvdString );
$dataSize = sizeof ( $decryptValues );
for($i = 0; $i < $dataSize; $i ++) {
	$information = explode ( "=", $decryptValues [$i] );
	$responseMap [$information [0]] = $information [1];
}
$order_status = $responseMap ["order_status"];

 $url_pay = $URL ."payment/payment_details.php";
 $url_reg = $URL ."registration/update_reg_payment.php";

$data=array("order_id"=>$responseMap['order_id'],"tracking_id"=>$responseMap['tracking_id'],"bank_ref_no"=>$responseMap['bank_ref_no'],
"order_status"=>$responseMap['order_status'],"failure_message"=>$responseMap['failure_message'],"payment_mode"=>$responseMap['payment_mode'],
"card_name"=>$responseMap['card_name'],"status_code"=>$responseMap['status_code'],"billing_tel"=>$responseMap['billing_tel'],
"billing_email"=>$responseMap['billing_email'],"vault"=>$responseMap['vault'],"offer_type"=>$responseMap['offer_type'],"offer_code"=>$responseMap['offer_code'],"discount_value"=>$responseMap['discount_value'],
"amount"=>$responseMap['amount'],"eci_value"=>$responseMap['eci_value'],"retry"=>$responseMap['retry'],"response_code"=>$responseMap['response_code'],
"billing_notes"=>$responseMap['billing_notes'],"trans_date"=>$responseMap['trans_date']);
 $postdata = json_encode($data);
 
//  print_r($postdata);
$results_pay=giplCurl($url_pay,$postdata);
 
 
 
 $data2=array("registration_no"=>$responseMap['merchant_param2'], "payment_status"=>$responseMap['order_status'], "payment_id"=>$responseMap['order_id']);
$postdata2 = json_encode($data2);
// print_r($postdata2);
$results_reg=giplCurl($url_reg,$postdata2);
//print_r($results_reg);

//set session value
$_SESSION['transaction_id']=$responseMap['order_id'];
$_SESSION['order_status']=$responseMap['order_status'];
$_SESSION['trans_date']=$responseMap['trans_date'];
$_SESSION['exam_name']=$responseMap['merchant_param1'];
$_SESSION['full_name']=$responseMap['billing_name'];
$_SESSION['registration_no']=$responseMap['merchant_param2'];
$_SESSION['user_id']=$responseMap['merchant_param3'];

function giplCurl($api,$postdata){
    $url = $api; 
      $client = curl_init($url);
      curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
      curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
      $response = curl_exec($client);
      //print_r($response);
      return  json_decode($response);
  }


header('Location:https://www.krishilimited.com/user/confirm_payment.php');
?>


</body>

</html>

