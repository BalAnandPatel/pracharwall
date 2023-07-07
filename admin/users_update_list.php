<?php
include "include/header.php";
$url = $URL . "user/read_reupdated_users_list.php";
$userType='2';
$status = '0';
//read user details

$data = array("status"=>$status, "userType"=>$userType);
//print_r($data);
$postdata = json_encode($data);
$result = giplCurl($url,$postdata);
//print_r($result);

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
              <li class="breadcrumb-item active">User Update Request List</li>
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
                <h3 class="card-title">USER UPDATE REQUEST LIST</h3> 
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
                    <th>Update date</th>
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
                          <?php echo date('d-m-Y', strtotime($value1->updatedOn)); ?>
                        </td>
                        <td class="col-md-1">
                          <form action="action/user_approve_post.php" method="post">
                            <input type="hidden" name="userId" value="<?php echo $value1->id; ?>">
                            <?php if(!empty($value1->businessCategory)) { ?>
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

  <!-- modal box start-->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Payment Slip</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?php echo $slip_img; ?>" alt="..." class="img-fluid img-thumbnail" width="100%">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- modal box end-->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="lugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->

<?php
include "include/footer.php";
?>