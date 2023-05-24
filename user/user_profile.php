<?php
include "include/header.php";
// try{
$url = $URL."user/read_user_profile.php";

$userType=$_SESSION["USER_TYPE"]; 
$id=$_SESSION["USER_ID"];
$data = array("userType" =>$userType, "id"=>$id);
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
// if(isset($result->message))
// if ($result->message == "Access denied." && $result->error == "Expired token") {
//   unset($_SESSION['login_session']);
// // }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Welcome your profile</h1>
          </div><!-- /.col -->
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
             <div class="card card-primary">
              <div class="card-header rounded-0">
                <h3 class="card-title">Profile</h3>
              </div>
              </div>
            
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php 
        if(isset($_SESSION['profileupdate_success'])){
         echo '<div class="alert alert-success rounded-0">'.$_SESSION['profileupdate_success'].'</div>';
         unset($_SESSION['profileupdate_success']);
        } ?>
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
               <?php 
                     foreach($result as $key => $value){
                     foreach($value as $key1 => $value1)
                      {
                    ?>
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo $USER_PROFILE_IMGPATH.$value1->id.'/user_img_'.$value1->id.'.png' ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"></h3>
                <p class="text-muted text-center">
                  <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-default">
                    <i class="fas fa-upload pr-2"></i>Upload Profile Picture
                  </button>
                </p>

                <ul class="list-group list-group-unbordered mb-3">
                  
                  <li class="list-group-item">
                    <b>Name:</b><a class="float-right"><?php echo $value1->userName; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Mobile No:</b><a class="float-right"><?php echo $value1->userMobile; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email:</b><a class="float-right"><?php echo $value1->userEmail; ?></a>
                  </li>

                </ul>
                <form action="user_profile_update.php" method="post">
                <input type="hidden" name="userId" value="<?php echo $value1->id; ?>">
                <button type="submit" class="btn btn-primary"><b>Update Account Details</b></button>
               </form>
              </div>
               <?php
                      }
                    } 
                 ?>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
   
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Main content -->
                    <section class="content">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-header">
                                <h3 class="card-title">User Account Details</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                 <?php //if($L_ROLE->role=='Admin'||$L_ROLE->role=='Super_Admin') {?>
              <table id="example" class="table table-bordered table-striped">
                <?php// }else{?>
                  <table id="example" class="table table-bordered table-striped">
                    <?php// }?>
                                 <?php 
                                  foreach($result as $key => $value){
                                  foreach($value as $key1 => $value1)
                                   {
                                 ?>              
                                  <thead>
				      			               <tr>
				      			                <th class="col-md-3">Account Holder</th>
				      			                 <td><?php echo $value1->accountHolder; ?></td>
                                    </tr>
                                    <tr>
                                    <th class="col-md-3">Bank Name</th>
				      			                <td><?php echo $value1->bankName; ?></td>
                                   </tr>
                                   <tr>
                                   <th class="col-md-3">Branch Name</th>
				      			                <td><?php echo $value1->branchName; ?></td>
                                   </tr>
				      			                <tr>
				      			                 <th class="col-md-3">IFSC Code</th>
				      			                 <td><?php echo $value1->ifscCode; ?></td>
                                    </tr>
                                     <tr>
                                     <th class="col-md-3">Account No.</th>
                                     <td><?php echo $value1->accountNum; ?></td>
                                    </tr>
                                     <tr>
                                     <th class="col-md-3">Google Pay No.</th>
                                     <td><?php echo $value1->googlePayNum; ?></td>
                                    </tr>
                                     <tr>
                                     <th class="col-md-2">Phone Pay No.</th>
                                     <td><?php echo $value1->phonePayNum; ?></td>
                                    </tr>
				      			                <tr>
				      			                 <th class="col-md-2">Status</th>
				      			                 <td><?php if($value1->status=='1') echo '<b class="text-success">Active</b>'; ?></td>
                                    </tr>
				      			               
				      			               </thead>
			                              <?php 
                                      }
                                     } 
                                    ?>
                                </table>
                              </div>
                              <!-- /.card-body -->
                            </div>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                      <!-- /.container-fluid -->
                    </section>
    <!-- /.content -->
                  
                   </div>
                 
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div> <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- modal box start-->
   <div class="modal fade" id="modal-default">
     <?php 
         foreach($result as $key => $value){
         foreach($value as $key1 => $value1)
          {
      ?>  
        <div class="modal-dialog">
          <form action="action/upload_profile_post.php" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Upload Profile Photo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                 <div class="form-group">
                    <label>Upload Photo*</label>
                    <input type="file"  class="form-control" name="userPhoto" 
                     placeholder="Bank Name" autocomplete="off" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="hidden" name="userId" value="<?php echo $value1->id; ?>">
              <button type="submit" name="upload" class="btn btn-primary"><i class="fas fa-upload pr-2"></i>Upload</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
     <?php } } ?>
      <!-- modal box end-->
<?php
include "include/footer.php";
?>
