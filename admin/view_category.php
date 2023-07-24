<?php
include "include/header.php";
  $url = $URL."admin/read_business_category.php";
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
            <!-- <h1>Regiserd Users</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category's Detail</li>
              <li class="breadcrumb-item active">View Category List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
  
      <div id="deleteMsg"> 
      </div>
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">VIEW CATEGORY LIST</h3> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-center">
                  <thead>
                  <tr class="table-warning">
                    <th>Sr No.</th>
                    <th>Category Name</th>
                    <th>Sub-Category Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Create date</th>
                    <th>Edit</th>
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
                    <td><?php echo $value1->businessCategory; ?></td>
                    <td><?php echo $value1->subCategory; ?></td>
                    <td><img class="img img-fluid img-thumbnail" src="<?php echo $CATEGORY_IMGPATH.$value1->id.".png"; ?>" width="100px" height="100px"></td>
                    <td><?php if($value1->status==1) echo "ACTIVE"; else echo "PENDING"; ?></td>
                    <td><?php echo date('d-m-Y',strtotime($value1->createdOn)); ?></td>
                    <td>
                      <form action="business_category_update.php" method="post">
                      <input type="hidden" name="categoryId" value="<?php echo $value1->id; ?>">
                      <button class="btn btn-primary" type='submit'><span class="fas fa-edit"></button>
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
<?php
include "include/footer.php";
?>