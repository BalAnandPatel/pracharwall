<?php include "constant.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pracharwall</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="search.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            window.setTimeout(function () {
                $(".alert").fadeTo(1000, 0).slideUp(1000, function () {
                    $(this).remove();
                });
            }, 5000);

        });
    </script>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-md navbar-light bg-light" aria-label="Navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="Pracharwall_image/logo.png" alt="Pracharwall" width="160" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
                aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div>
                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
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
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="register-wall.php">Register Your Wall</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" href="">Sign
                                up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#signin" href="">Sign
                                in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#customer_profile" href="">
                                My Profile
                            </a>
                        </li>
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
                    <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
                    <!-- <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="card rounded-0">
                    <form onsubmit="return userReg()" method="post">
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
                                <label style="font-weight: 600;" for="username">Full Name:</label>
                                <input type="text" name="userName" placeholder="Enter Full Name" class="form-control"
                                    id="userName" required autocomplete="off">
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
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-primary" name="submit" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function userReg() {
            // alert("done");
            var userType = $('#userType').val();
            var userName = $('#userName').val();
            var userMobile = $('#userMobile').val();
            var userEmail = $('#userEmail').val();
            var userPass = $('#userPass').val();
            // var data = userType+"-"+userName+"-"+userEmail+"-"+userMobile+"-"+userPass;
            // alert(data);
            $.ajax({
                url: 'http://localhost/pracharwall/admin/action/user_registration_post.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    "userType": userType,
                    "userName": userName,
                    "userMobile": userMobile,
                    "userEmail": userEmail,
                    "userPass": userPass
                },
                success: function (response) {
                    response = JSON.stringify(response);
                    //console.log(response);
                    //alert(response);
                    //alert('success');
                },
                error: function (response) {
                    response = JSON.stringify(response);
                    //console.log(response);
                    //alert(response);
                    //alert('faild');
                }
            });
        }
    </script>

    <!-- Modal Sign In-->
    <div class="modal fade" id="signin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                    <!-- <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <form>
                    <div class="modal-body mx-3">
                        <div class="form-group">
                            <label style="font-weight: 600;" for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label style="font-weight: 600;" for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" autocomplete="off" required>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <!-- Customer Profile -->
    <div class="modal fade" id="customer_profile" tabindex="-1" aria-labelledby="ExploreStore" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="position-relative">
                    <button type="button" class="btn-close position-absolute top-0 start-100 translate-middle"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <section style="background-color: #eee;">
                        <div class="container py-3">

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body text-center">
                                            <img src="assets/img/events.png" alt="avatar"
                                                class="rounded-circle img-fluid">
                                            <h5 class="my-3">John Smith</h5>
                                            <p class="text-muted mb-1">Full Stack Developer</p>
                                            <p class="text-muted mb-1">example@example.com</p>
                                            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                                            <div class="d-flex justify-content-center mb-2">
                                                <button type="button" class="btn btn-primary">Edit Proflie <i
                                                        class="bi bi-pencil-square"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Full Name</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"><input type="text" class="form-control"
                                                            value="Johnatan Smith" disabled></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Email</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">example@example.com</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Mobile</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">(098) 765-4321</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Address</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="d-flex justify-content-end mb-2">
                                                    <button type="button" class="btn btn-success">Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>