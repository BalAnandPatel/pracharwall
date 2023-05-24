<?php
include "include/header.php";
// try{
$url = $URL."user/read_user_profile.php";
$userType=$_SESSION["USER_TYPE"];
$id=$_SESSION['USER_ID'];
$data = array( "userType" =>$userType, "id"=>$id);
//print_r($data);
$postdata = json_encode($data);
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
// curl_setopt(
//   $client,
//   CURLOPT_HTTPHEADER,
//   array(
//     'Content-Type: application/json',
//     'Authorization: Bearer ' . $token
//   )
// );
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
$result = json_decode($response);
//print_r($result);
$userid=$result->records[0]->id;
$user_img=$USER_PROFILE_IMGPATH.$userid."/user_img_".$userid.".png";
// if(isset($result->message))
// if ($result->message == "Access denied." && $result->error == "Expired token") {
//   unset($_SESSION['login_session']);
// // }
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Profile Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo $user_img; ?>"
                       alt="User profile picture">
                </div>

                <?php 
								     foreach($result as $key => $value){
                     foreach($value as $key1 => $value1)
                      {
                    ?>

<h3 class="profile-username text-center"><?php echo $value1->userName; ?></h3>


<ul class="list-group list-group-unbordered mb-3">
  
  <li class="list-group-item">
    <b>Name:</b> <a class="float-right"><?php echo $value1->userName; ?></a>
  </li>
  <li class="list-group-item">
    <b>Mobile No:</b> <a class="float-right"><?php echo $value1->userMobile; ?></a>
  </li>
  <li class="list-group-item">
    <b>Email Id:</b> <a class="float-right"><?php echo $value1->userEmail; ?></a>
  </li>
 
</ul>
<?php
      }
    } 
 ?>
                <a href="user_profile.php" class="btn btn-primary btn-block"><b>Go Back Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
              </div>
              <form action="action/user_profile_update_post.php" method="post">
              <?php 
								               foreach($result as $key => $value){
                               foreach($value as $key1 => $value1)
                                {
                              ?> 
                <div class="card-body">
                <div class="form-group">
                    <label>Account Holder*</label>
                    <input type="text" style="text-transform:capitalize;" class="form-control" name="accountHolder" 
                    value="<?php echo $value1->accountHolder; ?>" placeholder="Account Holder" autocomplete="off" required>
                </div>

                 <div class="form-group">
                    <label>Bank Name*</label>
                    <input type="text" style="text-transform:capitalize;" class="form-control" name="bankName" 
                    value="<?php echo $value1->bankName; ?>" placeholder="Bank Name" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label>Branch Name*</label>
                    <input type="text" style="text-transform:capitalize;" class="form-control" name="branchName" 
                    value="<?php echo $value1->branchName; ?>" placeholder="Branch Name" autocomplete="off" required>
                </div>

				        <div class="form-group">
                    <label>IFSC Code*</label>
                    <input type="text" style="text-transform:uppercase;" class="form-control" name="ifscCode" 
                    value="<?php echo $value1->ifscCode; ?>" placeholder="IFSC Code" autocomplete="off" required>
                </div>

				        <div class="form-group">
                    <label for="exampleInputEmail1">Account No.*</label>
                    <input type="number" class="form-control" name="accountNum" 
                    value="<?php echo $value1->accountNum; ?>" id="exampleInputtext" placeholder="Account No." autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Phone Pay No.*</label>
                    <input type="number" class="form-control" name="phonePayNum" 
                    value="<?php echo $value1->phonePayNum; ?>" id="exampleInputtext" placeholder="Phone Pay No." autocomplete="off" required>
                </div>

                 <div class="form-group">
                    <label for="exampleInputEmail1">Google Pay No.*</label>
                    <input type="number" class="form-control" name="googlePayNum" 
                    value="<?php echo $value1->googlePayNum; ?>" id="exampleInputtext" placeholder="Google Pay No." autocomplete="off" required>
                </div>

                <div class="card-footer">
                  <input type="hidden" name="userId" value="<?php echo $value1->id; ?>">
                  <button type="submit" name="update_profile" class="btn btn-primary">Update Profile</button>
                </div>
                <?php 
                                      }
                                     } 
                                    ?>
              </form>
            </div>
<!-----------*******************------->			
            </div>
          </div>
       </div>
 </section>
    <!-- /.content -->
  </div>
                                    </div>
  <!-- /.content-wrapper -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<?php
include "include/footer.php";
// }
// catch (Exception $e){

//    if($e->getMessage() == "Expired token"){

     
//  // set response code
//        http_response_code(401);
   
//        // show error message
//        echo json_encode(array(
//            "message" => "Access denied.",
//            "error" => $e->getMessage()
//        ));

          
//    } else {

//        die();
//        }
//    }

?>
