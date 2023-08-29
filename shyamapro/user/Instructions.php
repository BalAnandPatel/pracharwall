<?php
  include "../constant.php";
  if(isset($_POST["submit"])){
  $exam_name = $_POST["exam_name"];
  $id = $_POST["id"];
  $url = $URL."exam/read_exam_details.php";
  $data = array("id"=>$id, "exam_name"=>$exam_name);

  //print_r($data);
  $postdata = json_encode($data);
  $client = curl_init($url);
  curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
  //curl_setopt($client, CURLOPT_POST, 5);
  curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
  $response = curl_exec($client);
  //print_r($response);
  $result = json_decode($response);
  //print_r($result);
  }else{
  header('location:../website/rrecruitment.php');  
  }
  ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SHYAMAVSVSS KRISHI LIMITED</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../common/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../common/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">


<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper m-auto">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        
          <div class="col-lg-10 m-auto">

            <div class="card card-success card-outline">
              <div class="card-header text-center text-success text-bold">
                <h5 class="m-0"><u>INSTRUCTIONS AND PROCEDURE FOR ONLINE SUBMISSION OF APPLICATION FORM</u></h5>
              </div>
              <div class="card-body">
                <h5 class="card-title mb-2"><b>Exam Details</b></h5>
               <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                   <tr>
                     <th scope="col">POST NAME</th>
                     <th scope="col">POST ELIGIBILITY</th>
                     <th scope="col">TOTAl POST</th>
                     <th scope="col">AGE</th>
                     <th scope="col">START DATE</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                     
                     foreach($result as $key => $value){
                     foreach($value as $key1 => $value1)
                     {
                     
                    ?>  
                    <tr>
                      <td><?php  echo $value1->exam_name; ?></td>
    
                      <td><?php  echo $value1->eligibility; ?></td>
                      <td><?php  echo $value1->total_post; ?></td>
                      <td><?php  echo $value1->age; ?></td>
                      <td>
                        <?php 
                         $date = date("d-m-Y", strtotime($value1->exam_date_start)); 
                         echo $date=="01-01-1970" ? '0' : $date; 
                        ?>
                      </td>
                    </tr>
                  <?php  } } ?>
                  </tbody>
                </table>
              </div>
              <h5 class="card-title mb-2"><b>Application Fee Details</b></h5>
               <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                   <tr>
                     <th scope="col">POST NAME</th>
                     <th scope="col">GENERAL</th>
                     <th scope="col">OBC</th>
                     <th scope="col">SC</th>
                     <th scope="col">ST</th>
                     <th scope="col">EWS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                     
                     foreach($result as $key => $value){
                     foreach($value as $key1 => $value1)
                     {
                     
                    ?>  
                    <tr>
                      <td><?php  echo $value1->exam_name; ?></td>
    
                      <td><?php  echo $value1->general_fee; ?>/-</td>
                      <td><?php  echo $value1->obc_fee; ?>/-</td>
                      <td><?php  echo $value1->sc_fee; ?>/-</td>
                      <td><?php  echo $value1->st_fee; ?>/-</td>
                      <td><?php  echo $value1->ews_fee; ?>/-</td>
                    </tr>
                  <?php  } } ?>
                  </tbody>
                </table>
              </div>
              </div>

                <div class="card-body">
                <h5 class="card-title mb-2"><b>Instructions and Procedure for online submission of Application Form</b></h5>
                <p class="card-text"><i class="fa fa-hand-point-right mr-2"></i>
                Please read the Information Bulletin of <?php // echo $value1->exam_name; ?> <?php // echo date("M Y",strtotime($value1->exam_date_start)); ?> carefully before you start filling the Online Application  Form.</p>
                <p class="card-text"><i class="fa fa-hand-point-right mr-2"></i>
                Candidates can apply for <?php // echo $value1->exam_name; ?> <?php // echo date("M Y",strtotime($value1->exam_date_start)); ?> ‘ON-LINE’ through website http://krishilimited.com
                </p>
                <p class="card-text"><i class="fa fa-hand-point-right mr-2"></i>
                  The candidate should supply all details while filling the Online Form. Candidates are required to take a print out of the computer generated Confirmation Page with Registration Number after successful submission of data.
                </p>
                <p class="card-text"><i class="fa fa-hand-point-right mr-2"></i>
                Candidates are not required to send hard copy of confirmation page to Department,. However, the candidates are advised to retain the hard copy of the application i.e. confirmation page, for future reference.</p>
                <p class="card-text"><i class="fa fa-hand-point-right mr-2"></i>
                The fee can be remitted in the following ways:</p>
                <ol type="1">
                  <li>By Debit/Credit Card.</li>
                  <li> By Internet Banking.</li>
                </ol>
                <p class="card-text"><i class="fa fa-hand-point-right mr-2"></i>
                Application Procedure: 3 Simple Steps to be followed to apply online</p>
                <p class="card-text"><b>Step 1:</b> Fill in the Online Application Form and note down system generated Registration No./Application No. The candidate should supply all details while filling the Online Form. After successful submission of the data, Registration No. will be generated and it will be used to complete the remaining Steps of the Application Form and also required for all future correspondence.</p>
                <p class="card-text"><b> Upload latest Photograph and Signature</b></p>
                <p class="card-text"><b>Note:</b></p>
                <ul>
                  <li>Latest photographs and signature should be in jpg format.</il>
                  <li>Size of the photo image must be greater than 10 kb and less than 100 kb.</il>
                  <li>Size of the signature image must be greater than 3 kb and less than 30 kb.</il>
                </ul>
                <p><b>Note:</b> The candidate particulars can be edited till the payment of fees has not been made. Once the payment of fees has been made, candidate particulars cannot be edited at this stage. Thereafter corrections can be made only during the period in which online correction will be allowed as per the given schedule of <?php // echo $value1->exam_name; ?> <?php // echo date("M Y",strtotime($value1->exam_date_start)); ?> . No change will be accepted through offline mode i.e. through fax/application or by email etc. No correspondence in this regard will be entertained.</p>
                <p class="card-text"><b>Step 2:</b> Pay Examination Fee by debit card/credit card or Pay Examination Fee by Internet Banking.</p>
                <p class="card-text"><b>Step 3:</b> Print Confirmation Page for your record and future reference. All Steps are mandatory, On-line application submission will be considered as complete only after receipt of “Confirmation Page” by candidate.</p>
                <form action="registration.php" method="post">
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" required>
                    <input type="hidden" name="exam_name" value="<?php  echo $exam_name; ?>">
                    <label class="form-check-label" for="gridCheck">
                     I have downloaded Information Bulletin, read and understood all the Instructions therein as well as those mentioned above, and filling up the online application form accordingly.
                    </label>
                   </div>
                </div>
                <!-- <div class="btn btn-success">Click hear to Proceed</div> -->
                <a href="registration.php">
                <button type="submit" name="submit" class="btn btn-success btn-sm btn-block">
                  Click here to Proceed
                </button>
              </a>
               </form>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../common/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../common/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../common/dist/js/adminlte.min.js"></script>
</body>
</html>
