<?php
  include "include/header.php";

  $url = $URL."exam/read_exam_list.php";
	$data = array();

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
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vacancy Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vacancy Details</li>
              <li class="breadcrumb-item active">Vacancy List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php if(isset($_SESSION["exam_post_success"])){ ?>
      <div class="alert alert-success text-center" id="success-alert" role="alert">
        <?php echo $_SESSION["exam_post_success"]; unset($_SESSION["exam_post_success"]); ?>
      </div>
      <?php } ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
              
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">VACANCY DETAILS</h3> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-center">
                  <thead>
                  <tr class="table-warning">
                  
                    <th>S.N</th>
                    <th>Post_Name</th>
                    <th>Type</th>
                    <th>Fee Gen</th>
                    <th>Fee OBC</th>
                    <th>Fee SC</th>
                    <th>Fee ST</th>
                    <th>Fee EWS</th>
                    <th>Age</th>
                    <th>Total Post</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Created Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  	
                  </thead>
                  <tbody>
                  <?php 
								     
                     $counter=0;
                     foreach($result as $key => $value){
                     foreach($value as $key1 => $value1)
                     {
                     
                  ?>  
                  <tr>
                    <td><?php echo ++$counter; ?></td>
                    <td><?php echo $value1->exam_name; ?></td>
                                     
                    <td><?php echo $value1->type; ?></td>
                    <td><?php echo $value1->general_fee; ?></td>
                    <td><?php echo $value1->obc_fee; ?></td>
                    <td><?php echo $value1->sc_fee; ?></td>
                    <td><?php echo $value1->st_fee; ?></td>
                    <td><?php echo $value1->ews_fee; ?></td>
                    <td><?php echo $value1->age; ?></td>
                    <td><?php echo $value1->total_post; ?></td>
                    <td><?php if($value1->status==0) echo "PENDING"; elseif($value1->status==1) echo "ACTIVE"; elseif($value1->status==2) echo "DISABLEDA"; ?></td>


                    <td>
                      <?php 
                       $date = date("d-m-Y",strtotime($value1->exam_date_start)); 
                       echo $date=="01-01-1970" ? '0' : $date; 
                       ?>
                    </td>
                    
                    <td>
                      <?php
                       $date = date("d-m-Y",strtotime($value1->exam_date_end)); 
                       echo $date=="01-01-1970" ? '0' : $date; 
                      ?>
                    </td>
                    <td>
                      <?php
                       $date = date("d-m-Y",strtotime($value1->created_on)); 
                       echo $date=="01-01-1970" ? '0' : $date; 
                      ?>
                    </td>
                    <td>
                      <form action="update_exam.php" method="post">
                      <input type="hidden" name="exam_name" value="<?php echo $value1->exam_name; ?>">
                      <input type="hidden" name="id" value="<?php echo $value1->id; ?>">
                      <button type="submit" name="update_exam" class="btn btn-primary"><i class="fa fa-edit"><b class="ml-1">Edit</b></i>
                      </button>
                    </form>
                    </td>
                    <td>
                      <form action="action/delete_exam_post.php" method="post">
                       <input type="hidden" name="id" value="<?php echo $value1->id; ?>">
                       <button type="submit" name="delete_exam" class="btn btn-danger"><i class="fa fa-trash"><b class="ml-1">Delete</b></i>
                      </button>
                    </form>
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