<?php
include "constant.php";
$url = $URL . "admin/read_business_category.php";
$data = array();
//print_r($data);
$postdata = json_encode($data);
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($client, CURLOPT_POST, 5);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
$result = json_decode($response);
//print_r($result);
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Best online advertising platforms, Pracharwall.com, local Website">
    <meta name="keywords" content="pracharwall, Find your Online Diplay, Find your Digital catalogue">
    <meta name="author" content="Pracharwall, Best Website for Prachar, Find on Prcharwall, Add your Business">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Best Advertising Agency Pracharwall Managed By  Glintel Technologies Pvt Ltd.</title>
    <link rel="shortcut icon" href="Pracharwall_image/favicon.ico" type="image/x-icon">
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="assets/css/theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="assets/css/search.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!--<script src="assets/js/popper.min.js"></script>-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <!--<script src="search.js"></script>-->
    <script src="assets/js/sweetalert.min.js"></script>
     <script src="assets/js/swiper-bundle.min.js"></script> 
    
    <!-- <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/main.js"></script> -->

    <script type="text/javascript">
    $(document).ready(function() {

        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                $(this).remove();
            });
        }, 5000);

    });
    </script>
</head>
<body onload="myPreloader()" class="position-relative">
<div id="preloader">    
<div class="loader"></div>
</div>
<!-- <header> -->
  <!-- Navbar -->
  <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light d-lg-block">
    <div class="container-fluid">

      <!-- Navbar brand -->
      <a class="navbar-brand nav-link" href="index.php">
        <img src="Pracharwall_image/logo.png" class="img-fluid" alt="Pracharwall" width="160" height="40">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarExample01"
        aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                About
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="pracharwall_about.php">About Us</a>
                </li>
                <li>
                    <a class="dropdown-item" href="pracharwall_vision.php">Vision</a>
                </li>
                <li>
                    <a class="dropdown-item" href="pracharwall_mission.php">Mission</a>
                </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register-wall.php">Register Your Wall</a>
          </li>
          <?php
          if (strpos($ROLE, $PROFILE_USER) !== false) {
              ?>
          <li class="nav-item">
              <a class="nav-link" href="profile.php">Dashboard</a>
          </li>
          <?php } ?>
          <?php
          if (strpos($ROLE, $PROFILE_CUSTOMER) !== false) {
              ?>
          <li class="nav-item">
              <a class="nav-link" href="cu_profile.php">
                  My Profile
              </a>
          </li>
          <?php } ?>
          <?php if ($ROLE == "") { ?>
          <li class="nav-item">
              <a class="btn btn-primary btn-sm my-2 mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal" href="">Create Account</a>
          </li>
          <li class="nav-item">
              <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#signin" href="">Login</a>
          </li>
          <?php } else { ?>
          <li class="nav-item">
              <a class="nav-link" href="admin/logout.php">Log Out <i class="bi bi-box-arrow-right"></i></a>
          </li>
          <?php } ?>
        </ul>

        <ul class="navbar-nav list-inline">
            <div class="dropdown">
                <form class="input-group">
                    <input type="text" placeholder="Search for any business or category" id="search2" class="ga-fp form-control" size="25" autocomplete="off"
                        onkeydown="key_pressed_in_search(event)" oninput="find_search_results(this)"
                        onfocus="find_search_results(this)">
                    <button type="button" id="learntocode_searchbtn" class="input-group-text btn btn-primary border-3" onclick="click_learntocode_search_btn()">
                        <i id="learntocode_searchicon" class="fa fa-search ga-fp"></i>
                    </button>
                    <div id="listofsearchresults">
                    </div>
                </form>
            </div>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->
