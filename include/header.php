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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pracharwall</title>
    <link rel="shortcut icon" href="Pracharwall_image/favicon.ico" type="image/x-icon">
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="assets/css/theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="search.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>

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

<body>
    <nav class="navbar sticky-top navbar-expand-md navbar-light bg-light" aria-label="Navbar">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand" href="index.php">
                    <img src="Pracharwall_image/logo.png" class="img-fluid" alt="Pracharwall" width="160" height="40">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
                aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="nav-item">
                <div class="dropdown">
                    <input type="text" id="ser-city" data-bs-toggle="dropdown" aria-expanded="false"
                        class="form-control" size="60" placeholder="Search Your City"
                        onkeyup="showResult(this.value)" />
                    <ul class="dropdown-menu">
                        <li>
                            <div id="livesearch"></div>
                        </li>
                    </ul>
                </div>
            </div>

            <div>
                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="register-wall.php">Register Your Wall</a>
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
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" href="">Create Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#signin" href="">Login</a>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="admin/logout.php">Log Out <i class="bi bi-box-arrow-right"></i></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
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
                            <div class="form-group pt-2">
                                <label style="font-weight: 600;" for="pwd">Password:</label>
                                <input type="password" name="userPass" placeholder="Enter Password" class="form-control"
                                    id="userPass" required autocomplete="off">
                            </div>
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
        var userPass = $('#userPass').val();
        // var data = userType+"-"+userName+"-"+userEmail+"-"+userMobile+"-"+userPass;
        // alert(data);
        if(/^[a-z0-9][a-z0-9-_\.]+@([a-z]|[a-z0-9]?[a-z0-9-]+[a-z0-9])\.[a-z0-9]{2,10}(?:\.[a-z]{2,10})?$/.test(userEmail)) {
        $.ajax({
            url: '<?php echo $BASE_URL ?>admin/action/user_registration_post.php',
            type: 'POST',
            data: {
                "userType": userType,
                "userName": userName,
                "userMobile": userMobile,
                "userEmail": userEmail,
                "userPass": userPass
            },
            success:function(response){
                if (response==1) {
                    swal("Thank you!", "You have successfully registerd. Now you can login", "success");
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
         url:"<?php echo $BASE_URL ?>admin/action/user_login_post.php",
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
        window.open('<?php echo $BASE_URL ?>admin/adm_dashboard.php', '_blank'); 
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
            <!-- <div>
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images,
                lists,
                etc.
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Dropdown button
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div> -->
            <div class="row justify-content-center">
                <?php
            $counter = '0';
            foreach ($result as $key => $value) {
                foreach ($value as $key1 => $value1) {
            ?>
                <div class="col-md-2 col-sm-4 col-xs-12 text-break img-thumbnail m-1 d-flex justify-content-center">
                    <a href="profile_list.php?category=<?php echo $value1->businessCategory; ?>">
                        <img class="img img-fluid" src="<?php echo $CATEGORY_IMGPATH . $value1->id . ".png"; ?>"
                            style="height:60px;">
                        <p>
                            <?php echo $value1->businessCategory; ?>
                        </p>
                    </a>
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