<?php include "constant.php"; ?>
<?php
// error_reporting(0);
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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="search.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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


    <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-right"
        style="width:200px;left:0;padding-top: 48px;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large w3-hide-large mt-2" onclick="w3_close()">Close &times;</button>
        <a href="#" class="w3-bar-item w3-button">Link 1</a>
        <a href="#" class="w3-bar-item w3-button">Link 2</a>
        <a href="#" class="w3-bar-item w3-button">Link 3</a>
    </div>

    <div class="w3-main" style="margin-left:200px">
        <nav class="navbar sticky-top navbar-expand-md navbar-light bg-light" aria-label="Navbar">
            <div class="container-fluid">
                <button class="w3-button w3-xlarge w3-left w3-hide-large" onclick="w3_open()">&#9776;</button>
                <a class="navbar-brand" href="index.php">
                    <img src="Pracharwall_image/logo.png" alt="Pracharwall" width="160" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                                <a class="nav-link" aria-current="page" href="register-wall.php">Register Your
                                    Wall</a>
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

        <style>
            .home-office-service:before,
            .home-improvement:before,
            .property-rental:before,
            .edu-training:before,
            .pro-service:before,
            .travel-transport:before,
            .health-wellness:before,
            .events:before {
                background: url(assets/img/menu-category.png) 0 0 no-repeat;
                width: 68px;
                height: 40px;
                display: block;
                margin: 0 auto 10px;
                content: '';
                position: relative;
                transition: .3s ease-in
            }

            .home-office-service:before {
                background-position: 8px -9px
            }

            .home-improvement:before {
                background-position: -65px -9px
            }

            .property-rental:before {
                background-position: -153px -9px
            }

            .edu-training:before {
                background-position: -242px -9px
            }

            .pro-service:before {
                background-position: 3px -75px
            }

            .travel-transport:before {
                background-position: -73px -75px
            }

            .health-wellness:before {
                background-position: -172px -75px
            }

            .events:before {
                background-position: -247px -75px
            }
        </style>
        <?php
        if (isset($_SESSION["user_reg_error"])) {
            echo '<div class="alert alert-danger text-center rounded-0 mb-0">' . $_SESSION["user_reg_error"] . '</div>';
            unset($_SESSION["user_reg_error"]);
        } else if (isset($_SESSION["user_reg_success"])) {
            echo '<div class="alert alert-success text-center rounded-0 mb-0">' . $_SESSION["user_reg_success"] . '</div>';
            unset($_SESSION["user_reg_success"]);
        }
        ?>
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/photography.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/photography.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Abc</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/photography.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container d-flex justify-content-center">
            <ul class="d-flex">
                <li class="card border-0 m-4 text-center lh-1">
                    <strong>30+ M</strong><br>Happy Users
                </li>
                <li class="card border-0 m-4 text-center lh-1">
                    <strong>200+ K</strong><br>Verified Experts
                </li>
                <li class="card border-0 m-4 text-center lh-1">
                    <strong>200+</strong><br>Categories
                </li>
            </ul>
        </div>

        <br>

        <center>
            <div class="container">
                <div class="row">
                    <?php
                    $counter = '0';
                    foreach ($result as $key => $value) {
                        foreach ($value as $key1 => $value1) {
                            ?>
                            <div class="col-md-1 col-sm-4 col-xs-12 img-thumbnail m-1">
                                <a href="profile_list.php?category=<?php echo $value1->businessCategory; ?>">
                                    <img class="img img-fluid" src="<?php echo $CATEGORY_IMGPATH . $value1->id . ".png"; ?>"
                                        style="height:60px;">
                                    <p>
                                        <?php echo $value1->businessCategory; ?>
                                    </p>
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </center>

        <br>

        <div class="container col-9">
            <h2>Education & Training</h2>

            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="row">

                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/entrance-exam-coaching.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Entrance Exam Coaching</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/job-training.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Job Trainig</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/distance-education.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Distance Education</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="carousel-item">
                        <div class="row">

                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/overseas-education.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Overseas Education</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/school-tuitions.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">School Tuitions</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/bank-insurance-exam-coaching.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Bank & Insurance Exam Coaching</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">

                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/language-training.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Language Training</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/playschools.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Playschools</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/competitive-exam-coaching.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Competitive Exam Coaching</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="carousel-item">

                        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                            <div class="card">
                                <img src="assets/img/service/finance-accounting-tuitions.jpg" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Finance & Accounting Tuitions</h5>
                                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                    <a href="#" class="btn border-danger text-danger d-flex justify-content-center">Get
                                        Qoutes</a>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>


        <br>


        <div class="container col-9">
            <h2>Education & Training</h2>

            <div id="carouselExampleControls2" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="row">

                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/entrance-exam-coaching.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Entrance Exam Coaching</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/job-training.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Job Trainig</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/distance-education.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Distance Education</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="carousel-item">
                        <div class="row">

                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/overseas-education.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Overseas Education</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/school-tuitions.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">School Tuitions</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/bank-insurance-exam-coaching.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Bank & Insurance Exam Coaching</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">

                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/language-training.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Language Training</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/playschools.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Playschools</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                                <div class="card">
                                    <img src="assets/img/service/competitive-exam-coaching.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Competitive Exam Coaching</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#"
                                            class="btn border-danger text-danger d-flex justify-content-center">Get
                                            Qoutes</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="carousel-item">

                        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-12">
                            <div class="card">
                                <img src="assets/img/service/finance-accounting-tuitions.jpg" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Finance & Accounting Tuitions</h5>
                                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                    <a href="#" class="btn border-danger text-danger d-flex justify-content-center">Get
                                        Qoutes</a>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>

        <br>

        <div class="bg-body-tertiary">
            <div class="container">
                <br>
                <center>
                    <h1>WE'VE GOT IT BLOGGED</h1>
                    <h3 class="text-body-secondary">Your Best Practices Guide for all your local service needs</h3>
                </center>
                <br>
                <div class="row">

                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="card">
                            <img src="assets/img/service/competitive-exam-coaching.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title">Niviya Chanchez</h6>
                                <h5 class="card-title">Get Set to Host a Low-Budget Summer Party</h5>
                                <p class="card-text">It's summer and time for a holiday plan. With the past few years
                                    spent confined and distanced socially, this summer is the time for bash and back to
                                    socializing. It is also when kids have summer vacations and want to indulge in fun
                                    and frolic. From......</p>
                                <a href="#" class="btn w-100 text-danger border-danger">READ MORE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="card">
                            <img src="assets/img/service/competitive-exam-coaching.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title">Sai Vishal Kannan</h6>
                                <h5 class="card-title">Why is Summer the Best Season!</h5>
                                <p class="card-text">It's summer and time for a holiday plan. With the past few years
                                    spent confined and distanced socially, this summer is the time for bash and back to
                                    socializing. It is also when kids have summer vacations and want to indulge in fun
                                    and frolic. From......</p>
                                <a href="#" class="btn w-100 text-danger border-danger">READ MORE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="card">
                            <img src="assets/img/service/competitive-exam-coaching.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title">Sai Vishal Kannan</h6>
                                <h5 class="card-title">Breaking Barriers: British Council Scholarships to Empo...</h5>
                                <p class="card-text">It's summer and time for a holiday plan. With the past few years
                                    spent confined and distanced socially, this summer is the time for bash and back to
                                    socializing. It is also when kids have summer vacations and want to indulge in fun
                                    and frolic. From......</p>
                                <a href="#" class="btn w-100 text-danger border-danger">READ MORE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="card">
                            <img src="assets/img/service/competitive-exam-coaching.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title">Harshavardini M</h6>
                                <h5 class="card-title">12 Global Events to Look Forward to in 2023</h5>
                                <p class="card-text">It's summer and time for a holiday plan. With the past few years
                                    spent confined and distanced socially, this summer is the time for bash and back to
                                    socializing. It is also when kids have summer vacations and want to indulge in fun
                                    and frolic. From......</p>
                                <a href="#" class="btn w-100 text-danger border-danger">READ MORE</a>
                            </div>
                        </div>
                    </div>

                </div>
                <br><br>
            </div>
        </div>


        <?php
        include "include/footer.php";
        ?>

    </div>

    <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>