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
                    <button type="button" class="btn-close position-absolute top-0 start-100 translate-middle" data-bs-dismiss="modal"
                        aria-label="Close"></button>
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
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index1.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="row border p-3 rounded">

            <div class="col col-lg-1 col-xl-1 col-md-12 col-sm-12 col-xs-12 py-3 d-flex justify-content-center">
                <img src="Pracharwall_image/logo.png" width="100" height="100" class="border rounded py-4 px-2">
            </div>

            <div class="col col-lg-8 col-xl-8 col-md-12 col-sm-12 col-xs-12">

                <h2>Laqshya Institute Of Skills Training</h2>
                <div>
                    <span class="bg-success text-white px-2 rounded">4.0</span>
                    <span class="fa fa-star rated"></span>
                    <span class="fa fa-star rated"></span>
                    <span class="fa fa-star rated"></span>
                    <span class="fa fa-star rated"></span>
                    <span class="fa fa-star"></span>&nbsp;
                    <span class="text-secondary">223 Ratings</span>
                    <span><i class="bi bi-check-circle-fill"></i> Checked</span>
                </div>
                <div class="row">
                    <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        Andheri West, mumbai
                    </div>
                    <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <i class="bi bi-dot"></i>Open Until 8:00 pm
                    </div>
                    <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <i class="bi bi-dot"></i>15 Yrs in Business
                    </div>
                </div>
                <div>
                    300 people recently enquired
                </div>
                <div class="border bg-success text-white btn mt-2">
                    1234567890
                </div>
            </div>

            <div class="col col-lg-3 col-xl-3 col-md-12 col-sm-12 col-xs-12 d-flex align-items-center mt-1">
                <a class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#ExploreStore" href="">
                    <b>Enquiry Now</b>
                </a>
            </div>

        </div>


        <div class="row d-flex mt-3 justify-content-between">
            <div class="col col-lg-9 col-xl-9 col-md-12 col-sm-12 col-xs-12 py-3 border rounded mt-1">
                <h5>Quick Information</h5>

                <div class="row">
                    <div class="col col-lg-3 col-xl-3 col-md-6 col-sm-12 col-xs-12 p-2 m-2">
                        <h6 class="text-secondary">Mode of Payment</h6>
                        <h6>Cash, Master Card, Visa Card, Debit Cards, Cheques, Credit Card</h6>
                    </div>

                    <div class="col col-lg-3 col-xl-3 col-md-6 col-sm-12 col-xs-12 p-2 m-2">
                        <h6 class="text-secondary">Year of Establishment</h6>
                        <h6>2008</h6>
                    </div>

                    <div class="col col-lg-3 col-xl-3 col-md-6 col-sm-12 col-xs-12 p-2 m-2">
                        <h6 class="text-secondary">Timings</h6>
                        <h6>Mon - Sun <br> 10:00 am - 8:00 pm</h6>
                    </div>
                </div>
                <div class="row">
                    <h5>Services</h5>
                    <!-- <table class="mx-3">
                        <tr>
                            <td><span><i class="bi bi-check-circle-fill text-success"></i> Tally</span></td>
                            <td><span><i class="bi bi-check-circle-fill text-success"></i> Programming</span></td>
                            <td><span><i class="bi bi-check-circle-fill text-success"></i> SAP</span></td>
                        </tr>
                        <tr>
                            <td><span><i class="bi bi-check-circle-fill text-success"></i> Mobile Development</span>
                            </td>
                            <td><span><i class="bi bi-check-circle-fill text-success"></i> Online</span></td>
                            <td><span><i class="bi bi-check-circle-fill text-success"></i> Offline</span></td>
                        </tr>
                    </table> -->
                </div>
                <div class="row mt-4">
                    <h5>About Us</h5>
                    <div class="col">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, cumque.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, cumque.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, cumque.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, cumque.
                    </div>
                </div>

            </div>

            <div class="col col-lg-3 col-xl-3 col-md-12 col-sm-12 col-xs-12 border rounded mt-1 py-3">
                <h5>Address</h5>
                <h6>Off.No.9 / 3A Bldg., Vivina CHS Ltd, Super Shopping Centre, Andheri West, Mumbai - 400058 (Nr.NADCO
                    Shopping Landmark : Opp.Railway Station, Nr.Bus Depo)</h6>

                <a href="#" class="m-1 link-underline-light"><i class="bi bi-compass"></i> Get Directions</a>
                <a href="#" class="m-1 link-underline-light"><i class="bi bi-clipboard-plus"></i> Copy</a>
                <hr>
                <a href="#" class="m-1 link-underline-light"><i class="bi bi-compass"></i> Send Enquiry by Email</a>
                <hr>
                <a href="#" class="m-1 link-underline-light"><i class="bi bi-compass"></i> Get info via SMS/Email</a>
                <hr>
                <a href="#" class="m-1 link-underline-light"><i class="bi bi-compass"></i> Share this</a>
                <hr>
                <a href="#" class="m-1 link-underline-light"><i class="bi bi-compass"></i> Tap to rate</a>
                <hr>
                <a href="#" class="m-1 link-underline-light"><i class="bi bi-compass"></i> Visit our Website</a>
                <hr>
                <a href="#" class="m-1 link-underline-light"><i class="bi bi-compass"></i> Edit This</a>
            </div>

        </div>

        <div class="row border rounded mt-4 py-3">
            <div class="col">
                <h5>Photos</h5>
                <div class="row">
                    <div class="col col-xl-2 col-lg-4 col-md-6 col-sm-12 col-xs-12 mt-1"><img
                            src="assets/img/events.png" class="border rounded"></div>
                    <div class="col col-xl-2 col-lg-4 col-md-6 col-sm-12 col-xs-12 mt-1"><img
                            src="assets/img/events.png" class="border rounded"></div>
                    <div class="col col-xl-2 col-lg-4 col-md-6 col-sm-12 col-xs-12 mt-1"><img
                            src="assets/img/events.png" class="border rounded"></div>
                    <div class="col col-xl-2 col-lg-4 col-md-6 col-sm-12 col-xs-12 mt-1"><img
                            src="assets/img/events.png" class="border rounded"></div>
                    <div class="col col-xl-2 col-lg-4 col-md-6 col-sm-12 col-xs-12 mt-1"><img
                            src="assets/img/events.png" class="border rounded"></div>
                </div>
                <div class="row btn mt-2">
                    <button class="btn btn-primary"><i class="bi bi-cloud-arrow-up-fill"></i> Upload Photos</button>
                </div>
            </div>
        </div>

        <div class="row border rounded mt-4 py-3">
            <div class="col">
                <h5>Question & Answers</h5>
                <h6 class="text-secondary">Would you like to ask a questions?</h6>
                <div class="row btn mt-2">
                    <button class="btn btn-primary">Post Your Question</button>
                </div>
            </div>
        </div>

        <div class="row border rounded mt-4 py-3">
            <div class="col">
                <h5>Reviews & Ratings</h5>
                <div class="row">

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 d-flex border-secondary border-end">
                        <div class="p-4">
                            <h1 class="bg-success d-inline text-white p-2 rounded-4">4.0</h1>
                        </div>
                        <div class="p-2">
                            <h2>223 Ratings</h2>
                            <h6 class="text-secondary">Pracharwall rating index based on 223 ratings across the web</h6>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 px-4">
                        <h2>Start Your Review</h2>
                        <div class="rate">
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="Excellent">1 star</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="Nice">2 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="Enough">3 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="Not Useful">4 stars</label>
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="Poor">5 stars</label>
                        </div>
                    </div>

                </div>

                <div class="row mt-3">
                    <h5>User Reviews</h5>
                    <div class="col p-2">
                        <ul class="d-flex justify-content-between" id="myTab" role="tablist">
                            <div class="nav nav-tabs">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home-tab-pane" type="button" role="tab"
                                        aria-controls="home-tab-pane" aria-selected="true">Relevant</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-pane" type="button" role="tab"
                                        aria-controls="profile-tab-pane" aria-selected="false">Friends Ratings</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#contact-tab-pane" type="button" role="tab"
                                        aria-controls="contact-tab-pane" aria-selected="false">Latest</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="disabled-tab" data-bs-toggle="tab"
                                        data-bs-target="#disabled-tab-pane" type="button" role="tab"
                                        aria-controls="disabled-tab-pane" aria-selected="false">High to Low</button>
                                </li>
                            </div>
                            <li class="nav-item" style="list-style-type: none;">
                                <div class="input-group">
                                    <span class="input-group-text" id="SearchReview">
                                        <i class="bi bi-search"></i>
                                    </span>
                                    <input type="text" size="40" class="form-control" placeholder="Search Reviews"
                                        aria-describedby="SearchReview">
                                </div>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">

                                <div class="d-flex flex-start p-5">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (23).webp" alt="avatar"
                                        width="60" height="60" />
                                    <div>
                                        <h6 class="fw-bold mb-1">Maggie Marsh</h6>
                                        <div class="d-flex align-items-center mb-3">
                                            <p class="mb-0">March 07, 2021</p>
                                        </div>
                                        <p class="mb-0">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text ever
                                            since the 1500s, when an unknown printer took a galley of type and
                                            scrambled it.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-0" />

                        </div>

                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                            tabindex="0">
                            ...
                        </div>
                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                            tabindex="0">
                            ...
                        </div>
                        <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab"
                            tabindex="0">
                            ...
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
</section>