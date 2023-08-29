<?php

  include "include/header.php";
  include '../constant.php';
  
$uid=$_SESSION["ID"];
$img="img/".$uid."/profile"."/".$uid.".png";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Welcome your profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php if(isset($_SESSION['profile_update'])) {?>
        <?php if(($_SESSION['profile_update']=="Profile updated succesfully.")) {?> 
    <div class="alert alert-success" id="success-alert" role="alert">
                <?php echo $_SESSION['profile_update']; unset($_SESSION['profile_update'])?> 
               </div>
            <?php  }
            else {         
            ?>
            <div class="alert alert-danger" id="success-alert" role="alert">
                <?php echo $_SESSION['profile_update']; unset($_SESSION['profile_update'])?> 
               </div>
            <?php }} ?>
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo  $img ?>"
                       alt="User profile picture">
                </div>
                    
                <?php 
								     
                     foreach($result as $key => $value){
                     foreach($value as $key1 => $value1)
                      {
                    ?>

                <h3 class="profile-username text-center"><?php echo ucfirst($value1->full_name) ?></h3>

                <p class="text-muted text-center"><?php echo  ucfirst($value1->father_name) ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  
                  <li class="list-group-item">
                    <b>Email:</b> <a class="float-right"><?php echo $value1->email ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Date of Birth:</b> <a class="float-right"><?php echo $value1->dob ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Address:</b> <a class="float-right"><?php echo  ucfirst($value1->address1) ?></a>
                  </li>
                </ul>
                 <?php
                      }
                    } 
                 ?>
                <!-- <a href="edit_profile.php" class="btn btn-primary btn-block"><b>Update More Details</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
   
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
                                <h3 class="card-title">Profile Details</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                 <?php 
								               
                                  foreach($result as $key => $value){
                                  foreach($value as $key1 => $value1)
                                   {
                                 ?>              
                                  <thead>
                                   <tr>
				      			                <th>Status</th>
				      			                <td><?php $status=$value1->status; if($status=="0") echo "PENDING/INACTIVE"; else if($status=="1") echo "ACTIVE"; else if($status=="2")  echo "REJECTED"; ?></td>
                                   </tr>
				      			               <tr>
				      			                <th>Name</th>
				      			                 <td><?php echo  ucfirst($value1->name) ?></td>
                                    </tr>
                                    <th>Father's Name</th>
				      			                <td><?php echo strtoupper($value1->f_name) ?></td>
                                   </tr>
                                   <th>Dob</th>
				      			                <td><?php echo date_format(date_create($value1->dob),'d-m-y') ?></td>
                                   </tr>
				      			               
				      			                <tr>
				      			                 <th>Mobile No</th>
				      			                 <td><?php echo $value1->mobile ?></td>
                                    </tr>
				      			                <tr>
				      			                 <th>Email-ID</th>
				      			                 <td><?php echo $value1->email ?></td>
                                    </tr>
				      			               <tr>
				      			                <th>Sponsor Name</th>
				      			                <td><?php echo  ucfirst($value1->name) ?></td>
                                   </tr>
				      			               <tr>
				      			                <th>Address</th>
				      			                <td><?php echo strtoupper($value1->address) ?></td>
                                   </tr>
                                   <tr>
				      			               
				      			               <tr>
				      			                <th>PAN-Number</th>
				      			                <td><?php echo  strtoupper($value1->pan) ?></td>
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
              </div><!-- /.card-body -->
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
<?php
include "include/footer.php";
                                 
?>
