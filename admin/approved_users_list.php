<?php
include "include/header.php";
  $status='1';
  $userType='2';
  $url = $URL."user/read_allusers_list.php";
  $data = array("status"=>$status, "userType"=>$userType, "userId"=>"");
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
  
       <p id="usersDeleteAlert"></p>
         
     
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
                    <th>User Img</th>
                    <th>Business Category</th>
                    <th>User Name</th>
                    <th>Mobile No.</th>
                    <th>Email Id</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Delete</th>
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
                      <?php $uid = $value1->id; ?>
                      <img class="img-fluid img-thumbnail rounded-circle" height="100px" width="100px" src="<?php echo $USER_PROFILE_IMGPATH.$uid."/user_img_".$uid.".png"; ?>" alt="user image">
                    </td>
                    <td><?php echo $value1->businessCategory; ?></td>
                    <td><?php echo $value1->userName; ?></td>
                    <td><?php echo $value1->userMobile; ?></td>
                    <td><?php echo $value1->userEmail; ?></td>
                    <td><button type="button" class="btn btn-success btn-xs"><?php if($value1->status==1) echo "ACTIVE"; else echo "PENDING"; ?></button></td> 
                    <td><?php echo date('d-m-Y',strtotime($value1->createdOn)); ?></td> 
                    <td>
                      <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#usersDeleteModal" onclick="deleteUsers('<?php echo $value1->id ?>','<?php echo $value1->userName ?>','<?php echo $value1->userEmail ?>')"><span class="fas fa-trash"></sapn></button>
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

<!-- Modal Reject Remark -->
<div class="modal fade" id="usersDeleteModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="action/user_delete_post.php" method="post">
        <div class="modal-body">
          <p>Are you sure! You want to delete this user</p>
          <p><strong>Name:-</strong> <span id="deletetUserName"></span><br><strong>Email Id:-</strong> <span id="deleteUserEmail"><span></p>
          <input type="hidden" id="deleteUserId" name="userId">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" name="submit" class="btn btn-success">Delete</button>
      </form>
    </div>
  </div>
</div>
</div>
<script>
 function deleteUsers(id,name,email){
 document.getElementById("deleteUserId").value = id;
 document.getElementById("deletetUserName").innerHTML = name;
 document.getElementById("deleteUserEmail").innerHTML = email;
}
</script>
<!-- Page specific script -->
<?php
include "include/footer.php";
?>