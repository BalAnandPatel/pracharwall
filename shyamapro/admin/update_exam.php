<?php
include "../constant.php";
 if(isset($_POST['exam_name'])){
  $exam_name = $_POST['exam_name'];
  $id = $_POST['id'];

  $url = $URL."exam/read_exam_details.php";
  $data = array("exam_name"=>$exam_name);

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
 header('location:exam_list.php'); 
 }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exam Details</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../common/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../common/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../common/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../common/build/scss/pages/_login_and_register.scss">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

</head>

<style>
  .card{
    padding: 20px;
    border-top: 3px solid green;
}
  body{
    background-color: lightgrey;
  }
</style>

<body class="hold-transition">
<!-- <div class="register-box">
  <div class="register-logo">
    <a href="#"><b></b></a>
  </div>
  <div class="card card-success card-outline">
    <div class="card-body register-card-body">
       -->
      

    <div class="container">

    <br><br>
    <div class="row align-items-start card">
      
      <h2 class="login-box-msg"><b><u>Update Vacancy Details</u></b></h2>
      <hr>
     <form action="action/update_exam_post.php" method="post" enctype="multipart/form-data">
      <div class="container-fluid">
         <?php 
                     
                     foreach($result as $key => $value){
                     foreach($value as $key1 => $value1)
                     {
                     
                  ?>  

  <div class="row">
    
         
  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="form-group">
  <label for="input">Post Name </label>

          <div class="input-group-append">
           <input type="hidden" name="id" value="<?php echo $value1->id; ?>">
              <input type="text" class="form-control" name="exam_name" value="<?php echo $value1->exam_name; ?>" autocomplete="off"  data-toggle="tooltip" readonly>         
          
          </div>
          <small id="emailHelp" class="form-text text-muted">Post Name can not be same.</small>
          </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="form-group">
  <label for="input">Post Type</label>

          <div class="input-group-append">
             <input type="text" class="form-control"  name="type" value="<?php echo $value1->type; ?>" autocomplete="off" data-toggle="tooltip">          
          
          </div>
          </div>
            </div>
            </div>
 
  <div class="row">
     <div class="col-lg-4 col-md-4 col-sm-12 col-12">
               <div class="form-group">
                 <label for="input">General Fee </label>
       <div class="input-group mb-3">
         <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon3">General Fee</span>
          </div>
            <input type="text" class="form-control" name="general_fee" placeholder="Amount" autocomplete="off" value="<?php echo $value1->general_fee; ?>" required>
          </div>
          </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
               <div class="form-group">
           <label for="input">OBC Fee </label>
       <div class="input-group mb-3">
         <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon3">OBC Fee</span>
          </div>
            <input type="text" class="form-control" name="obc_fee" placeholder="Amount" autocomplete="off" value="<?php echo $value1->obc_fee; ?>" required>
          </div>
          </div>
            </div>
             <div class="col-lg-4 col-md-4 col-sm-12 col-12">
               <div class="form-group">
     <label for="input">SC Fee </label>
       <div class="input-group mb-3">
         <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon3">SC Fee</span>
          </div>
            <input type="text" class="form-control" name="sc_fee" placeholder="Amount" autocomplete="off" value="<?php echo $value1->sc_fee; ?>" required>
          </div>
          </div>
            </div>
             <div class="col-lg-4 col-md-4 col-sm-12 col-12">
               <div class="form-group">
   <label for="input">ST Fee</label>
       <div class="input-group mb-3">
         <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon3">ST Fee</span>
          </div>
            <input type="text" class="form-control" name="st_fee" placeholder="Amount" autocomplete="off" value="<?php echo $value1->st_fee; ?>" required>
          </div>
          </div>
            </div>
             <div class="col-lg-4 col-md-4 col-sm-12 col-12">
               <div class="form-group">
   <label for="input">EWS Fee</label>

       <div class="input-group mb-3">
         <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon3">EWS Fee</span>
          </div>
            <input type="text" class="form-control" name="ews_fee" placeholder="Amount" autocomplete="off" value="<?php echo $value1->ews_fee; ?>" required>  
          </div>
          </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
               <div class="form-group">
                <label for="input">Age</label>
             <div class="input-group mb-3">
              <input type="text" class="form-control" name="age" value="<?php echo $value1->age; ?>" autocomplete="off"   data-toggle="tooltip">          
          
          </div>
          </div>
            </div>
          </div>

            <div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="form-group">
  <label for="input">Eligibility</label>

          <div class="input-group-append">
             
               <input type="text" class="form-control" name="eligibility" value="<?php echo $value1->eligibility; ?>" autocomplete="off"  data-toggle="tooltip">         
          
          </div>
          </div>
            </div>
          
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="form-group">
  <label for="input">Total Post</label>

          <div class="input-group-append">
          
               <input type="text" class="form-control" name="total_post" value="<?php echo $value1->total_post; ?>" autocomplete="off"  data-toggle="tooltip">           
          
          </div>
          </div>
            </div>
          </div>

            <div class="row">

    
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="form-group">
  <label for="input">Exam Start Date </label>

          <div class="input-group-append">
              
        <input type="text" class="form-control" name="exam_date_start" 
            value="<?php echo date('d-m-Y',strtotime($value1->exam_date_start)); ?>"  autocomplete="off"  data-toggle="tooltip">          

            </div>
          </div>
            </div>

             <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="form-group">
  <label for="input">Exam End date </label>

          <div class="input-group-append">
            
              <input type="text" class="form-control" name="exam_date_end" value="<?php echo date('d-m-Y',strtotime($value1->exam_date_end)); ?>" autocomplete="off"  data-toggle="tooltip">          

            </div>
          </div>
            </div>
            </div>

            <div class="row">


             <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="form-group">
  <label for="input">Admit Card Release Date </label>

          <div class="input-group-append">
              
           <input type="text" class="form-control" name="admit_card_date" 
            value="<?php echo date('d-m-Y',strtotime($value1->admit_card_date)); ?>"  autocomplete="off"  data-toggle="tooltip">        

            </div>
          </div>
            </div>

               <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="form-group">
  <label for="input">Result Release Date</label>

          <div class="input-group-append">
             
            <input type="text" class="form-control" name="result_date" value="<?php echo date('d-m-Y',strtotime($value1->result_date)); ?>"  autocomplete="off" data-toggle="tooltip">        

            </div>
          </div>
            </div>
            </div>
           
                  <div class="row d-flex justify-content-center">
          <div class="col-6">
             <button type="submit" name="update_exam" class="btn btn-success btn-block">Update</button>
          </div>
          </div>
          <!-- /.col -->
        <?php } } ?>
        </div>
      </div>
      </form>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
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
