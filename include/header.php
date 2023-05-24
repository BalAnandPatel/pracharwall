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
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-md navbar-light bg-light" aria-label="Navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="index1.php">
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
                <form>
                    <div class="modal-body mx-3">
                        <div class="form-group">
                            <label style="font-weight: 600;" for="usertype">Select User Type:</label>
                            <select class="select form-control" required>
                                <option value="">Select Type</option>
                                <option value="2">Business Owner</option>
                                <option value="3">Customer</option>
                            </select>
                        </div>
                        <div class="form-group pt-2">
                            <label style="font-weight: 600;" for="username">Full Name:</label>
                            <input type="text" placeholder="Enter Full Name" class="form-control" id="username" required autocomplete="off">
                        </div>
                        <div class="form-group pt-2">
                            <label style="font-weight: 600;" for="mobile">Mobile No.:</label>
                            <input type="number" placeholder="Enter Mobile No" class="form-control" id="mobile" required autocomplete="off">
                        </div>
                        <div class="form-group pt-2">
                            <label style="font-weight: 600;" for="email">Email address:</label>
                            <input type="email" placeholder="Enter Email Id" class="form-control" id="email" required autocomplete="off">
                        </div>
                        <div class="form-group pt-2">
                            <label style="font-weight: 600;" for="pwd">Password:</label>
                            <input type="password" placeholder="Enter Password" class="form-control" id="pwd" required autocomplete="off">
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>



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
                            <input type="password" class="form-control" id="pwd" required>
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