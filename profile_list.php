<?php
include "include/header.php";
?>


<style>
    .rated {
        color: orange;
    }

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }
</style>
<div class="modal fade" id="ExploreStore" tabindex="-1" aria-labelledby="ExploreStore" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body mx-3 row">
                <div class="position-relative">
                    <button type="button" class="btn-close position-absolute top-0 start-100 translate-middle"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 py-3">
                    <h2>Are you looking for?</h2>
                    <h5 class="text-secondary">"Computer Institutes"</h5>
                    <form>
                        <div class="form-group">
                            <label for="contact-username">Full Name:</label>
                            <input type="text" class="form-control" id="contact-username" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="contact-email">Email address:</label>
                            <input type="email" class="form-control" id="contact-email" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="serv">Service:</label>
                            <input type="text" class="form-control" id="serv">
                        </div>
                        <div class="form-group mt-2">
                            <input type="submit" class="form-control btn btn-primary" value="SEND ENQUIRY"
                                id="submit-contact">
                        </div>
                    </form>
                    <div class="mt-2">
                        <li>Your requirement is sent to the selected relevant businesses</li>
                        <li>Businesses compete with each other to get you the Best Deal</li>
                        <li>You choose whichever suits you best</li>
                        <li>Contact info sent to you by SMS/Email</li>
                    </div>
                </div>

                <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <img src="assets/img/service/distance-education.jpg" width="100%">
                </div>

            </div>
        </div>
    </div>
</div>



<section style="background-color: #;">
    <div class="container py-5">

        <div class="row">
            <div class="col">
                <nav class="small"
                    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Your Search List</li>
                    </ol>
                </nav>
            </div>
        </div>

        <h3>Salons in Mumbai</h3>

        <div class="row d-flex mt-3 justify-content-between">
            <div class="col col-lg-9 col-xl-9 col-md-12 col-sm-12 col-xs-12 py-3 border rounded mt-1">

                <div class="row">
                    <div class="col col-lg-3 col-xl-3 col-md-6 col-sm-12 col-xs-12 p-2 m-2">
                        <img src="assets/img/events.png" class="img-fluid img-thumbnail" alt="">
                    </div>

                    <div class="col col-lg-8 col-xl-8 col-md-12 col-sm-12 col-xs-12">
                        <h4>
                            Time Machinee Beauty Solutions Private Limited
                        </h4>
                        <div>
                            <span class="bg-success text-white px-2 rounded">4.0</span>
                            <span class="fa fa-star rated"></span>
                            <span class="fa fa-star rated"></span>
                            <span class="fa fa-star rated"></span>
                            <span class="fa fa-star rated"></span>
                            <span class="fa fa-star"></span>&nbsp;
                        </div>
                        <div class="row">

                        </div>
                        <div class="col">
                            Open Until 8:00 pm
                            -
                            15 Yrs in Business
                        </div>
                        <div class="col">
                            About
                        </div>
                        <button class="btn btn-success mt-2">
                            <i class="fa fa-phone"></i> 00809786898
                        </button>
                        <button class="btn btn-outline-primary mt-2" data-bs-toggle="modal"
                            data-bs-target="#ExploreStore">
                            Send Enquiry
                        </button>

                        <!-- <div class="col col-lg-3 col-xl-3 col-md-6 col-sm-12 col-xs-12 p-2 m-2">
                        <h6 class="text-secondary">Timings</h6>
                        <h6></h6>
                    </div> -->
                    </div>

                </div>

            </div>




        </div>
</section>