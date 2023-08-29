<?php
include '../constant.php';
error_reporting(0);
// $full_name=$_SESSION['full_name'];
// $registration_no=$_SESSION['registration_no'];
// $exam_name=$_SESSION['exam_name'];
// $transaction_id=$_SESSION['transaction_id'];

$full_name="MRITYUNJAY SINGH";
$registration_no="1175211357";
$exam_name="UPPCS";
$transaction_id="x0Zrw_8101875477";


$url = $URL."payment/confirm_payment.php";

$data = array("transaction_id"=>$transaction_id);

//print_r($data);
$postdata = json_encode($data);

$result_payment=url_encode_Decode($url,$postdata);
// print_r($result_payment);

 
function url_encode_Decode($url,$postdata){
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
return $result = json_decode($response);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SHYAMAVSVSS KRISHI LIMITED</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../common/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../common/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../common/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../common/build/scss/pages/_login_and_register.scss">
  <link rel="stylesheet" href="../common/build/scss/pages/_profile.scss">

</head>

<body class="register-page hold-transition">
   

<div class="w-75">
  <div class="register-logo">
    <!-- <a href="#"><b>PAYMENT</b></a> -->
  </div>
  <div class="card card-success card-outline">
    <div class="card-body register-card-body">
      <!-- <p class="login-box-msg"><a href="index.php"><b class="login-box-msg">Alreadr Register? Please Login.</b></a></p> -->
      
      <h1 class="text-center text-dark">
        <?php if($result_payment->records[0]->order_status == "Success") { ?>
          <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#0fdb13}</style><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
          <h2 class="login-box-msg"><b><u>Payment Successful</u></b></h2>
        <?php } else { ?>
          <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ff0000}</style><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/></svg>
          <h2 class="login-box-msg"><b><u>Payment Failed</u></b></h2>
        <?php } ?>
      </h1>
      <hr>
      <div class="card-body">
        <p>
          Welcome! <b><?php echo $full_name;  ?></b>
        </p>
        <div class="table-responsive">

          <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="thead-dark">
              <tr class="text-center">
                <th colspan="2">E-Receipt | (Candidate Copy)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="col-6">Registration Number</td>
                <td><?php echo $registration_no; ?></td>
              </tr>
              <tr>
                <td class="col-6">Examination Name</td>
                <td><?php echo $exam_name; ?></td>
              </tr>
              <tr>
                <td class="col-6">Transaction Reference Id</td>
                <td><?php echo $result_payment->records[0]->tracking_id; ?></td>
              </tr>
              <tr>
                <td class="col-6">Transaction Number</td>
                <td><?php echo $result_payment->records[0]->order_id; ?></td>
              </tr>
              <tr>
                <td class="col-6">Bank Reference Number</td>
                <td><?php echo $result_payment->records[0]->bank_ref_no; ?></td>
              </tr>
              <tr>
                <td class="col-6">Card Name</td>
                <td><?php echo $result_payment->records[0]->card_name; ?></td>
              </tr>
              <tr>
                <td class="col-6">Payment Mode</td>
                <td><?php echo $result_payment->records[0]->payment_mode; ?></td>
              </tr>
              <tr>
                <td class="col-6">Date of Transaction</td>
                <td><?php echo $result_payment->records[0]->trans_date; ?></td>
              </tr>
              <tr>
                <td class="col-6">Transaction Amount</td>
                <td><?php echo $result_payment->records[0]->amount; ?></td>
              </tr>
              <tr>
                <td class="col-6">Transaction Status</td>
                <td><?php echo $result_payment->records[0]->order_status; ?></td>
              </tr>
            </tbody>
          </table>
          
        </div>
        <div class="text-center">
          <button class="btn btn-primary btn-sm" id="printpagebutton" onclick="printpage()">
            <i class="fa fa-print mr-2"></i>Print
          </button>
          <div class="btn-group" id="options">
            <a href="confirmation.php">
              <button class="btn btn-success btn-sm" id="finalbutton">
                <i class="fa fa-arrow-right mr-2"></i>Get Final Print
              </button>
            </a>
          </div>
        </div>

      <div class="container-fluid">
   
      <!-- <p> 
        Dear <b><?php //echo $full_name;  ?></b>, 
        Thank you for the payment for examination <b><?php //echo $exam_name; ?></b>. 
        Your Registration Number :<b> <?php //echo $registration_no; ?></b>
      </p> -->
      <!-- <p>
        Your payment is <b><?php //echo $_SESSION['order_status']; ?></b>. 
        Amount for examination <b> <?php //echo $exam_name; ?></b> is<b> &#8377;<?php //echo $result_payment->records[0]->amount; ?></b>
        and your Transaction Id </b>:<b>&nbsp;<?php //echo $result_payment->records[0]->order_id; ?></b> 
      </p> -->
      <!-- <p>
        Date & Time:<strong class="ml-2"><?php //echo $_SESSION['trans_date']; ?></strong>
      </p> -->
                </div>         
      </div>
     

    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<script>
   function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        finalbutton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
        finalbutton.style.visibility = 'visible';
    }
</script>

<!-- jQuery -->
<script src="../common/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../common/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../common/dist/js/adminlte.min.js"></script>
</body>
</html>