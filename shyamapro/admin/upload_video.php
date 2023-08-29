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
            <h1>Upload Gallery Videos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Media & Gallery</li>
              <li class="breadcrumb-item active">Upload Gallery Videos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="container-fluid">

          <?php
          if(isset($_SESSION["videoSuccessMsg"])){
          $success_msg = $_SESSION["videoSuccessMsg"];
          echo '<div class="alert alert-success rounded-0" role="alert">'.$success_msg.'</div>';
          unset($_SESSION["videoSuccessMsg"]);
          } else if(isset($_SESSION["videoErrors"])){
          $error_msg = $_SESSION["videoErrors"];
          echo '<div class="alert alert-danger rounded-0" role="alert">'.$error_msg.'</div>';
          unset($_SESSION["videoErrors"]);
          }
        

          ?>

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Upload Videos</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="action/upload_video_post.php" method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="post">Video Title*</label>
                    <input type="text" class="form-control" name="videoTitle" placeholder="Video Title" autocomplete="off" required>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="post">Discription*</label>
                    <textarea class="form-control" name="videoDescription" placeholder="Discription" required></textarea>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="post">Select Video File (mp4)*</label>
                    <input type="file" class="form-control" name="uploaded_video" required>
                    <strong id="emailHelp" class="form-text text-danger">Video file shoud be mp4 formet, and size limit will be 20MB.</strong>
                  </div>
              </div>
              <div class="btn-group w-auto">
                  <button type="submit" name="submit" class="btn btn-success col start">
                    <i class="fas fa-upload"></i><span> Upload</span>
                  </button>
                </div>
            </div>
            <!-- /.row -->
           
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