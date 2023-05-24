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
              <li class="breadcrumb-item">Ticket Entry</li>
              <li class="breadcrumb-item active">Generate Ticket</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="container-fluid">

          <?php
          if(isset($_SESSION['ticket_entry_success'])){
          echo '<div class="alert alert-success rounded-0" role="alert">'.$_SESSION['ticket_entry_success'].'</div>';
          unset($_SESSION['ticket_entry_success']);
          } 

          ?>

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Generate Ticket</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="action/ticket_entry_post.php" method="post">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Ticket Amount*</label>
                    <input type="number" class="form-control" name="ticketAmount" id="exampleFormControlInput1" placeholder="Ticket Amount" autocomplete="off" required>
                  </div>
              </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Lottery Amount*</label>
                    <input type="number" class="form-control" name="lotteryAmount" id="exampleFormControlInput1" placeholder="Lottery Amount" autocomplete="off" required>
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
           DREAM LOTTERY
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