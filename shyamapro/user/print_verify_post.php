<?php
include '../constant.php';
error_reporting(0);
$registration_no = $_POST["registration_no"];
$mobile = $_POST["mobile"];

$url = $URL . "exam/read_print_verify_details.php";

$data = array("registration_no" => $registration_no, "mobile" => $mobile);
//print_r($data);
$postdata1 = json_encode($data);
$results = giplCurl($url, $postdata1);
// print_r($results);
if ($results->message == "No print record found.") {
  $_SESSION['find_reg_error'] = "Record not found.";
  header('location:../website/rrecruitment.php');
  exit();
}

function giplCurl($api, $postdata)
{
  $url = $api;
  $client = curl_init($url);
  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
  $response = curl_exec($client);
//   print_r($response);
  return  json_decode($response);
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

<body class="hold-transition register-page">


  <div class="register-box">
    <div class="register-logo">
      <!-- <a href="#"><b>PAYMENT</b></a> -->
    </div>
    <div class="card card-success card-outline">
      <div class="card-body register-card-body">
        <!-- <p class="login-box-msg"><a href="index.php"><b class="login-box-msg">Alreadr Register? Please Login.</b></a></p> -->

        <h2 class="login-box-msg"><b><u>Payment Details</u></b></h2>
        <button class="btn btn-primary btn-sm" id="printpagebutton" onclick="printpage()"><i class="fa fa-print mr-2"></i>Print</button>
        <?php

        foreach ($results as $key => $value) {
          foreach ($value as $key1 => $value1) {

        ?>
            <div class="btn-group" id="options">
              <form action="get_final_print.php" method="post">
                <input type="hidden" name="id" value="<?php echo $value1->user_id; ?>">
                <input type="hidden" name="transaction_id" value="<?php echo $value1->order_id; ?>">
                <input type="hidden" name="transaction_date" value="<?php echo $date = $value1->trans_date; ?>">
                <a href="#"><button type="submit" class="btn btn-success btn-sm" id="finalbutton"><i class="fa fa-arrow-right mr-2"></i>Get Final Print</button></a>
              </form>
            </div>
        <?php }
        } ?>
        <hr>


        <div class="card-body">

          <?php

          foreach ($results as $key => $value) {
            foreach ($value as $key1 => $value1) {

          ?>
              <div class="container-fluid">

                <p> Dear <b><?php echo $value1->full_name;  ?></b>, Thank you for the payment for examination : <b><?php echo $value1->exam_name;  ?></b>. Your Registration Number is :<b> <?php echo $value1->registration_no;  ?></b></p>
                <p>Your payment Amount for examination :<b><?php echo $value1->exam_name;  ?></b> is<b> &#8377;<?php echo $value1->amount;  ?></b> and your transaction id <b><?php echo $value1->order_id;  ?></b></p>

                <p><b>Date: </b><?php echo $date; ?></p>

              </div>
          <?php }
          } ?>
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