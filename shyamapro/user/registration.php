<?php
include '../constant.php';

$url = $URL ."exam/read_exam.php";

$data=array();
$postdata1 = json_encode($data);
$results=giplCurl($url,$postdata1);

//print_r($results);

function giplCurl($api,$postdata){
      $url = $api; 
      $client = curl_init($url);
      curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
      curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
      $response = curl_exec($client);
      //print_r($response);
      return $result = json_decode($response);
  }
?>
<?php

if(isset($_POST["submit"])){
$exam_name = $_POST['exam_name'];
}else{
  header('location:Instructions.php');
  }
?>
<script>
function getFileData(object){
  //alert("Hello");
var file = object.files[0];
var name = file.name;//you can set the name to the paragraph id 
document.getElementById('selectedFile').innerHTML=name;//set name using core javascript
// alert(name);
}
function getFileThumbData(object){
  //alert("Hello");
var file = object.files[0];
var name = file.name;//you can set the name to the paragraph id 
document.getElementById('selectedFileThumb').innerHTML=name;//set name using core javascript
// alert(name);
}
</script>


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
  @media (max-width: 600px){
    .d-xs-block {
      display: block!important;
    }
  }
  .form-group sup {
    color: red;
  }
</style>
<body class="hold-transition">
<!-- <div class="register-box">
  <div class="register-logo mb-3">
    <a href="#"><b>REGISTRATION</b></a>
  </div>
  <div class="card card-success card-outline">
    <div class="card-body register-card-body"> -->

    <br>
    <div class="container">
  <center>
    <div class="container d-flex d-xs-block justify-content-center my-2">
      <img src="../website/assets/images/logo/logoSmall.png" class="img-fluid mx-3" alt="">
      <div>
        <h4>SHYAMAVSVSS KRISHI LIMITED</h4>
        <p>
          <b>CIN - U01100UP2022PLC170775</b> 
          <br>
          <b>WEBSITE - https://krishilimited.com/</b>
          <br>
          <b>Mobile No - 7307145971</b>
        </p>
      </div>
    </div>
  </center>
  <hr class="color:red;">

    <h1 align="center" class="register-logo">
    <a href="#"><b>REGISTRATION</b></a>
  </h1>
  <h1 class="text-center"><a href="../website/rrecruitment.php"><button class="btn btn-primary">Back</button></a></h1>
  <br>

    <div class="row align-items-start card">
      
      
      <h2 class="login-box-msg"><u>Personal Details</u></h2>
      <!-- <p class="login-box-msg"><a href="index.php"><b class="login-box-msg">Alreadr Register? Please Login.</b></a></p> -->
      <hr>
     
      <form action="action/registration_post.php" method="post" enctype="multipart/form-data">
      <div class="container-fluid">

  <div class="row">
    
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <label for="input">Apply For</label>
               <div class="input-group-append">
                 <div class="input-group-text">
                 <span class="fas fa-boxes"></span>
                </div>
                <input class="form-control" type="text" name="exam_name" value="<?php echo $exam_name; ?>" readonly>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-md-6">
          <div class="form-group">
           <label for="input">Full Name<sup>&#9733;</sup> </label>
             <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>
              <input type="text" class="form-control" placeholder="Full Name" name="full_name" autocomplete="off" required  data-toggle="tooltip" title="Please Enter Full Name">         
             </div>
          </div>
        </div>

        </div>
 
  <div class="row">
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Date of Birth<sup>&#9733;</sup></label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>
            <input class="form-control" type="date"  placeholder="dd-mm-yyyy" name="dob" autocomplete="off" required  data-toggle="tooltip" title="Please Enter Date of Birth">
            </div>
          </div>
            </div>

            <div class="col-sm-12 col-md-6">
               <div class="form-group">
  <label for="input">Gender<sup>&#9733;</sup> </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
              <select class="form-control" name="gender" required>
         <option class="form-control" value="">Please Select Gender</option>
             <option class="form-control" value="Male">Male</option>
             <option class="form-control" value="Female">Female</option>
             <option class="form-control" value="Other">Other</option>
         </select>

          </div>
          </div>
            </div>
            </div>

            <div class="row">

    
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Marital Status<sup>&#9733;</sup></label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>

              <select class="form-control" name="marital_status" required>
         <option class="form-control" value="">Please Select Marital Status</option>
         <option class="form-control" value="Married">Married</option>
             <option class="form-control" value="Unmarried">Unmarried</option>
                     </select>
                      </div>
          </div>
            </div>

            <div class="col-sm-12 col-md-6">
               <div class="form-group">
  <label for="input">Spouse Name </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            <input type="text" class="form-control" placeholder="Spouse Name" name="spouse_name" autocomplete="off"   data-toggle="tooltip" title="Please Enter Spouse Name">         

 </div>
          </div>
            </div>
            </div>

            <div class="row">

    
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Father Name<sup>&#9733;</sup> </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>
            <input type="text" class="form-control" placeholder="Father Name" name="father_name" autocomplete="off" required  data-toggle="tooltip" title="Please Enter Father Name">         

            </div>
          </div>
            </div>

            <div class="col-sm-12 col-md-6">
               <div class="form-group">
  <label for="input">Mother Name<sup>&#9733;</sup> </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>
              <input type="text" class="form-control" placeholder="Mother Name" name="mother_name" autocomplete="off" required  data-toggle="tooltip" title="Please Enter Mother Name">         
         
          </div>
          </div>
            </div>
            </div>

            <div class="row">
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Email<sup>&#9733;</sup></label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>

              <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off" required data-toggle="tooltip" title="Please Enter Email">         
         
            </div>
          </div>
            </div>

            <div class="col-sm-12 col-md-6">
               <div class="form-group">
  <label for="input">Mobile<sup>&#9733;</sup></label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
              <input type="text" class="form-control" minlength="10" maxlength="10" placeholder="Mobile No." name="mobile" autocomplete="off" required  data-toggle="tooltip" title="Please Enter Phone Number of 10 digits">         
         
            </div>
          </div>
            </div>
            </div>



            <div class="row">
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Correspondance Address<sup>&#9733;</sup> </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>

              <input type="text" class="form-control" placeholder="Correspondance Address" name="cor_address" autocomplete="off" required data-toggle="tooltip" title="Please Enter Correspondance Address">         
         
            </div>
          </div>
            </div>

            <div class="col-sm-12 col-md-6">
               <div class="form-group">
  <label for="input">Address 1<sup>&#9733;</sup></label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>
              <input type="text" class="form-control" placeholder="Address 1" name="address1" autocomplete="off" required  data-toggle="tooltip" title="Please Enter Address 1">         
         
            </div>
          </div>
            </div>
            </div>

            <div class="row">
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Address 2<sup>&#9733;</sup></label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>
              <input type="text" class="form-control" placeholder="Address 2" name="address2" autocomplete="off" required  data-toggle="tooltip" title="Please Enter Address">         
            </div>
          </div>
            </div>

            <div class="col-sm-12 col-md-6">
               <div class="form-group">
  <label for="input">Address 3<sup>&#9733;</sup> </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>
              <input type="text" class="form-control" placeholder="Address 3" name="address3" autocomplete="off" required data-toggle="tooltip" title="Please Enter Address3">         
         
            </div>
          </div>
            </div>
            </div>

            <div class="row">
  <!-- <div class="col-sm-12"> -->
    
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">District<sup>&#9733;</sup> </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-pin"></span>
              </div>
              <input type="text" class="form-control" placeholder="District" name="district" autocomplete="off" required  data-toggle="tooltip" title="Please Enter District Name">         
         
            </div>
          </div>
            </div>

            <div class="col-sm-12 col-md-6">
               <div class="form-group">
  <label for="input">Pincode<sup>&#9733;</sup></label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>
              <input type="text" minlength="6" maxlength="6" class="form-control" placeholder="Pincode" name="pincode" autocomplete="off" required  data-toggle="tooltip" title="Please Enter Pincode of 6 digits">
            </div>
          </div>
            </div>
            </div>


            
            <div class="row">
  <!-- <div class="col-sm-12"> -->
    
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">State<sup>&#9733;</sup> </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>
              <!-- <input type="text" class="form-control" placeholder="State" name="state" autocomplete="off" required  data-toggle="tooltip" title="Please Enter District Name">          -->
              <select class="form-control" name="state" required>
                <option value="" selected disabled>Please Select State</option>
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

      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="input">Category<sup>&#9733;</sup></label>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-boxes"></span>
              </div>
              <!-- <input type="text" class="form-control" placeholder="Category" name="category" autocomplete="off" required  data-toggle="tooltip" title="Please Enter Category Name">          -->
          
              <select class="form-control" name="category" required>
                <option class="form-control" value="">Please Select Category</option>
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
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Religion<sup>&#9733;</sup> </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
              <!-- <input type="text" class="form-control" placeholder="Religion" name="religion" autocomplete="off" required  data-toggle="tooltip" title="Please Enter Religion">          -->
              <select class="form-control" name="religion" required>
                <option class="form-control" value="">Please Select Religion</option>
                <option class="form-control" value="Hindu">Hindu</option>
                <option class="form-control" value="Muslim">Muslim</option>
                <option class="form-control" value="Sikh">Sikh</option>
                <option class="form-control" value="Christian">Christian</option>
              </select>
            </div>
          </div>
            </div>

            <div class="col-sm-12 col-md-6">
               <div class="form-group">
  <label for="input">Nationality<sup>&#9733;</sup></label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-flag"></span>
              </div>
              <input type="text" class="form-control" value="Indian" placeholder="Nationality" name="nationality" autocomplete="off" required  data-toggle="tooltip" title="Please Enter Nationality">         
          
            </div>
          </div>
            </div>
            </div>

            <div class="row">    
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Alternate Mobile<sup>&#9733;</sup> </label>

          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
              <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="Alternate Mobile No." name="alternate_mobile" autocomplete="off" required  data-toggle="tooltip" title="Please Enter alternate mobile of 10 digits">         
         
            </div>
          </div>
            </div>

            </div>



