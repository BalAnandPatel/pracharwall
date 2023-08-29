<?php
include "../constant.php";
error_reporting(0);

//$id=$_GET["id"];
$url = $URL . "registration/read_profile_by_id.php";
$transaction_id = $_SESSION['transaction_id'];
// $transaction_id="x0Zrw_8101875477";
$id = $_SESSION['user_id'];  
// $id='3';
$data = array("id" => $id);
$postdata1 = json_encode($data);
$result = giplCurl($url, $postdata1);
//print_r($result);

$img = "img/" . $id . "/profile" . "/" . $id . ".png";
$img_thumb = "img/" . $id . "/profile" . "/" . $id . "_thumb" . ".png";

function giplCurl($api, $postdata)
{
  $url = $api;
  $client = curl_init($url);
  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
  $response = curl_exec($client);
  //print_r($response);
  return $result = json_decode($response);
}



$url_exam = $URL . "exam/read_exam_details.php";
$data_exam = array("exam_name" => $result->records[0]->exam_name);
$postdata = json_encode($data_exam);
$result_exam = giplCurl($url_exam, $postdata);
// print_r($result_exam);

$url_payment = $URL . "payment/read_payment_details.php";
$data_payment = array("transaction_id"=>$transaction_id);
$postdata_payment = json_encode($data_payment);
$result_payment = giplCurl($url_payment, $postdata_payment);
//print_r($result_payment);
$amount = $result_payment->records[0]->amount;

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
  <!-- Theme style -->
  <link rel="stylesheet" href="../common/dist/css/adminlte.min.css">


</head>

