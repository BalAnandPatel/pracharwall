<?php
//This page is used by admin to view the login details of created agents.
include '../constant.php';
$id=$_POST['id'];

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
  </div>
  <div class="card">
    <div class="card-body register-card-body">
       -->

       <br>
    <div class="container">

    <h1 align="center" class="register-logo">
    <a href="#"><b>REGISTRATION</b></a>
  </h1>

  <br>

    <div class="row align-items-start card">
      
      
      
      <h2 class="login-box-msg"><b><u>Update Details</u></b></h2>
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
             <form action="action/update_registration_post.php" method="post" enctype="multipart/form-data">
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
              <input type="text" class="form-control" placeholder="Exam Name" name="exam_name"   value="<?php echo $value1->exam_name ?>" readonly>         

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
              <input type="text" class="form-control" value="<?php echo $value1->full_name ?>"  placeholder="Full Name " name="full_name" autocomplete="off" required>         
          
          </div>
          </div>
            </div>
            </div>
 
  <div class="row">
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Date of Birth</label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-calendar"></span>
              </div>
            <input type="date" class="form-control" value="<?php echo date("Y-m-d", strtotime($value1->dob)) ?>"  name="dob"  placeholder="Date Of Birth"  autocomplete="off" required>         

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
            <!-- <input type="text" class="form-control"  value="<?php //echo $value1->gender ?>" name="gender"  placeholder="Gender" autocomplete="off" required>          -->
            <select class="form-control" name="gender" required>
             <option class="form-control" value="<?php echo $value1->gender ?>" selected><?php echo $value1->gender ?></option>
             <option class="form-control" value="Male">Male</option>
             <option class="form-control" value="Female">Female</option>
             <option class="form-control" value="Other">Other</option>
            </select>
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

              <!-- <input type="text" class="form-control"  placeholder="Marital Status" name="marital_status"   value="<?php //echo $value1->marital_status ?>"  autocomplete="off" required>          -->
            <select class="form-control" name="marital_status" required>
              <option class="form-control" value="<?php echo $value1->marital_status ?>" selected><?php echo $value1->marital_status ?></option>
              <option class="form-control" value="Married">Married</option>
              <option class="form-control" value="Unmarried">Unmarried</option>
            </select>
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
             <input type="text" class="form-control"  placeholder="Spaouse Name" name="spouse_name"  value="<?php echo $value1->spouse_name ?>" autocomplete="off">         
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
               <input type="text" class="form-control"  placeholder="Father Name" name="father_name"   value="<?php echo $value1->father_name ?>" autocomplete="off" required>         
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
               <input type="text" class="form-control"  placeholder="Mother Name" name="mother_name"   value="<?php echo $value1->mother_name ?>" autocomplete="off" required>         
                    
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

               <input type="email" class="form-control"  placeholder="Email" name="email"   value="<?php echo $value1->email ?>" autocomplete="off" required>         
        
         
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
               <input type="text" minlength="10" maxlength="10" class="form-control"  placeholder="Mobile" name="mobile"   value="<?php echo $value1->mobile ?>" autocomplete="off" required>         

         
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
               <input type="text" class="form-control"  placeholder="Correspondance Address" name="cor_address"   value="<?php echo $value1->cor_address ?>" autocomplete="off" required>         
              
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
               <input type="text" class="form-control"  placeholder="Address 1" name="address1"   value="<?php echo $value1->address1 ?>" autocomplete="off" required>         
         
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
               <input type="text" class="form-control"  placeholder="Address 2" name="address2"   value="<?php echo $value1->address2 ?>" autocomplete="off" required>         
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
               <input type="text" class="form-control"  placeholder="Address 3" name="address3"   value="<?php echo $value1->address3 ?>" autocomplete="off" required>         
       
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
               <input type="text" class="form-control"  placeholder="District" name="district"   value="<?php echo $value1->district ?>" autocomplete="off" required>                  
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
               <input type="text" class="form-control" minlength="6" maxlength="6"  placeholder="Pincode"  name="pincode"  value="<?php echo $value1->pincode ?>" autocomplete="off" required>                  

             
            </div>
          </div>
            </div>
            </div>


            
            <div class="row">
  <!-- <div class="col-sm-12"> -->
    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">State </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-pin"></span>
              </div>
              
               <!-- <input type="text" class="form-control"  placeholder="State" name="state"   value="<?php //echo $value1->state ?>" autocomplete="off" required>                   -->
               <select class="form-control" name="state" required>
                <option value="<?php echo $value1->state ?>" selected><?php echo $value1->state ?></option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Ladakh">Ladakh</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
              </select>
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
               <!-- <input type="text" class="form-control"  placeholder="Category" name="category"   value="<?php //echo $value1->category ?>" autocomplete="off" required>                   -->
               <select class="form-control" name="category" required>
                <option class="form-control" value="<?php echo $value1->category ?>" selected><?php echo $value1->category ?></option>
                <option class="form-control" value="General">General</option>
                <option class="form-control" value="OBC">OBC</option>
                <option class="form-control" value="SC">SC</option>
                <option class="form-control" value="ST">ST</option>
                <option class="form-control" value="EWS">EWS</option>
              </select>
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
               <!-- <input type="text" class="form-control"  placeholder="Religion" name="religion"   value="<?php //echo $value1->religion ?>" autocomplete="off" required> -->
               <select class="form-control" name="religion" required>
                <option class="form-control" value="<?php echo $value1->religion ?>" selected><?php echo $value1->religion ?></option>
                <option class="form-control" value="Hindu">Hindu</option>
                <option class="form-control" value="Muslim">Muslim</option>
                <option class="form-control" value="Sikh">Sikh</option>
                <option class="form-control" value="Christian">Christian</option>
              </select>
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
               <input type="text" class="form-control"  placeholder="Nationality" name="nationality"   value="<?php echo $value1->nationality ?>" autocomplete="off" required>                  
            
          
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
             <input type="text" minlength="10" maxlength="10" class="form-control"  placeholder=" Alternate Mobile"   name="alternate_mobile" value="<?php echo $value1->alternate_mobile ?>" autocomplete="off" >                  
            
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
              <span class="fas fa-boxes"></span>
            </div>
         <!-- <input type="text" class="form-control"  placeholder="Highest Qualification" name="h_qualification"   value="<?php echo $value1->h_qualification ?>" autocomplete="off" required> -->
          <select class="form-control" name="h_qualification" required>
            <option class="form-control" value="<?php echo $value1->h_qualification ?>" selected><?php echo $value1->h_qualification ?></option>
            <option class="form-control" value="Ph.D">Ph.D</option>
            <option class="form-control" value="Diploma">Diploma</option>
            <option class="form-control" value="Post Graduation">Post Graduation</option>
            <option class="form-control" value="Under Graduation">Under Graduation</option>
            <option class="form-control" value="Senior Secondary">Senior Secondary</option>
            <option class="form-control" value="Higher Secondary">Higher Secondary</option>
            <option class="form-control" value="Class 8th">Class 8th</option>
            <option class="form-control" value="Class 5th">Class 5th</option>
            <option class="form-control" value="Other">Other</option>
          </select>
      </div></div></div>


       <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Subject/Stream/Degree Name </label>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-graduation-cap"></span>
    </div>
  <input type="text" class="form-control"  placeholder="Subject/Stream/Degree Name" name="subject"   value="<?php echo $value1->subject ?>" autocomplete="off" required>                  

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
    <input type="date" class="form-control"  placeholder="Passing Date" name="passing_date"   value="<?php echo date("Y-m-d", strtotime($value1->passing_date)) ?>" autocomplete="off" required>                  
  
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
    <input type="text" class="form-control"  placeholder="Highest Qualification "  name="h_percentage"  value="<?php echo $value1->h_percentage ?>" autocomplete="off" required>
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
          
            <!-- <input type="text" class="form-control"  placeholder="Grade " name="grade"  value="<?php //echo $value1->grade ?>" autocomplete="off" required> -->
            <select class="form-control" name="grade" required>
         <option class="form-control" value="<?php echo $value1->grade ?>" selected><?php echo $value1->grade ?></option>
         <option class="form-control" value="First">First</option>
             <option class="form-control" value="Second">Second</option>
             <option class="form-control" value="Third">Third</option>
         </select>

