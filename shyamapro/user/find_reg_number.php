<?php
include '../constant.php';
error_reporting(0);
$full_name=strtoupper($_POST["full_name"]);
$mobile=$_POST["mobile"];

$url = $URL ."exam/read_get_reg_number.php";

$data=array("full_name"=>$full_name,"mobile"=>$mobile);
//print_r($data);
$postdata1 = json_encode($data);
$results=giplCurl($url,$postdata1);
//print_r($results);
if($results->message=="No record found"){
$_SESSION['find_reg_error'] = "Record not matched.";
header('location:../website/rrecruitment.php');
exit();  
}  

function giplCurl($api,$postdata){
     $url = $api; 
      $client = curl_init($url);
      curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
      curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
      $response = curl_exec($client);
      //print_r($response);
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
      
      <h2 class="login-box-msg"><b><u>Get Your Registration Number</u></b></h2>
      <a href="../website/rrecruitment.php">
      <button class="btn btn-primary btn-sm" id="button"><i class="fa fa-arrow-left mr-2"></i>Back</button></a>
      <button class="btn btn-primary btn-sm" id="printpagebutton" onclick="printpage()"><i class="fa fa-print mr-2"></i>Print</button>
   
      <hr>
  
    
       <div class="card-body">

      <div class="container-fluid">
   
   <p> Dear <b>Candidate</b>, Thank you for the registration</b> Your registration details are given below.</p>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">S.R</th>
      <th scope="col">Post Name</th>
      <th scope="col">Candidate's Name</th>
      <th scope="col">Mobile No.</th>
      <th scope="col">Registration No.</th>
    </tr>
  </thead>
  <tbody>
               <?php 
                     $counter=0;                
                     foreach($results as $key => $value){
                     foreach($value as $key1 => $value1)
                     {
                     
                  ?> 
    <tr>
      <th scope="row"><?php echo ++$counter; ?></th>
      <td><?php echo $value1->exam_name; ?></td>
      <td><?php echo $value1->full_name; ?></td>
      <td><?php echo $value1->mobile; ?></td>
      <td><?php echo $value1->registration_no; ?></td>
    </tr>
    <?php } } ?>    
  </tbody>
</table>
 </div>                   

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
        button.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
        button.style.visibility = 'visible';
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