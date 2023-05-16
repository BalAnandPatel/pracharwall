<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pracharwall</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
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
                                    class="form-control" placeholder="Search Your City"
                                    onkeyup="showResult(this.value)" />
                                <ul class="dropdown-menu">
                                    <li><div id="livesearch"></div></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="register-wall.php">Register Your Wall</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-file-arrow-down-fill"></i> Download App</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sign-in.php">Sign in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sign-up.php">Sign up</a>
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
                <div class="modal-body mx-3">
                    <form>
                        <div class="form-group">
                            <label for="username">Full Name:</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <br>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default">Register</button>
                </div>
            </div>
        </div>
    </div>
    </div>



    <!-- Modal Sign Up-->
    <div class="modal fade" id="signin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                    <!-- <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body mx-3">
                    <form>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <br>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default">Login</button>
                </div>
            </div>
        </div>
    </div>
    </div>