<!-- </header> -->


    <!-- Modal Sign Up-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Create Account</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card rounded-0">
                    <form onsubmit="return userReg(event)" id="signupForm" method="post">
                        <div class="modal-body mx-3">
                            <div class="form-group">
                                <label style="font-weight: 600;" for="usertype">Select User Type:</label>
                                <select class="select form-control" id="userType" required>
                                    <option value="">Select Type</option>
                                    <option value="2">Business Owner</option>
                                    <option value="3">Customer</option>
                                </select>
                            </div>
                            <div class="form-group pt-2">
                                <label style="font-weight: 600;" for="username">Your Name:</label>
                                <input type="text" name="userName" placeholder="Enter Your Full Name" class="form-control"
                                    id="userName" style="text-transform:capitalize;" required autocomplete="off">
                            </div>
                            <div class="form-group pt-2">
                                <label style="font-weight: 600;" for="mobile">Mobile No.:</label>
                                <input type="number" name="userMobile" placeholder="Enter Mobile No"
                                    class="form-control" id="userMobile" required autocomplete="off">
                            </div>
                            <div class="form-group pt-2">
                                <label style="font-weight: 600;" for="email">Email address:</label>
                                <input type="email" name="userEmail" placeholder="Enter Email Id" class="form-control"
                                    id="userEmail" required autocomplete="off">
                            </div>
                            <!--<div class="form-group pt-2">-->
                            <!--    <label style="font-weight: 600;" for="pwd">Password:</label>-->
                            <!--    <input type="password" name="userPass" placeholder="Enter Password" class="form-control"-->
                            <!--        id="userPass" required autocomplete="off">-->
                            <!--</div>-->
                            <br>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                        <div class="small">
                        Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#signin">Sign in</a>
                        </div>
                            <button class="btn btn-primary" name="submit" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
    function userReg(event) {
        event.preventDefault();
        // alert("done");
        var userType = $('#userType').val();
        var userName = $('#userName').val();
        var userMobile = $('#userMobile').val();
        var userEmail = $('#userEmail').val();
        
        // var data = userType+"-"+userName+"-"+userEmail+"-"+userMobile;
        // alert(data);
        if(/^[a-z0-9][a-z0-9-_\.]+@([a-z]|[a-z0-9]?[a-z0-9-]+[a-z0-9])\.[a-z0-9]{2,10}(?:\.[a-z]{2,10})?$/.test(userEmail)) {
           
        $.ajax({
            url: 'admin/action/user_registration_post.php',
            type: 'POST',
            data: {
                "userType": userType,
                "userName": userName,
                "userMobile": userMobile,
                "userEmail": userEmail
            },
            success:function(response){
                if (response==1) {
                    swal("Thank you!", "You have successfully registered.Your login password is sent on your registered email", "success");
                    $("#signupForm").trigger('reset');
                } else if (response==2) {
                    swal("Sorry!", "User already registered", "error");
                }
            }
        });
    }else{
        swal("Sorry!", "Please Enter valid Email", "error");    
    }
    }
    </script>



    <!-- Modal Sign In-->
    <div class="modal fade" id="signin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Login</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- <form action="admin/action/user_login_post.php" method="post"> -->
                <form method="post">
                    <div class="modal-body mx-3">
                        <div class="form-group">
                            <label style="font-weight: 600;" for="email">Email Address:</label>
                            <input type="email" class="form-control" id="uEmail" name="userEmail" placeholder="Email Address" autocomplete="off" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label style="font-weight: 600;" for="pwd">Password:</label>
                            <input type="password" class="form-control" id="uPass" name="userPass" placeholder="Password" autocomplete="off" required>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <div class="small">
                        Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign up</a>
                        </div>
                        <button class="btn btn-primary" id="loginPost" type="submit">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<!-- using ajax query for login -->
    <script>
        $(document).ready(function(){
        
        $("#loginPost").on("click", function(e){
        e.preventDefault();
        var email = $("#uEmail").val();  
        var pass = $("#uPass").val();
        
        if(email=="" || pass==""){
        // alert("Please fill in the blanks"); 
        swal("Request Failed!", "You need to enter a Email and Password");    
        }else{
        
         if(/^[a-z0-9][a-z0-9-_\.]+@([a-z]|[a-z0-9]?[a-z0-9-]+[a-z0-9])\.[a-z0-9]{2,10}(?:\.[a-z]{2,10})?$/.test(email)) {
        //  alert('passed');

        $.ajax({
         url:"admin/action/user_login_post.php",
         type:"POST",
         data:{
         "userEmail":email,
         "userPass":pass   
         },
         success:function(response){
        //  alert(response);
        if(response==0){
        swal("Request Failed!", "Incorrect User Email or Password");
        }else if (response==1){
        window.open('admin/adm_dashboard.php', '_blank'); 
        window.location.reload();
        }else{
        window.location.reload();    
        }
            
         }
        });

         }else{
        //   alert("Please Enter valid Email");
        swal("Request Failed!", "Please Enter valid Email");  
         }
         
        }

        });

        });
    </script>    

    <!-- Side Navabr -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="sidenav"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <div class="row justify-content-center">
            <?php
            $counter = '0';
            foreach ($result as $key => $value) {
            foreach ($value as $key1 => $value1) {
            ?>
                <div class="col-md-2 col-sm-4 col-xs-12 text-break img-thumbnail m-1 d-flex justify-content-center">
                    <center>
                        <a href="profile_list.php?category=<?php echo base64_encode($value1->businessCategory); ?>">
                            <img class="img img-fluid" src="<?php echo $CATEGORY_IMGPATH . $value1->id . ".png"; ?>"
                                style="height:60px;">
                            <p>
                                <?php echo $value1->businessCategory; ?>
                            </p>
                        </a>
                    </center>
                </div>
                <?php } } ?>
            </div>
        </div>

    </div>
    <!-- Side Navabr end-->
    <?php
    if (isset($_SESSION["user_reg_error"])) {
        echo '<script>
     swal("Sorry!", "User already registered", "error");
     </script>';
        unset($_SESSION["user_reg_error"]);
    } else if (isset($_SESSION["user_reg_success"])) {
        echo '<script>
     swal("Thank you!", "You have successfully registerd. Now you can login", "success");
     </script>';
        unset($_SESSION["user_reg_success"]);
    }
    ?>


