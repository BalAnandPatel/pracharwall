<?php
include "include/header.php";
?>

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
    

    <!-- <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="Pracharwall_image/logo.png" alt="Pracharwall" width="160" height="40">
            </a>

            <div>
                <a class="p-2 link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                    href="#">
                    List Your Business
                </a>
                <a class="p-2 link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                    href="#">
                    Post a Free Ad
                </a>
                <a class="p-2 link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                    href="#">
                    <i class="bi bi-file-arrow-down-fill"></i> Download App
                </a>
                <a class="p-2 link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                    href="#">
                    Sign in
                </a>
                <a class="p-2 link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                    href="#">
                    Sign Up
                </a>
            </div>
        </div>
    </nav> -->





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

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dropdown">
                        <button class="btn home-office-service dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Home &amp; Office
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dropdown">
                        <button class="btn home-improvement dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Home Improvement
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dropdown">
                        <button class="btn property-rental dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Properties & Rental
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dropdown">
                        <button class="btn edu-training dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Education & Training
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dropdown">
                        <button class="btn pro-service dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Professional Services
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dropdown">
                        <button class="btn travel-transport dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Travel &amp; Transport
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dropdown">
                        <button class="btn health-wellness dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Health &amp; Wellness
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dropdown">
                        <button class="btn events dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Events
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>

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

        <div class="">
            <footer class="d-flex flex-wrap justify-content-between align-items-center px-2 py-3 border-top">
                <p class="col-md-4 mb-0 text-body-secondary">&copy; 2023 Company, Inc</p>

                <a href="index.html"
                    class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <img src="Pracharwall_image/logo.png" alt="Pracharwall" width="160" height="40">
                </a>

                <ul class="nav col-md-4 justify-content-end">
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Register Your Wall</a>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Sign in</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Sign Up</a></li>
                </ul>
            </footer>
        </div>


</body>

</html>