</div></div></div>
<div class="col-sm-6">
          <div class="form-group">
  <label for="input">Language</label>

        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-language"></span>
            </div>
          
            <!-- <input type="text" class="form-control"  placeholder="Language "  name="languages"  value="<?php //echo $value1->languages ?>" autocomplete="off" required> -->
            <select class="form-control" name="languages" required>
             <option class="form-control" value="<?php echo $value1->languages ?>" selected><?php echo $value1->languages ?></option>
             <option class="form-control" value="Hindi">Hindi</option>
             <option class="form-control" value="English">English</option>
             <option class="form-control" value="Other">Other</option>
         </select>
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
         
            <!-- <input type="text" class="form-control"  placeholder=" Are You Able To Read?"  name="is_read"  value="<?php //echo $value1->is_read ?>" autocomplete="off" required>                   -->
          <select class="form-control" name="is_read" required>
            <option class="form-control" value="<?php echo $value1->is_read ?>" selected><?php echo $value1->is_read ?></option>
            <option class="form-control" value="Yes">Yes</option>
            <option class="form-control" value="No">No</option>
          </select>
        </div></div></div>

         <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Are You Able To Write?</label>
         <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-pen"></span>
            </div>
            <!-- <input type="text" class="form-control"  placeholder="Are You Able To Write? " name ="is_write"   value="<?php //echo $value1->is_write ?>" autocomplete="off" required>                   -->
            <select class="form-control" name="is_write" required>
         <option class="form-control" value="<?php echo $value1->is_write ?>" selected><?php echo $value1->is_write ?></option>
         <option class="form-control" value="Yes">Yes</option>
             <option class="form-control" value="No">No</option>
         </select>
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
            <!-- <input type="text" class="form-control"  placeholder=" Are You Able To Speak?" name="is_speak"   value="<?php //echo $value1->is_speak ?>" autocomplete="off" required> -->
            <select class="form-control" name="is_speak" required>
         <option class="form-control" value="<?php echo $value1->is_speak ?>" selected><?php echo $value1->is_speak ?></option>
         <option class="form-control" value="Yes">Yes</option>
             <option class="form-control" value="No">No</option>
         </select>
        </div></div></div>
        <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Disability Category?</label>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-wheelchair"></span>
    </div>
  <!-- <input type="text" class="form-control"  placeholder=" Disability Category?" name="disability_cat"   value="<?php //echo $value1->disability_cat ?>" autocomplete="off" >                   -->
  <select class="form-control" name="disability_cat" required>
         <option class="form-control" value="<?php echo $value1->disability_cat ?>" selected><?php echo $value1->disability_cat ?></option>
         <option class="form-control" value="Yes">Yes</option>
             <option class="form-control" value="No">No</option>
         </select>
