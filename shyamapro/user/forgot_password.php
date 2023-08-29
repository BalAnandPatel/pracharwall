<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forgot Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../common/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../common/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../common/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Recruitment</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">

  <?php if(isset($_SESSION['forgotpassword'])) {?>
        <?php if(($_SESSION['forgotpassword']=="Password sent you registered Email address.")) {?> 
    <div class="alert alert-success" id="success-alert" role="alert">
                <?php echo $_SESSION['forgotpassword']; unset($_SESSION['forgotpassword'])?> 
               </div>
            <?php  }
            else {         
            ?>
            <div class="alert alert-danger" id="success-alert" role="alert">
                <?php echo $_SESSION['forgotpassword']; unset($_SESSION['forgotpassword'])?> 
               </div>
            <?php }} ?>
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form action="action/forgot_password_post.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control"name="email"  placeholder="Email" autocomplete="off" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
      <i class="fa fa-sign-in-alt"></i>
        <a href="index.php">Login</a>
      </p>
      <p class="mb-0">
      <i class="fa fa-user"></i>
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../common/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../common/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../common/dist/js/adminlte.min.js"></script>
</body>
</html>
