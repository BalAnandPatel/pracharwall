<?php
//This page is used by admin to view the login details of created agents.
include '../constant.php';
$id=$_GET['id'];

 $img="img/".$id."/profile"."/".$id.".png";
 $img_thumb="img/".$id."/profile"."/".$id."_thumb".".png";

$url = $URL ."registration/read_profile_by_id.php";

$data=array("id"=>$id);
$postdata1 = json_encode($data);
$results=giplCurl($url,$postdata1);

function giplCurl($api,$postdata){
    $url = $api; 
      $client = curl_init($url);
      curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
      curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
      $response = curl_exec($client);
    //  print_r($response);
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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">


</head>
<style>
  .card{
    padding: 20px;
    border-top: 3px solid green;
}
  body{
    background-color: #E9ECEF;
  }
</style>
<body class="hold-transition">
<!-- <div class="register-box">
  <div class="register-logo">
    <a href="#"><b>REGISTRATION</b></a>
  </div> -->

  <br>
    <div class="container">

    <h1 align="center" class="register-logo">
    <a href="#"><b>REGISTRATION</b></a>
  </h1>

<!--   
  <div class="card">
    <div class="card-body register-card-body"> -->
      <!-- <p class="login-box-msg"><a href="index.php"><b class="login-box-msg">Alreadr Register? Please Login.</b></a></p> -->
      
      <div class="row align-items-start card">

      <h2 class="login-box-msg"><b><u>Personal Details</u></b></h2>
      <hr>
      <div class="container-fluid">

<div class="row">
  
        <div class="col-sm-6">
  

      <img class="profile-user-img"
                       src="<?php echo  $img ?>"
                       alt="User image">
        </div> <div class="col-sm-6">
                       <img class="profile-user-img"
                       src="<?php echo  $img_thumb ?>"
                       alt="User thumb image">
           </div></div></div>
              <!-- form start -->
             <hr>
                <div class="card-body">

                <?php 
								     
                     foreach($results as $key => $value){
                     foreach($value as $key1 => $value1)
                      {
                    ?>

      <div class="container-fluid">

  <div class="row">
    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Post Name</label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>
              <input type="text" class="form-control" placeholder="<?php echo $value1->exam_name ?>" readonly>         

            </div>
          </div>
            </div>

            <div class="col-sm-6">
               <div class="form-group">
  <label for="input">Full Name </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
              <input type="text" class="form-control"  placeholder="<?php echo $value1->full_name ?>" name="full_name" readonly>         
          
          </div>
          </div>
            </div>
            </div>
 
  <div class="row">
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Date of Birth </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-calendar"></span>
              </div>
            <input type="text" class="form-control"  placeholder="<?php echo date("d-m-Y", strtotime($value1->dob)) ?>" readonly>         

            </div>
          </div>
            </div>

            <div class="col-sm-6">
               <div class="form-group">
  <label for="input">Gender </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            <input type="text" class="form-control"  placeholder="<?php echo $value1->gender ?>" readonly>         
          </div>
          </div>
            </div>
            </div>

            <div class="row">

    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Marital Status</label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>

              <input type="text" class="form-control"  placeholder="<?php echo $value1->marital_status ?>"  readonly>         

                      </div>
          </div>
            </div>

            <div class="col-sm-6">
               <div class="form-group">
  <label for="input">Spouse Name </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
             <input type="text" class="form-control"  placeholder="<?php echo $value1->spouse_name ?>" readonly>         
 </div>
          </div>
            </div>
            </div>

            <div class="row">

    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Father Name </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
               <input type="text" class="form-control"  placeholder="<?php echo $value1->father_name ?>" readonly>         
                    </div>
          </div>
            </div>

            <div class="col-sm-6">
               <div class="form-group">
  <label for="input">Mother Name </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
               <input type="text" class="form-control"  placeholder="<?php echo $value1->mother_name ?>" readonly>         
                    
          </div>
          </div>
            </div>
            </div>

            <div class="row">
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Email</label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>

               <input type="email" class="form-control"  placeholder="<?php echo $value1->email ?>" readonly>         
        
         
            </div>
          </div>
            </div>

            <div class="col-sm-6">
               <div class="form-group">
  <label for="input">Mobile</label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
               <input type="number" class="form-control" minlength="10"  placeholder="<?php echo $value1->mobile ?>" readonly>         

         
            </div>
          </div>
            </div>
            </div>



            <div class="row">
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Correspondance Address </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-home"></span>
              </div>
               <input type="text" class="form-control"  placeholder="<?php echo $value1->cor_address ?>" readonly>         
              
            </div>
          </div>
            </div>

            <div class="col-sm-6">
               <div class="form-group">
  <label for="input">Address 1</label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-home"></span>
              </div>
               <input type="text" class="form-control"  placeholder="<?php echo $value1->address1 ?>" readonly>         
         
            </div>
          </div>
            </div>
            </div>

            <div class="row">
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Address 2</label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-home"></span>
              </div>
               <input type="text" class="form-control"  placeholder="<?php echo $value1->address2 ?>" readonly>         
            </div>
          </div>
            </div>

            <div class="col-sm-6">
               <div class="form-group">
  <label for="input">Address 3 </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-home"></span>
              </div>
               <input type="text" class="form-control"  placeholder="<?php echo $value1->address3 ?>" readonly>         
       
            </div>
          </div>
            </div>
            </div>

            <div class="row">
  <!-- <div class="col-sm-12"> -->
    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">District </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-pin"></span>
              </div>
               <input type="text" class="form-control"  placeholder="<?php echo $value1->district ?>" readonly>                  
            </div>
          </div>
            </div>

            <div class="col-sm-6">
               <div class="form-group">
  <label for="input">Pincode</label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-pin"></span>
              </div>
               <input type="text" class="form-control"  placeholder="<?php echo $value1->pincode ?>" readonly>                  

             
            </div>
          </div>
            </div>
            </div>


            
            <div class="row">
  <!-- <div class="col-sm-12"> -->
    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">state </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-pin"></span>
              </div>
              
               <input type="text" class="form-control"  placeholder="<?php echo $value1->state ?>" readonly>                  
         
            </div>
          </div>
            </div>

            <div class="col-sm-6">
               <div class="form-group">
  <label for="input">Category</label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>
               <input type="text" class="form-control"  placeholder="<?php echo $value1->category ?>" readonly>                  
          
            </div>
          </div>
            </div>
            </div>
            
            <div class="row">    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Religion </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
               <input type="number" minlength="6" class="form-control"  placeholder="<?php echo $value1->religion ?>" readonly>                  
                      
            </div>
          </div>
            </div>

            <div class="col-sm-6">
               <div class="form-group">
  <label for="input">Nationality</label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-flag"></span>
              </div>
               <input type="text" class="form-control"  placeholder="<?php echo $value1->nationality ?>" readonly>                  
            
          
            </div>
          </div>
            </div>
            </div>

            <div class="row">    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Alternate Mobile </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
             <input type="text" class="form-control"  placeholder="<?php echo $value1->alternate_mobile ?>" readonly>                  
            
            </div>
          </div>
            </div>

            </div>



<h2 class="login-box-msg"><b><u>Qualification & Other Details</u></b></h2>
      <hr>
      <div class="row">    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Highest Qualification </label>
      <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-graduation-cap"></span>
            </div>
         <input type="text" class="form-control"  placeholder="<?php echo $value1->h_qualification ?>" readonly>                  
         
      </div></div></div>


       <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Subject/Stream/Degree Name </label>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-graduation-cap"></span>
    </div>
  <input type="text" class="form-control"  placeholder="<?php echo $value1->subject ?>" readonly>                  

</div>
          </div></div></div>

          <div class="row">    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Passing Date</label>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-calendar"></span>
    </div>
    <input type="text" class="form-control"  placeholder="<?php echo date("d-m-Y", strtotime($value1->passing_date)) ?>" readonly>                  
  
          </div>
        </div>
      </div>

        <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Highest Qualification </label>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-percent"></span>
    </div>
    <input type="text" class="form-control"  placeholder="<?php echo $value1->h_percentage ?>" readonly>
    </div>
          </div>
        </div>
</div> 

<div class="row">    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Grade</label>
<div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-graduation-cap"></span>
            </div>
          
            <input type="text" class="form-control"  placeholder="<?php echo $value1->grade ?>" readonly>                  

</div></div></div>
<div class="col-sm-6">
          <div class="form-group">
  <label for="input">Language</label>

        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-language"></span>
            </div>
          
            <input type="text" class="form-control"  placeholder="<?php echo $value1->languages ?>" readonly>                  

        </div>
          </div>
</div>
</div>

<div class="row">    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Are You Able To Read?</label>
        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-book"></span>
            </div>
         
            <input type="text" class="form-control"  placeholder="<?php echo $value1->is_read ?>" readonly>                  

        </div></div></div>

         <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Are You Able To Write?</label>
         <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-pen"></span>
            </div>
            <input type="text" class="form-control"  placeholder="<?php echo $value1->is_write ?>" readonly>                  

        </div>
          </div></div></div>
      
        <div class="row">    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Are You Able To Speak?</label>
        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-microphone"></span>
            </div>
            <input type="text" class="form-control"  placeholder="<?php echo $value1->is_speak ?>" readonly>                  

        </div></div></div>
        <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Disability Category?</label>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-wheelchair"></span>
    </div>
  <input type="text" class="form-control"  placeholder="<?php echo $value1->disability_cat ?>" readonly>                  

</div></div></div></div>

<div class="row">    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Disability Type (If Any)</label>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-wheelchair"></span>
    </div>
  
  <input type="text" class="form-control"  placeholder="<?php echo $value1->disability_type ?>" readonly>                  
  
  </div></div></div>
  <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Are you Ex-Serviceman?</label>
<div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-spinner"></span>
    </div>
          <input type="text" class="form-control"  placeholder="<?php echo $value1->ex_serviceman ?>" readonly>                  

</div></div></div></div>

<div class="row">    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Are you Serving Defence Personnel?</label>

<div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-user"></span>
    </div>
     <input type="text" class="form-control"  placeholder="<?php echo $value1->serving_defence_per ?>" readonly>                  

</div></div></div>
<div class="col-sm-6">
          <div class="form-group">
  <label for="input">Service Period</label>

  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-clock"></span>
    </div>
 
    <input type="text" class="form-control"  placeholder="<?php echo $value1->service_period ?>" readonly>                  

  </div></div></div>
</div>
<?php 
                
              }
              }?>

<div class="row">    
          <div class="col-sm-4">

          
          </div>
          <div class="col-sm-4">

          <form action="update_registration.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $value1->id ?>" >
            <input type="hidden" name="full_name" value="<?php echo $value1->full_name ?>" readonly>

            <input type="hidden" name="registration_no" value="<?php echo $value1->registration_no ?>" readonly>

                <input type="hidden" name="exam_name" value="<?php echo $value1->exam_name ?>" readonly>
            <button type="submit" class="btn btn-primary btn-block">Wants to Edit Details?</button>
          </form>
          </div>
          <div class="col-sm-4">
          <form action="payment.php" method="post" enctype="multipart/form-data">
          <!-- <div class="col-4"  style="margin: 0px 281px 0px;"> -->
            <input type="hidden" name="id" value="<?php echo $value1->id; ?>" >
            <input type="hidden" name="full_name" value="<?php echo $value1->full_name; ?>">

            <input type="hidden" name="registration_no" value="<?php echo $value1->registration_no; ?>">

                <input type="hidden" name="exam_name" value="<?php echo $value1->exam_name; ?>">
                <input type="hidden" name="mobile" value="<?php echo $value1->mobile; ?>">
                <input type="hidden" name="category" value="<?php echo $value1->category; ?>">
            <button type="submit" class="btn btn-success btn-block">Confirm & Pay</button>
          </form>
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