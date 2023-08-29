<?php
include '../constant.php';  
// error_reporting(0);
$mobile = $_POST["mobile"];
$registration_no = $_POST["registration_no"];

$url = $URL . "exam/read_payment_varify_details.php";

$data = array("registration_no"=>$registration_no, "mobile"=>$mobile);
//print_r($data);
$postdata1 = json_encode($data);
$results = giplCurl($url, $postdata1);
// print_r($results);

if (isset($results->message) && $results->message=="payment not verified") {
  // echo "Request failed";
  $_SESSION['find_reg_error'] = "Record not matched.";
//   header('location:../website/rrecruitment.php');
exit();  
}else{

  $id = $results->records[0]->id;

  $img = $ADMIN_IMG_PATH . $id . "/profile" . "/" . $id . ".png";
  $img_thumb = "img/" . $id . "/profile" . "/" . $id . "_thumb" . ".png";
}


function giplCurl($api, $postdata)
{
  $url = $api;
  $client = curl_init($url);
  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
  $response = curl_exec($client);
  // print_r($response);
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
      <a href="#"><b>PAYMENT</b></a>
    </div>
    <div class="card card-success card-outline">
      <div class="card-body register-card-body">
        <!-- <p class="login-box-msg"><a href="index.php"><b class="login-box-msg">Alreadr Register? Please Login.</b></a></p> -->

        <h2 class="login-box-msg"><b><u>Payment Details</u></b></h2>
        <hr>
        <div class="container-fluid">

          <div class="row">

            <div class="col-sm-6">


              <img class="profile-user-img" src="<?php echo  $img ?>" alt="User image">
            </div>
            <div class="col-sm-6">
              <img class="profile-user-img" src="<?php echo  $img_thumb ?>" alt="User thumb image">
            </div>
          </div>
        </div>
        <!-- form start -->
        <hr>
        <div class="card-body">


          <div class="container-fluid">

        <?php
        $category="";
        if(isset($results->records[0]->category)){
          $category=$results->records[0]->category;
        }
        // category wize application fee
        if($category=="General"){
         $amount=$results->records[0]->general_fee;
        }else if($category=="OBC"){
         $amount=$results->records[0]->obc_fee;
        }else if($category=="SC"){
         $amount=$results->records[0]->sc_fee;
        }else if($category=="ST"){
         $amount=$results->records[0]->st_fee;
        }else if($category=="EWS"){
         $amount=$results->records[0]->ews_fee;
        }
        ?>

            <p> Dear <b><?php echo $results->records[0]->full_name;  ?></b>, Thank you for the registration for examination : <b><?php echo $results->records[0]->exam_name; ?></b>. Your Registration Number is :<b> <?php echo $results->records[0]->registration_no; ?></b></p>
            <p>Your Registration Amount for examination :<b> <?php echo $results->records[0]->exam_name; ?></b> is<b> &#8377;<?php echo $amount; ?></b> only. </p>

            <h1>Instructions:</h1>
            <ul>
              <li>
                Verify your name, examination details etc.for which examination fee is to be paid.
              </li>
              <li>
                Select any one of the payment gateway and proceed for payment.
              </li>
              <li>
                For any payment related query, insurance company/candidate needs to contact the respective bank.</li>
              <li>
                Please do not close the browser till you get an appropriate message (Payment Successful/Unsuccessful) and note down the Customer Reference number.</li>
              <li>
                In case the message shows as payment is "Unsuccessful" and amount is debited from bank account then kindly contact your respective bank.</li>
              <li>
                Exam fees once paid will not be refunded under any circumstances once scheduled, even if candidate chooses to remain absent for the examination.</li>
              <li>
                In case of payment confirmation not received, transaction amount will be refunded back within 3 - 4 working days.</li>
              <li>
                Our helpline number is 7307145971 ( timing 9:30 am to 5:30 pm ). You may also send an email to krishilimitedindia@gmail.com</li>
              <li>
                After successful payment, the student can download the registration receipt.
              </li>
            </ul>

            <div class="row">
              <div class="col-sm-4">


              </div>
              <div class="col-sm-4">

                <form action="../payment/ccavRequestHandler.php" method="post" enctype="">

              </div>
              <div class="col-sm-4">

                  <input type="hidden" name="order_id" value="<?php echo substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'),
                       0, 5)."_".$registration_no ?>" readonly>
                <input type="hidden" name="merchant_id" value="2545757"> 
    <input type="hidden" name="language" value="EN"> 
    <input type="hidden" name="amount" value="<?php echo $amount; ?>">
    <input type="hidden" name="currency" value="INR"> 
    <input type="hidden" name="redirect_url" value="https://www.krishilimited.com/payment/ccavResponseHandler.php"> 
    <input type="hidden" name="cancel_url" value="https://www.krishilimited.com/payment/cancel.php"> 
     <input type="hidden" name="merchant_param3" value="<?php echo $results->records[0]->id; ?>" class="form-field" Placeholder="User Id"> 
     <input type="hidden" name="merchant_param1" value="<?php echo $results->records[0]->exam_name; ?>" class="form-field" Placeholder="Exam Name"> 
     <input type="hidden" name="merchant_param2" value="<?php echo $results->records[0]->registration_no; ?>" class="form-field" Placeholder="Reg No."> 
     <input type="hidden" name="billing_name" value="<?php echo $results->records[0]->full_name; ?>" class="form-field" Placeholder="Billing Name"> 
    <input type="hidden" name="billing_address" value="<?php echo $results->records[0]->address1.",".$results->records[0]->address2; ?>" class="form-field" Placeholder="Billing Address">
     <input type="hidden" name="billing_state" value="<?php echo $results->records[0]->state; ?>" class="form-field" Placeholder="State"> 
    <input type="hidden" name="billing_zip" value="<?php echo $results->records[0]->pincode; ?>" class="form-field" Placeholder="Zipcode">
    <input type="hidden" name="billing_country" value="<?php echo $results->records[0]->nationality; ?>" class="form-field" Placeholder="Country">
    <input type="hidden" name="billing_tel" value="<?php echo $results->records[0]->mobile; ?>" class="form-field" Placeholder="Phone">
    <input type="hidden" name="billing_email" value="<?php echo $results->records[0]->email; ?>" class="form-field" Placeholder="Email">
                <button type="submit" class="btn btn-success btn-block">Confirm & Pay</button>
                <a href="https://krishilimited.com/" class="btn btn-success btn-block">Pay Later</a>

              </div>
              <!-- /.col -->
            </div>
          </div>

        </div>


        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="../common/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../common/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../common/dist/js/adminlte.min.js"></script>
</body>

</html>