<body>

  <style>
    #options {
      align-content: center;
      align-items: center;
      text-align: center;
    }
  </style>

  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice m-0">

      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-3 invoice-col text-center pt-1">
          <div class="text-center">
          <img src="../website/assets/images/logo/logo.png" height="auto" width="150px" class="img-fluid " alt="logo image">
          </div>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 invoice-col text-center pt-3">
          <address>
            <strong><big>SHYAMAVSVSS KRISHI LIMITED</big></strong>
            <br>
            <strong>CIN-U01100UP2022PLC170775</strong>
            <p><strong><big>( <?php echo $result->records[0]->exam_name; ?> <?php echo date('Y',strtotime($result->records[0]->created_on)); ?> )</big></strong></p>
            <p>Confirmation Page</p>
            <div class="btn-group" id="options">
              <button class="btn btn-primary btn-sm" id="printpagebutton" type="button" onclick="printpage()">Print</button>
            </div>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-3  invoice-col text-center pt-1">
          <div class="text-center">
          <img src="../website/assets/images/logo/logo.png" height="auto" width="150px" class="img-fluid " alt="logo image">
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">

        <div class="col-11.5 table-responsive m-4">

          <table class="table table-sm table-bordered">
            <thead>
              <tr class="table-warning">
                <th scope="row">Application No : <?php echo ucfirst($result->records[0]->registration_no); ?></th>
              </tr>
            <tbody>
              <td><small>CONDIDATE IS REQUESTED TO SAVE OF CONFIRMATION PAGE FOR FUTURE NEED</small></td>
            </tbody>
            </thead>

          </table>
          <p class="text-success"><strong><u>Personal Details</u></strong></p>
          <table class="table table-sm table-bordered">

            <tbody>
              <?php

              foreach ($result as $key => $value) {
                foreach ($value as $key1 => $value1) {
              ?>
                  <tr>
                    <th>Candidate's Name</th>
                    <td><?php echo $value1->full_name; ?></td>
                    <th>Date of Birth</th>
                    <td><?php echo date('d-m-Y', strtotime($value1->dob)); ?></td>
                  </tr>
                  <tr>
                    <th>Mother's Name</th>
                    <td><?php echo ucwords($value1->mother_name); ?></td>
                    <th>Gender</th>
                    <td><?php echo $value1->gender; ?></td>
                  </tr>
                  <tr>
                    <th>Father's Name</th>
                    <td><?php echo $value1->father_name; ?></td>
                    <th>Category</th>
                    <td><?php echo $value1->category; ?></td>
                  </tr>
                  <tr>
                    <th>Marital Status</th>
                    <td><?php echo $value1->marital_status; ?></td>
                    <th>Nationality</th>
                    <td><?php echo $value1->nationality; ?></td>
                  </tr>
                  <tr>
                    <th>Spouse Name</th>
                    <td><?php echo $value1->spouse_name; ?></td>
                    <th>Religion</th>
                    <td><?php echo $value1->religion; ?></td>
                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>

          <p class="text-success"><strong><u>Present Address</u></strong></p>
          <table class="table table-sm table-bordered">

            <tbody>
              <?php

              foreach ($result as $key => $value) {
                foreach ($value as $key1 => $value1) {
              ?>
                  <tr>
                    <th>Correspondance Address</th>
                    <td colspan="3"><?php echo $value1->cor_address; ?></td>
                  </tr>
                  <tr>
                    <th>Address 1</th>
                    <td colspan="3"><?php echo $value1->address1; ?></td>
                  </tr>
                  <tr>
                    <th>Address 2</th>
                    <td colspan="3"><?php echo $value1->address2; ?></td>
                  </tr>
                  <tr>
                    <th>Address 3</th>
                    <td colspan="3"><?php echo $value1->address3; ?></td>
                  </tr>
                  <tr>
                    <th>District</th>
                    <td><?php echo $value1->district; ?></td>
                    <th>State</th>
                    <td><?php echo $value1->state; ?></td>
                  </tr>
                  <tr>
                    <th>Pin Code</th>
                    <td><?php echo $value1->pincode; ?></td>
                    <th>Mobile</th>
                    <td><?php echo $value1->mobile; ?></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td><?php echo $value1->email; ?></td>
                    <th>Alternate Mobile</th>
                    <td><?php echo $value1->alternate_mobile; ?></td>
                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>

          <p class="text-success"><strong><u>Qualification & Other Details</u></strong></p>
          <table class="table table-sm table-bordered">
            <tbody>
              <?php

              foreach ($result as $key => $value) {
                foreach ($value as $key1 => $value1) {
              ?>
                  <tr>
                    <th>Highest Qualification</th>
                    <td><?php echo $value1->h_qualification; ?></td>
                    <th>Subject/Stream/Degree Name</th>
                    <td><?php echo $value1->subject; ?></td>
                  </tr>
                  <tr>
                    <th>Passing Date</th>
                    <td><?php echo date('d-m-Y', strtotime($value1->passing_date)); ?></td>
                    <th>Highest Qualification Mark</th>
                    <td><?php echo $value1->h_percentage; ?></td>
                  </tr>
                  <tr>
                    <th>Grade</th>
                    <td><?php echo $value1->grade; ?></td>
                    <th>Language</th>
                    <td><?php echo $value1->languages; ?></td>
                  </tr>
                  <tr>
                    <th>Are You Able To Read?</th>
                    <td><?php echo $value1->is_read; ?></td>
                    <th>Are You Able To Write?</th>
                    <td><?php echo $value1->is_write; ?></td>
                  </tr>
                  <tr>
                    <th>Are You Able To Speak?</th>
                    <td><?php echo $value1->is_speak; ?></td>
                    <th>Disability Category</th>
                    <td><?php echo $value1->disability_cat; ?></td>
                  </tr>
                  <tr>
                    <th>Disability Type</th>
                    <td><?php echo $value1->disability_type; ?></td>
                    <th>Are you Ex-Serviceman?</th>
                    <td><?php echo $value1->ex_serviceman; ?></td>
                  </tr>
                  <tr>
                    <th>Are you Serving Defence Personnel?</th>
                    <td><?php echo $value1->serving_defence_per; ?></td>
                    <th>Service Period (In month)</th>
                    <td><?php echo $value1->service_period; ?></td>
                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>

          <p class="text-success"><strong><u>Uploaded Image and Signature</u></strong></p>
          <table class="table table-sm table-bordered">
            <thead>
              <?php

              foreach ($result as $key => $value) {
                foreach ($value as $key1 => $value1) {
              ?>
                  <tr class="table-warning">
                    <th class="text-center">Photo</th>
                    <th class="text-center">Signature</th>
                  </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">
                  <picture>
                    <img src="<?php echo  $img; ?>" class="img-responsive img-fluid img-thumbnail" style="height:100px; width:100px;" alt="...">
                  </picture>
                </td>
                <td class="text-center">
                  <picture>
                    <source srcset="<?php echo  $img_thumb; ?>" type="image/svg+xml">
                    <img src="<?php echo  $img_thumb; ?>" class="img-responsive img-fluid img-thumbnail" style="height:50px; width:200px;" alt="...">
                  </picture>
                </td>
              </tr>
          <?php }
              } ?>
            </tbody>
          </table>

          <p class="text-success"><strong><u>Fee Payment Details</u></strong></p>
          <table class="table table-sm table-bordered">
            <thead>
              <?php

              foreach ($result as $key => $value) {
                foreach ($value as $key1 => $value1) {
              ?>
                  <tr class="table-warning">
                    <th>Activity</th>
                    <th>Application No.</th>
                    <th>Transaction No.</th>
                    <th>Transaction Date</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Paymet Mode</th>
                  </tr>
            </thead>
            <tbody>
              <tr>
                <td>Application Fee</td>
                <td><?php echo $value1->registration_no; ?></td>
                <td><?php echo $transaction_id; ?></td>
                <td>
                  <?php
                  echo $result_payment->records[0]->trans_date;
                  ?>
                </td>
                <td><?php echo $amount; ?></td>
                <td><?php echo $result_payment->records[0]->order_status; ?></td>
                <td><?php echo $result_payment->records[0]->payment_mode; ?></td>
              </tr>
          <?php }
              } ?>
            </tbody>
          </table>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->
  <!-- Page specific script -->
  <script>
    function printpage() {
      //Get the print button and put it into a variable
      var printButton = document.getElementById("printpagebutton");
      //Set the print button visibility to 'hidden' 
      printButton.style.visibility = 'hidden';
      //Print the page content
      window.print()
      printButton.style.visibility = 'visible';
    }
  </script>
  <!--
<script>
  window.addEventListener("load", window.print());
</script>-->
</body>

</html>