<h2 class="login-box-msg"><b><u>Qualification & Other Details</u></b></h2>
      <hr>
      <div class="row">    
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Highest Qualification<sup>&#9733;</sup> </label>
      <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-boxes"></span>
            </div>
         <select class="form-control" name="h_qualification" required>
            <option class="form-control" value="">Please select highest qualification</option>
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


       <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Subject/Stream/Degree Name<sup>&#9733;</sup> </label>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-graduation-cap"></span>
    </div>
  <input type="text" class="form-control" placeholder="Subject/Stream/Degree" name="subject" autocomplete="off" required>

</div>
          </div></div></div>

          <div class="row">    
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Passing Date<sup>&#9733;</sup></label>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-calendar"></span>
    </div>
  
  <input type="date" class="form-control" placeholder="Passing Date" name="passing_date" autocomplete="off" required>
          </div>
        </div>
      </div>

        <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Highest Qualification<sup>&#9733;</sup> </label>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-percent"></span>
    </div>
  
  <input type="text" class="form-control" placeholder="Marks Obtained(%)" name="h_percentage" autocomplete="off" required>
  </div>
          </div>
        </div>
</div> 

<div class="row">    
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Grade<sup>&#9733;</sup></label>
<div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-graduation-cap"></span>
            </div>
          
         <select class="form-control" name="grade" required>
         <option class="form-control" value="0">Please Select Grade</option>
         <option class="form-control" value="First">First</option>
             <option class="form-control" value="Second">Second</option>
             <option class="form-control" value="Third">Third</option>
         </select>
