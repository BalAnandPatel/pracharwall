<?php
include "include/header.php";
  $status='1';
  $userType='2';
  $url = $URL."user/read_allusers_list.php";
  $data = array("status"=>$status, "userType"=>$userType);
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
            <!-- <h1>Regiserd Users</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User's Details</li>
              <li class="breadcrumb-item active">Approved User's List</li>
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
                <h3 class="card-title">APPROVED USER'S LIST</h3> 
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
                    <th>Create date</th>
                  </tr>
                    
                  </thead>
                  <tbody>
                  <?php 
                     $counter='0';
                     foreach($result as $key => $value){
                     foreach($value as $key1 => $value1)
                     {
                  ?>  
                  <tr>          
                    <td><?php echo ++$counter; ?></td>
                    <td><?php echo $value1->userRole; ?></td>
                    <td><?php echo $value1->userName; ?></td>
                    <td><?php echo $value1->userMobile; ?></td>
                    <td><?php echo $value1->userEmail; ?></td>
                    <td><?php if($value1->status==1) echo "ACTIVE"; else echo "PENDING"; ?></td> 
                    <td><?php echo date('d-m-Y',strtotime($value1->createdOn)); ?></td> 
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