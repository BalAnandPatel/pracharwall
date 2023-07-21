<?php
include "include/header.php";
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Add Notification</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Category's Detail</li>
              <li class="breadcrumb-item active">Add Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="container-fluid">

          <?php
          if(isset($_SESSION['categoryUploadSuccess'])){
          echo '<div class="alert alert-success rounded-0" role="alert">'.$_SESSION['categoryUploadSuccess'].'</div>';
          unset($_SESSION['categoryUploadSuccess']);
          }else if(isset($_SESSION['categoryUploadErrors'])){
            echo '<div class="alert alert-danger rounded-0" role="alert">'.$_SESSION['categoryUploadErrors'].'</div>';
            unset($_SESSION['categoryUploadErrors']);
          } 

          ?>

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Category</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="action/business_category_post.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Business Category*</label>
                    <input style="text-transform:capitalize;" type="text" class="form-control" name="businessCategory" id="exampleFormControlInput1" placeholder="Enter Business Category" autocomplete="off" required>
                  </div>
              </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Sub Category*</label>
                    <input type="text" style="text-transform:capitalize;" class="form-control" name="subCategory" value="Na" id="exampleFormControlInput1" placeholder="Enter Subcategory" autocomplete="off" disabled>
                  </div>
              </div>
            
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="name">Upload Business Image*</label>
                    <input type="file" class="form-control" name="busineshImg" required>
                  </div>
              </div>
            
            </div>
          
            <!-- /.row -->
                <div class="btn-group w-auto">
                  <button type="submit" name="submit" class="btn btn-success col start">
                    <i class="fas fa-plus"></i><span> Add details</span>
                  </button>
                </div>
           
          </div>
        </form>
          <!-- /.card-body -->
          <div class="card-footer">
           PRACHARWALL
          </div>
        </div>
        <!-- /.card -->

    
        <div class="row">
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include "include/footer.php"; ?>