<!-- Modal -->
<div class="modal fade" id="shareProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Share Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="input-group mb-3">
          <input type="text" class="form-control" value="" id="showPageUrl" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <button onclick="copyUrl()" class="input-group-text" id="basic-addon2"><i class="bi bi-clipboard2"></i></button>
        </div>
        <script>
            document.getElementById("showPageUrl").value = window.location.href;

            function copyUrl() {
              // Get the text field
              var copyText = document.getElementById("showPageUrl");

              // Select the text field
              copyText.select();
              copyText.setSelectionRange(0, 99999); // For mobile devices

               // Copy the text inside the text field
              navigator.clipboard.writeText(copyText.value);

              // Alert the copied text
              alert(copyText.value);
            }
        </script>

    <div class="container">
      <div class="d-flex justify-content-evenly">
          <a href="https://wa.me/?text=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" target="_blank">
              <h1><i class="bi bi-whatsapp text-success"></i></h1>
          </a>
          <!-- <a href="https://www.facebook.com/sharer/sharer.php?u=Hi%20I%20am%20interested%20in%20your%20service." target="_blank">
             <h1><i class="bi bi-facebook text-info"></i></h1>
          </a> -->
          <a href="https://twitter.com/intent/tweet?text=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" target="_blank">
              <h1><i class="bi bi-twitter text-info"></i></h1>
          </a>
          <a href="https://www.linkedin.com/shareArticle?mini=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" target="_blank">
              <h1><i class="bi bi-linkedin text-info"></i></h1>
          </a>
          <a href="mailto:?subject=[Contact]&body=[<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>]" target="_blank">
              <img src="assets/img/gmail.png" alt="gmail">
          </a>
      </div>
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<style>
.blur{
   backdrop-filter: blur(5px);
   background-color: #01223770;
}
.blur.in{
   opacity: 1 !important;
}
</style>

<!--<div class="modal fade blur" id="modal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-dialog-centered">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-body">-->
<!--                <button type="button" class="btn-close bg-white p-4 position-absolute top-0 end-0"-->
<!--                    data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--                    <div class="alerts d-flex justify-content-center alert-danger" role="alert">-->
<!--                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">-->
<!--                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>-->
<!--                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                            <g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.31171 10.7615C8.23007 5.58716 9.68925 3 12 3C14.3107 3 15.7699 5.58716 18.6883 10.7615L19.0519 11.4063C21.4771 15.7061 22.6897 17.856 21.5937 19.428C20.4978 21 17.7864 21 12.3637 21H11.6363C6.21356 21 3.50217 21 2.40626 19.428C1.31034 17.856 2.52291 15.7061 4.94805 11.4063L5.31171 10.7615ZM12 7.25C12.4142 7.25 12.75 7.58579 12.75 8V13C12.75 13.4142 12.4142 13.75 12 13.75C11.5858 13.75 11.25 13.4142 11.25 13V8C11.25 7.58579 11.5858 7.25 12 7.25ZM12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z" fill="#ff0000"/> </g>-->
<!--                        </svg>-->
<!--                        <div class="p-2">-->
<!--                            <b>Note: </b>This is a 15 day trial-version of this site.-->
<!--                            The website is still under maintainence. Please give your feedback of your experience.-->
<!--                        </div>-->
<!--                    </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="modal fade" id="howtoregisterWall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center p-10">
                <button type="button" class="btn-close bg-white p-4 position-absolute top-0 end-0"
                    data-bs-dismiss="modal" aria-label="Close"></button>
                <video class="img-fluid" controls>
                    <source src="assets/videos/How to Register your wall.mp4">
                </video>
            </div>
        </div>
    </div>
</div>
<?php if ($ROLE == "") { ?>
<script type="text/javascript">
    $(window).on('load', function () {
        $('#exampleModal').modal('show');
    });
</script>
    <script type="text/javascript">
        $(window).on('load', function () {
            setInterval(() => {
                $('#exampleModal').modal('show');
            }, 120000);
        });
    </script>
<?php } ?>