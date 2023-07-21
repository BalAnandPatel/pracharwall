<?php
// error_reporting(0);
include "include/header.php";
  $url = $URL."user/read_user_wall_history.php";
  $data = array("status"=>'0',"userId"=>"");
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
  $userId="";
  if(isset($result->records[0]->userId)){
  $userId = $result->records[0]->userId;
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
              <li class="breadcrumb-item active">Post's Details</li>
              <li class="breadcrumb-item active">Post  Request List</li>
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
                <h3 class="card-title">POST UPDATE REQUEST LIST</h3> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                  <tr class="table-warning">
                    <th>Sr No.</th>
                    <th>Profile</th>
                    <th>Email Id</th>
                    <th>User Name</th>
                    <th>Business Category</th>
                    <th>Post Image</th>
                    <th>Create Date</th>
                    <th>Approve</th>
                    <th>Reject</th>
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
                    <td>
                       <?php $uid = $value1->userId; ?>
                      <img class="img-fluid img-thumbnail rounded-circle" height="100" width="100" src="<?php echo $USER_PROFILE_IMGPATH.$uid."/user_img_".$uid.".png"; ?>" alt="user image">
                    </td>
                    <td><?php echo $value1->userEmail; ?></td>  
                    <td><?php echo $value1->userName; ?></td>
                    <td><?php echo $value1->businessCategory; ?></td>
                    <td>
                    <a href="<?php echo $USER_WALL_IMGPATH.$userId."/".$value1->wallImg; ?>" target="_blank">
                      <img class="img img-fluid img-thumbnail" width="250" height="250"  src="<?php echo $USER_WALL_IMGPATH.$userId."/".$value1->wallImg; ?>"></a>
                    </td>
                    <td><?php echo date('d-m-Y',strtotime($value1->createdOn)); ?></td> 
                    <td>
                      <form action="action/wall_reapprove_post.php" method="post">
                      <input type="hidden" name="userId" value="<?php echo $value1->userId; ?>">
                      <input type="hidden" name="wallImg" value="<?php echo $value1->wallImg; ?>">
                      <button type="submit" name="submit" class="btn btn-success btn-sm">Reapprove</button>
                      </form>  
                    </td>
                    <td>
                      <?php $u_id= $value1->userId; $img = $value1->wallImg;?>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#remark" 
                      onclick="rejectUsers('<?php echo $u_id ?>','<?php echo $img ?>');">Reject</button>
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
      <form action="action/wall_re_reject_post.php" method="post">
        <div class="modal-body">
          <textarea name="remark" class="form-control" rows="3" placeholder="Write remark here" autofocus
            style="resize:none;" required></textarea>
           <input type="hidden" id="rejectUserId" name="userId">
           <input type="hidden" id="rejectWallImg" name="wallImg">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-danger">Reject</button>
      </form>
    </div>
  </div>
</div>
</div>

  <script>

    //This method for reject user details
     function rejectUsers(id,wallImg){
     //alert(id);
     document.getElementById("rejectUserId").value = id;
     document.getElementById("rejectWallImg").value = wallImg;
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