</div></div></div>
<div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Language<sup>&#9733;</sup></label>

        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-language"></span>
            </div>
          
         <select class="form-control" name="language" required>
         <option class="form-control" value="Hindi">Hindi</option>
             <option class="form-control" value="English">English</option>
             <option class="form-control" value="Other">Other</option>
         </select>
        </div>
          </div>
</div>
</div>

<div class="row">    
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Are You Able To Read?<sup>&#9733;</sup></label>
        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-book"></span>
            </div>
         
        <select class="form-control" name="read" required>
         <option class="form-control" value="Yes">Yes</option>
             <option class="form-control" value="No">No</option>
         </select>
        </div></div></div>

         <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Are You Able To Write?<sup>&#9733;</sup></label>
         <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-pen"></span>
            </div>
                   <select class="form-control" name="write" required>
         <option class="form-control" value="Yes">Yes</option>
             <option class="form-control" value="No">No</option>
         </select>
        </div>
          </div></div></div>
      
        <div class="row">    
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Are You Able To Speak?<sup>&#9733;</sup></label>
        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-microphone"></span>
            </div>
         <select class="form-control" name="speak" required>
         <option class="form-control" value="Yes">Yes</option>
             <option class="form-control" value="No">No</option>
         </select>
        </div></div></div>
        <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Disability Category?<sup>&#9733;</sup></label>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-wheelchair"></span>
    </div>
  <!-- <input type="text" class="form-control" placeholder="Disability Category" name="disability_cat" autocomplete="off"> -->
  <select class="form-control" name="disability_cat" required>
    <option class="form-control" value="Yes">Yes</option>
    <option class="form-control" value="No">No</option>
  </select>

