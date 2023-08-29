<html>
<head>
<title> CCAvenue Payment Gateway Integration kit</title>
</head>
<body>


<?php include("Crypto.php")?>
<?php require_once "config.php"; ?>
<?php


	$merchant_data="";
	$working_key = CCA_WORKING_KEY;
	$access_code = CCA_ACCESS_CODE;
// $orderId=substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'),
//                       0, 5).floor(microtime(true) * 1000).rand(10,100);
	foreach ($_POST as $key => $value){
		$merchant_data.=$key."=".$value."&";
	}
// 	 $merchant_data .= "order_id=".$orderId;

	$encrypted_data=encrypt($merchant_data,$working_key); 


?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type='hidden' name='encRequest' value=$encrypted_data>";
echo "<input type='hidden' name='access_code' value=$access_code>";
?>
<!--<input type="submit">-->
</form>

<script language='javascript'>document.redirect.submit();</script>


</body>
</html>