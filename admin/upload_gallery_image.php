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
            <h1>Add Gallery Images</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Media & Gallery</li>
              <li class="breadcrumb-item active">Add Gallery Images</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="container-fluid">

          <?php
          if(isset($_SESSION["gallerySuccessMsg"])){
          $success_msg = $_SESSION["gallerySuccessMsg"];
          echo '<div class="alert alert-success rounded-0" role="alert">'.$success_msg.'</div>';
          unset($_SESSION["gallerySuccessMsg"]);
          } else if(isset($_SESSION["galleryErrors"])){
          $error_msg = $_SESSION["galleryErrors"];
          echo '<div class="alert alert-danger rounded-0" role="alert">'.$error_msg.'</div>';
          unset($_SESSION["galleryErrors"]);
          }
        

          ?>

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Upload Image Files</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="action/upload_galleryimg_post.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="post">Select gallery Images*</label>
                    <input type="file" class="form-control" name="uploaded_file" id="exampleFormControlInput1" required>
                    <strong id="emailHelp" class="form-text text-danger">Image file shoud be Jpg/png formet.</strong>
                  </div>
              </div>
            </div>
            <!-- /.row -->
                <div class="btn-group w-auto">
                  <button type="submit" name="submit" class="btn btn-success col start">
                    <i class="fas fa-upload"></i><span> Upload</span>
                  </button>
                </div>
           
          </div>
        </form>
          <!-- /.card-body -->
          <div class="card-footer">
          SHYAMAVSVSS KRISHI LIMITED
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