</div></div></div></div>

<div class="row">    
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Disability Type (If Disability Category is Yes)<sup>&#9733;</sup></label>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-wheelchair"></span>
    </div>
  <input type="text" class="form-control" placeholder="Disability Type (If Any)" value="No" name="disability_type" autocomplete="off">
  
  </div></div></div>
  <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Are you Ex-Serviceman?<sup>&#9733;</sup></label>
<div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-spinner"></span>
    </div>
         <select class="form-control" name="ex_serviceman" required>
         <option class="form-control" value="No">No</option>
         <option class="form-control" value="Yes">Yes</option>
             
         </select>
</div></div></div></div>

<div class="row">    
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Are you Serving Defence Personnel?<sup>&#9733;</sup></label>

<div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-user"></span>
    </div>
         <select class="form-control" name="serving_defence_per" required>
         <option class="form-control" value="No">No</option>
         <option class="form-control" value="Yes">Yes</option>  
         </select>
</div></div></div>
<div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Service Period (In month)</label>

  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-clock"></span>
    </div>
 
  <input type="number" class="form-control" value="0" placeholder="Service Period of Serving Defence Personnel" name="service_period" autocomplete="off">
  </div></div></div>
</div>
  

<div class="row">    
          <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Upload Image<sup>&#9733;</sup></label>

                     <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  id="file" name="fileUpload" onchange='getFileData(this)' class="custom-file-input" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                    <label id="selectedFile"  style="background-color:skyblue;"></label>
                  </div></div>
           
                  <div class="col-sm-12 col-md-6">
          <div class="form-group">
  <label for="input">Upload Signature/Thumb Image (If you are literate then upload signature image)<sup>&#9733;</sup></label>
                     <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  id="fileThumb" name="fileUploadThumb" onchange='getFileThumbData(this)' class="custom-file-input" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                    <label id="selectedFileThumb"  style="background-color:skyblue;"></label>
                  </div>
                </div></div>

                <div class="row d-flex justify-content-center">
          <div class="col-6">
            <button type="submit" class="btn btn-success btn-block">Register</button>
          </div>
</div>
          <!-- /.col -->
        </div>
      </div>
      </form>

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
