<?php
include "include/header.php";
$url = $URL . "user/read_allusers_list.php";
$url_wall = $URL . "user/read_user_wall.php";
$userType='2';
$status = '0';
//read user details

$data = array("status"=>$status, "userType"=>$userType, "userId"=>"");
//print_r($data);
$postdata = json_encode($data);
$result = giplCurl($url,$postdata);
//print_r($result);
$userId="";
if(isset($result->records[0]->id)){
$userId = $result->records[0]->id;  
}
// get wall uploaded active post    
$wall_data = array("status"=>'1', "userId"=>$userId);
//print_r($data);
$wall_postdata = json_encode($wall_data);
$wall_result = giplCurl($url_wall,$wall_postdata);
//print_r($wall_result);
if(isset($wall_result->records[0]->wallImg)){
$wall_img = $wall_result->records[0]->wallImg;
}else{
$wall_img=""; 
}

function giplCurl($url,$postdata){
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($client, CURLOPT_POST, 5);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
return $result = json_decode($response);
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <h1>Regiserd Users</h1> -->
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User's Details</li>
            <li class="breadcrumb-item active">Registerd Users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- <div class="alert alert-success" id="success-alert" role="alert"> 
               </div>
          
            <div class="alert alert-danger" id="success-alert" role="alert">
               </div> -->


      <div class="row">
        <div class="col-12">
          <div class="card">

          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">REGISTERD USERS DETAILS</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                  <tr class="table-warning">
                    <th>Sr No.</th>
                    <th>User Img</th>
                    <th>User Name</th>
                    <th>Mobile No.</th>
                    <th>Email Id</th>
                    <th>Status</th>
                    <th>View</th>
                    <th>Create date</th>
                    <th>Approve</th>
                    <th>Reject</th>
                  </tr>

                </thead>
                <tbody>
                  <?php
                  $counter = '0';
                  foreach ($result as $key => $value) {
                    foreach ($value as $key1 => $value1) {
                      ?>
                      <tr>
                        <td>
                          <?php echo ++$counter; ?>
                        </td>
                        <td>
                          <?php $uid = $value1->id; ?>
                          <img class="img-fluid img-thumbnail rounded-circle" height="100" width="100" src="<?php echo $USER_PROFILE_IMGPATH.$uid."/user_img_".$uid.".png"; ?>" alt="user image">
                        </td>
                        <td>
                          <?php echo $value1->userName; ?>
                        </td>
                        <td>
                          <?php echo $value1->userMobile; ?>
                        </td>
                        <td>
                          <?php echo $value1->userEmail; ?>
                        </td>
                        <td>
                          <?php if ($value1->status == 0)
                            echo '<button type="button" class="btn btn-light btn-sm text-primary">PENDING</button>'; 
                          else
                            echo '<button type="button" class="btn btn-light btn-sm text-primary">ACTIVE</button>'; ?>
                        </td>
                        <td>
                         <?php if(!empty($value1->businessCategory)) { ?>
                          <a type="button" class="btn btn-secondary" data-toggle="modal" data-target="#viewProfile" onclick="getProfileList(<?php echo $value1->id; ?>)">View</a>
                         <?php }else{ ?>
                            <button type="button" class="btn btn-secondary btn-xs" disabled>Details Pending</button> 
                         <?php } ?>
                        </td>
                        <td>
                          <?php echo date('d-m-Y', strtotime($value1->createdOn)); ?>
                        </td>
                        <td class="col-md-1">
                          <form action="action/user_approve_post.php" method="post">
                            <input type="hidden" name="userId" value="<?php echo $value1->id; ?>">
                            <?php if(!empty($value1->businessCategory) && !empty($wall_img)){ ?>
                            <button type="submit" name="submit" class="btn btn-success btn-sm">Approve</button>
                            <?php }else{ ?>
                            <button type="button" class="btn btn-success btn-sm" disabled>Approve</button> 
                            <?php } ?>
                          </form>
                        </td>
                        <td class="col-md-1">
                          <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#remark" onclick="rejectUsers(<?php echo $value1->id; ?>)">Reject</button>
                        </td>
                      </tr>
                      <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

</div>
<script>

    //This method for reject user details
     function rejectUsers(id){
     //alert(id);
     document.getElementById("rejectUserId").value = id;
     }

    
    // read user profle details

    function getProfileList(id) {
    // alert(id);
    // var id;    
    // var userType=2;    
    // var status=0;    
    // myData = {userId:id,userType:userType,status:status };
    // console.log(myData);    
    $.ajax({
      url:"<?php echo $BASE_URL ?>admin/action/get_data.php",   
      type:'POST',  
      dataType:'json',  
      data:{
        "userId":id 
      },
      success: function(response) {
        console.log(response);
        console.log("depth" + JSON.stringify(response));
        // console.log(response.records[0].userName);
        // alert("response");
        // document.getElementById("viewUserName").innerHTML = response.records[0].userName;
        // document.getElementById("viewUserEmail").innerHTML = response.records[0].userEmail;
        // document.getElementById("viewUserMobile").innerHTML = "+91-"+response.records[0].userMobile;
        document.getElementById("viewBusinessCategory").innerHTML = response.records[0].businessCategory;
        document.getElementById("viewUserAddress").innerHTML = response.records[0].userAddress;
        document.getElementById("viewUserServices").innerHTML = response.records[0].userServices;
        document.getElementById("viewAlterMobile").innerHTML = response.records[0].alterMobile;
        document.getElementById("viewBusinessDay").innerHTML = response.records[0].businessDay;
        document.getElementById("viewUserWebsite").innerHTML = response.records[0].userWebsite;
        document.getElementById("viewEstablishmentYear").innerHTML = response.records[0].establishmentYear;
        document.getElementById("viewPaymentMode").innerHTML = response.records[0].paymentMode;
        document.getElementById("viewBusinessTiming").innerHTML = response.records[0].businessTiming;
        document.getElementById("viewAboutUser").innerHTML = response.records[0].aboutUser;
        document.getElementById("viewBusinessName").innerHTML = response.records[0].businessName;
        document.getElementById("viewCity").innerHTML = response.records[0].city;
        document.getElementById("viewState").innerHTML = response.records[0].state;

      }  
    });    
 
  }
</script>


  <!-- Modal for user profile details (Admin)-->
  <div class="modal fade" id="viewProfile" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-body">
          <p>View More Details</p>
          <!-- <iframe src="http://localhost/pracharwall/profile_view.php?id=5" width="100%" height="300"  title="description"></iframe> -->
            <section class="bg-light">
                        <div class="container py-3">

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body text-center">
                                        <h5 id="viewUserName" class="my-3">Business Banner</h5>
                                            <img src="<?php echo $USER_WALL_IMGPATH.$userId."/".$wall_img; ?>" alt="user image"
                                                class="rounded-0 img-fluid img-thumbnail" height="100%" width="100%">
                                            <!--<p id="viewUserEmail" class="text-muted mb-1"></p>-->
                                            <!-- <p id="viewUserMobile" class="text-muted mb-4"></p> --> 
                                            <!-- <div class="d-flex justify-content-center mb-2">
                                                <button type="button" class="btn btn-primary">Edit Proflie <i
                                                        class="bi bi-pencil-square"></i></button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Business Category</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="viewBusinessCategory" class="text-muted mb-0"></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Business Name</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="viewBusinessName" class="text-muted mb-0"></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Address</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="viewUserAddress" class="text-muted mb-0"></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Alernate Mobile</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="viewAlterMobile" class="text-muted mb-0"></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">City</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="viewCity" class="text-muted mb-0"></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">State</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="viewState" class="text-muted mb-0"></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Establishment of Year</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="viewEstablishmentYear" class="text-muted mb-0"></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Payment Mode</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="viewPaymentMode" class="text-muted mb-0"></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Business Timing</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="viewBusinessTiming" class="text-muted mb-0"></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Business Days</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="viewBusinessDay" class="text-muted mb-0"></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Website</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="viewUserWebsite" class="text-muted mb-0"></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">About User</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="viewAboutUser" class="text-muted mb-0"></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">User's Services</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p id="viewUserServices" class="text-muted mb-0"></p>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- </card-body> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Reject Remark -->
<div class="modal fade" id="remark" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reason of rejecting the User.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="action/user_reject_post.php" method="post">
        <div class="modal-body">
          <textarea name="remark" class="form-control" rows="3" placeholder="Write remark here" autofocus
            style="resize:none;" required></textarea>
          <input type="hidden" id="rejectUserId" name="userId">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-danger">Reject</button>
      </form>
    </div>
  </div>
</div>
</div>


<?php
include "include/footer.php";
?>