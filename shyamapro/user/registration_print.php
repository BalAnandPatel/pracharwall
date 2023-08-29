<?php
//session_start();
error_reporting(0);
include "../constant.php";
//include "include/header.php";
$id = $_GET["id"];
$url = $URL . "registration/read_profile_by_id.php";
//$id=$_GET['id'];
$id = '48';
$data = array("id" => $id);
$postdata1 = json_encode($data);
$result = giplCurl($url, $postdata1);
// print_r($result);

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
//print_r($data_exam);

$url_payment = $URL . "payment/read_payment_details.php";
$data_payment = array("amount" => $result_exam->records[0]->amount, "user_id" => $result->records[0]->id);
$postdata_payment = json_encode($data_payment);
$result_payment = giplCurl($url_payment, $postdata_payment);
if (($result_payment->records[0]->status == 1) && ($result_payment->records[0]->amount == $result_exam->records[0]->amount)) {
   $amount = $result_payment->records[0]->amount;
} else {
   $amount = 0.00;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Real Estate</title>
   <!---link to style sheet----->
   <link rel="stylesheet" href="../common/build/scss/pages/_profile.scss">
   <link rel="stylesheet" href="../common/css/style.css">
   <link rel="stylesheet" href="../common/css/payment_slip.css">
   <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="../common/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="../common/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="../common/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <link rel="stylesheet" href="../common/dist/css/adminlte.min.css?v=3.2.0">
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../common/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="../common/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="../common/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   <link rel="stylesheet" href="../common/plugins/jqvmap/jqvmap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="../common/dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="../common/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="../common/plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="../common/plugins/summernote/summernote-bs4.min.css">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">


</head>

<div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
               <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5">
                  <i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
            <img src="image/logo.png" width="120" height="60"> <?php echo $result->records[0]->exam_name ?> <div class="invoice-date">
               <small>Examination Details:</small>
               <small><?php echo $result->records[0]->exam_name ?></small>
            </div>
         </div>
         <!-- end invoice-company -->
         <!-- begin invoice-header -->
         <div class="invoice-header">
            <div class="invoice-from">
               <strong class="text-inverse">ABCD</strong>
               <address class="m-t-5 m-b-5">
                  <table>

                     <tr>
                        <td><small>Examination Name: </small></td>
                        <td><small><?php echo ucfirst($result->records[0]->exam_name); ?></small></td>
                     </tr>
                     <tr>
                        <td><small>Full Name: </td>
                        <td><small> <?php echo ucfirst($result->records[0]->full_name); ?></small></td>
                     </tr>
                     <tr>
                        <td><small>Registration Number: <small></td>
                        <td> <small><?php echo ucfirst($result->records[0]->registration_no); ?><br></small></td>
                     </tr>
                     <tr>
                        <td><small>Password: <small></td>
                        <td> <small><?php echo ucfirst($result->records[0]->password); ?><br></small></td>
                     </tr>
                     <tr>
                        <td><small>Date of Birth: <small></td>
                        <td> <small> <?php echo $result->records[0]->dob; ?></small> <br></td>
                     </tr>

                  </table>
               </address>
            </div>
            <?php

            foreach ($result as $key => $value) {
               foreach ($value as $key1 => $value1) {
            ?>

                  <div class="invoice-to">
                     <strong class="text-inverse">Customer Detail</strong>
                     <address class="m-t-5 m-b-5">

                     </address>
                  </div>
                  <div class="invoice-to">
                     <strong class="text-inverse">Plot Detail</strong>
                     <address class="m-t-5 m-b-5">
                        <img class="profile-user-img img-fluid " src="<?php echo  $img ?>" alt="User profile image">
                     </address>
                  </div>



                  <div class="invoice-date">
                     <strong class="text-inverse"></strong>
                     <img class="profile-user-img img-fluid " src="<?php echo  $img_thumb ?>" alt="User thumb image">
                  </div>

            <?php
               }
            }

            ?>
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th></th>
                        <th>Particular</th>
                        <th class="text-right" width="50%"></th>

                     </tr>
                  </thead>
                  <tbody>
                     <?php

                     foreach ($result as $key => $value) {
                        foreach ($value as $key1 => $value1) {
                     ?>

                           <tr>
                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Full Name</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-users text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->full_name ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Date Of Birth</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i> <?php echo ($value1->dob) ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Marital Status</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i> <?php echo $value1->marital_status ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Spouse Name</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->spouse_name ?></td>
                           </tr>


                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Father Name</span><br>
                              </td>
                              <td class="text-right"><i class="fa fa"> </i>
                                 <?php echo strtoupper($value1->father_name) ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Mother Name</span><br>
                              </td>
                              <td class="text-right"><i class="fa fa text-muted" style="font-size:12px;"></i>
                                 <?php echo strtoupper($value1->mother_name); ?></td>
                           </tr>

                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Phone No.</span><br>
                              </td>
                              <td class="text-right"><i class="fa fa-phone text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->mobile; ?></td>
                           </tr>

                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Alternate Mobile No.</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->alternate_no; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Corresponsding Address</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->cor_address; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Address 1</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->address1; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Address 2</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->address2; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Address 3</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->address3; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">District</span><br>
                              </td>
                              <td class="text-right"><i class="fa fa text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->district; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">State</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->state; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">PinCode</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->pincode; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Religion</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->religion; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Category</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->category; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Nationality</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->nationality; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Highest Qualification</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->h_qualification; ?></td>
                           </tr>

                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Subject/Streem/Degree</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->subject; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Percentage</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->h_percentage; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Grade</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->grade; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Passing Date</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->passing_date; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Language</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->languages; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Are You Able To Read?</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->is_read; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Are You Able To Write?</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->is_write; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Are You Able To Speak?</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->is_speak; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Disability Category</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->disability_cat; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Disability Type</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->disability_type; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Are You Ex-Serviceman?</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->ex_serviceman; ?></td>
                           </tr>

                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Are You Serving Defence Personnel?</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->serving_defence_per; ?></td>
                           </tr>
                           <tr>

                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Serving Period (In Month)</span><br>
                              </td>
                              <td class="text-right"><i class="fa-fa-user text-muted" style="font-size:12px;"></i>
                                 <?php echo $value1->service_period; ?></td>
                           </tr>
                           <tr>

                              <td>
                                 <span class="text-inverse"></span><br>
                              </td>
                              <td>
                                 <span class="text-inverse">Amount Paid</span><br>
                              </td>
                              <?php
                              $number = $amount;
                              $no = floor($number);
                              $point = round($number - $no, 2) * 100;
                              $hundred = null;
                              $digits_1 = strlen($no);
                              $i = 0;
                              $str = array();
                              $words = array(
                                 '0' => '', '1' => 'One', '2' => 'Two',
                                 '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
                                 '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
                                 '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
                                 '13' => 'Thirteen', '14' => 'Fourteen',
                                 '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
                                 '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty',
                                 '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
                                 '60' => 'Sixty', '70' => 'Seventy',
                                 '80' => 'Eighty', '90' => 'Ninety'
                              );
                              $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
                              while ($i < $digits_1) {
                                 $divider = ($i == 2) ? 10 : 100;
                                 $number = floor($no % $divider);
                                 $no = floor($no / $divider);
                                 $i += ($divider == 10) ? 1 : 2;
                                 if ($number) {
                                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                                    $str[] = ($number < 21) ? $words[$number] .
                                       " " . $digits[$counter] . $plural . " " . $hundred
                                       :
                                       $words[floor($number / 10) * 10]
                                       . " " . $words[$number % 10] . " "
                                       . $digits[$counter] . $plural . " " . $hundred;
                                 } else $str[] = null;
                              }
                              $str = array_reverse($str);
                              $result = implode('', $str);
                              $points = ($point) ?
                                 "." . $words[$point / 10] . " " .
                                 $words[$point = $point % 10] : '';

                              ?>
                              <td class="text-right"><i class="fa-fa-rupee"></i><?php echo $result . "Rupees Only ";  ?></td>
                           </tr>
                           <!-- <tr>
                     
                   <td>
                           <span class="text-inverse">8</span><br>
                          </td>
                        <td>
                           <span class="text-inverse">Outstanding Amount</span><br>
                          </td>
                        <td class="text-right">  <i class="fa fa-rupee text-muted" style="font-size:12px;"></i> <?php echo $value1->SitePurchaseAmount - $value1->PurchaseAmountPaid; ?></td>
                   </tr> -->
                     <?php
                        }
                     }

                     ?>
                  </tbody>
               </table>
            </div>
            <!-- end table-responsive -->
            <!-- begin invoice-price -->
            <div class="invoice-price">
               <div class="invoice-price-left">
                  <div class="invoice-price-row">
                     <div class="sub-price">
                        <small>SUBTOTAL</small>
                        <i class="fa fa-rupee text-muted" style="font-size:16px;"></i> <span class="text-inverse"><?php echo $result_exam->records[0]->amount ?></span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-plus text-muted"></i>
                     </div>
                     <div class="sub-price">
                        <small></small>
                        <i class="fa fa-rupee text-muted" style="font-size:16px;"></i>
                        <span class="text-inverse"></span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-minus text-muted"></i>
                     </div>

                     <div class="sub-price">
                        <small></small>
                        <i class="fa fa-rupee text-muted" style="font-size:16px;"></i>
                        <span class="text-inverse"></span>
                     </div>
                  </div>
               </div>
               <div class="invoice-price invoice-price-right">
                  <small>GRAND TOTAL</small>
                  <i class="fa fa-rupee text-muted" style="font-size:23px;"></i> <span class="text-inverse"><?php echo $amount; ?></span>
               </div>
            </div>

            <!-- end invoice-price -->
         </div>
         <div class="invoice-note">
            * The applicant shall be liable/responsible for any payment made by him any third account and right created from there and
            company shal have no liability in this regards<br>
            * This recipt is not transferable unles consented by the company<br>
            * Pleas keep this document in safe custody and in case same is
            lost/misplaced please inform to company immediately with request letter copy of FIR news cutting and affidavit<br>
            * This money receipt is subject to realiation of payment mode<br>
         </div>
         <br>
         <p class="text-center m-b-5 f-w-600">
            Stamp & Signture
         </p>
         <!-- end invoice-content -->
         <!-- begin invoice-note -->

         <!-- end invoice-note -->
         <!-- begin invoice-footer -->
         <div class="invoice-footer">
            <p class="text-center m-b-5 f-w-600">
               Contact Us
            </p>
            <p class="text-center">
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> pscityinfra.com</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> +918840019424</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> info.pscity@gmail.com</span>
            </p>
         </div>
         <!-- end invoice-footer -->
      </div>
   </div>
</div>
<div id="non-printable">
   <?php
   include "include/footer.php";
   ?>
</div>