</div></div></div></div>

<div class="row">    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Disability Type (If Any)</label>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-wheelchair"></span>
    </div>
  
  <input type="text" class="form-control"  placeholder="Disability Type (If Any)" name="disability_type"   value="<?php echo $value1->disability_type ?>" autocomplete="off" >                  
  
  </div></div></div>
  <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Are you Ex-Serviceman?</label>
<div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-spinner"></span>
    </div>
          <!-- <input type="text" class="form-control"  placeholder="Are you Ex-Serviceman? "  name="ex_serviceman"  value="<?php //echo $value1->ex_serviceman ?>" autocomplete="off" >                   -->
          <select class="form-control" name="ex_serviceman">
         <option class="form-control" value="<?php echo $value1->ex_serviceman ?>" selected><?php echo $value1->ex_serviceman ?></option>
         <option class="form-control" value="No">No</option>
         <option class="form-control" value="Yes">Yes</option>
         </select>
</div></div></div></div>

<div class="row">    
          <div class="col-sm-6">
          <div class="form-group">
  <label for="input">Are you Serving Defence Personnel?</label>

<div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-user"></span>
    </div>
     <!-- <input type="text" class="form-control"  placeholder=" Are you Serving Defence Personnel?"  name="serving_defence_per"  value="<?php //echo $value1->serving_defence_per ?>" autocomplete="off" >                   -->
     <select class="form-control" name="serving_defence_per" required>
         <option class="form-control" value="<?php echo $value1->serving_defence_per ?>" selected><?php echo $value1->serving_defence_per ?></option>
         <option class="form-control" value="No">No</option>
         <option class="form-control" value="Yes">Yes</option>  
         </select>
</div></div></div>
<div class="col-sm-6">
          <div class="form-group">
  <label for="input">Service Period</label>

  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-clock"></span>
    </div>
 
    <input type="text" class="form-control"  placeholder="Service Period " name="service_period"   value="<?php echo $value1->service_period ?>" autocomplete="off" >                  

  </div></div></div>
</div>


<div class="row">    
          <div class="col-sm-4">

          
          </div>
 
          <div class="col-sm-4">
          
            <input type="hidden" name="id" value="<?php echo $value1->id ?>" >
            
            <input type="hidden" name="registration_no" value="<?php echo $value1->registration_no ?>" >

            <button type="submit" class="btn btn-success btn-block">Update</button>
        
          </div>
          <!-- /.col -->
        </div>
                </div>
               
      </div>

      <?php 
                
              }
              }?>
             </form>

             <!-- <div class="col-sm-4">
 <form action="registration_view.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $value1->id ?>" >
            
            <input type="hidden" name="registration_no" value="<?php echo $value1->registration_no ?>" >

            <button type="submit" class="btn btn-warning btn-block">GO BACK</button>
        
 </form> 
          </div> -->

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