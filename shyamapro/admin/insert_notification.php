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
            <h1>Add Notification</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Notification</li>
              <li class="breadcrumb-item active">Add Notification</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="container-fluid">

          <?php
          if(isset($_GET['success'])){
          $success_msg = $_GET['success'];
          echo '<div class="alert alert-success rounded-0" role="alert">'.$success_msg.'</div>';
          unset($success_msg);
          } else if(isset($_GET['error'])){
          $error_msg = $_GET['error'];
          echo '<div class="alert alert-danger rounded-0" role="alert">'.$error_msg.'</div>';
          unset($error_msg);
          }
        

          ?>

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Notification</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="action/notification_post.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="name">Type Notification*</label>
                    <input type="text" class="form-control" name="n_title" id="exampleFormControlInput1" placeholder="Title" autocomplete="off" required>
                  </div>
              </div>
            
            </div>
          
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="post">Upload Notification PDF*</label>
                    <input type="file" class="form-control" name="pdf_file" id="exampleFormControlInput1" placeholder="Enter post hear" autocomplete="off" required>
                    <strong id="emailHelp" class="form-text text-danger">Notification file shoud be PDF formet.</strong>
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