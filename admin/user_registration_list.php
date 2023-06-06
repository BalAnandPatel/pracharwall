<?php
// error_reporting(0);
include "include/header.php";
$url = $URL . "user/read_allusers_list.php";
$userType='2';
$status = '0';
$data = array("status"=>$status, "userType"=>$userType);
//print_r($data);
$postdata = json_encode($data);
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($client, CURLOPT_POST, 5);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
$result = json_decode($response);
//print_r($result);
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
                    <th>User Type</th>
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
                          <?php echo $value1->userRole; ?>
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
                          <?php if ($value1->status == 1)
                            echo "ACTIVE";
                          else
                            echo "PENDING"; ?>
                        </td>
                        <td>
                          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#viewProfile">View</button> 
                        </td>
                        <td>
                          <?php echo date('d-m-Y', strtotime($value1->createdOn)); ?>
                        </td>
                        <td class="col-md-1">
                          <form action="action/user_approve_post.php" method="post">
                            <input type="hidden" name="userId" value="<?php echo $value1->id; ?>">
                            <button type="submit" name="submit" class="btn btn-success btn-sm">Approve</button>
                          </form>
                        </td>
                        <td class="col-md-1">
                          <button type="submit" name="submit" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#remark">Reject</button>
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

  <!-- Modal for user profile details (Admin)-->
  <div class="modal fade" id="viewProfile" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <p>This is a large modal.</p>
          <iframe src="http://localhost/pracharwall/profile_view.php?id=5" width="100%" height="300"  title="description"></iframe>
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
          <input type="hidden" name="userId" value="<?php echo $value1->id; ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-danger">Reject</button>
      </form>
    </div>
  </div>
</div>
</div>

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