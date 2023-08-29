<?php
include '../constant.php';

if($_SESSION["ID"]!=""){
 
$uid=$_SESSION["ID"];
$name=$_SESSION["NAME"];

$img="img/".$uid."/profile"."/".$uid.".png";

	$url = $URL."registration/read_profile_by_id.php";
	$data = array( "id" => $uid);
	$postdata = json_encode($data);
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
	//curl_setopt($client, CURLOPT_POST, 5);
	curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
	$response = curl_exec($client);
 // print_r($response);
  $result = json_decode($response);
 // print_r($result);

 


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SP News</title>
  <!---link to style sheet----->
  <link rel="stylesheet" href="../common/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../common/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../common/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../common/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../common/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../common/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../common/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../common/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../common/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../common/assets/img/logo/logo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
       <li class="nav-item d-none d-sm-inline-block">
        <a href="profile.php" class="nav-link">PROFILE</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="change_password.php" class="nav-link">Change Password</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="logout.php" class="nav-link">LOGOUT</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="fab fa-facebook-square fa-lg"></i>
        </a>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
           <i class="fab fa-twitter-square fa-lg"></i>
        </a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="#" role="button">
          <i class="fab fa-invision fa-lg"></i>
       </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt fa-lg"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="../common/assets/img/logo/logo.png" alt="AdminLTE Logo"
       class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Registration Details</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img  src="<?php echo  $img ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="profile.php" class="d-block" ><?php  echo ucfirst($full_name) ?>-<b>{<?php echo $uid ?>}</b></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                 <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-user"></i>
                 <p>
                   Profile Detail
                   <i class="right fas fa-angle-left"></i>
                 </p>
                 </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="profile_upload.php" class="nav-link">
              <i class="nav-icon fas fa-camera"></i>
			</i>
            <p>Upload Photo</p>
                </a>
              </li>

              <li class="nav-item">
              <a href="edit_profile.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Update Profile</p>
                </a>
              </li>
              <li class="nav-item">
            <a href="payment_slip_upload.php" class="nav-link">
              <i class="nav-icon fa fa-university"></i>
              <p>
               
            Update Joining Amount</p>
            </a>
          </li>
          
              <li class="nav-item">
              <a href="bank_detail.php" class="nav-link">
              <i class="nav-icon fa fa-university"></i>
             <p>Update Account Detail</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
                 <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-user"></i>
                 <p>
                   Donation/Offline Fund
                   <i class="right fas fa-angle-left"></i>
                 </p>
                 </a>
              <ul class="nav nav-treeview">
              
          <li class="nav-item">
            <a href="donation_cum_offline.php" class="nav-link">
              <i class="nav-icon fa fa-university"></i>
              <p>Donation/Offline Ads</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="donation_detail.php" class="nav-link">
              <i class="nav-icon fa fa-university"></i>
              <p>Donation List</p>
            </a>
          </li>
          </ul>
          </li>

          <li class="nav-item">
                 <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-user"></i>
                 <p>
                   Video
                   <i class="right fas fa-angle-left"></i>
                 </p>
                 </a>
              <ul class="nav nav-treeview">
              
          <li class="nav-item">
          <a href="video_view.php" class="nav-link">
              <i class="nav-icon fa fa-video"></i>
                 <p>New Video</p>
            </a>
          </li>


          <li class="nav-item">
          <a href="video_watched_list.php" class="nav-link">
              <i class="nav-icon fa fa-video"></i>
              <p>Watched List</p>
            </a>
          </li>
          </ul>
          </li>

          <li class="nav-item">
            <a href="account_detail.php" class="nav-link">
              <i class="nav-icon fas fa-rupee-sign"></i>
              <p>
                Income Details
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="network_tree.php" class="nav-link">
              <i class="nav-icon fas fa-network-wired"></i>
              <p>
                Go to Network
               </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="withdraw.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Withdraw
              </p>
            </a>
          </li>
          


          <li class="nav-item">
            <a href="pan_upload.php" class="nav-link">
              <i class="nav-icon fa fa-upload"></i>
              <p>
              PAN Card Upload
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <?php } else{
header('Location:index.php');
  }
  ?>