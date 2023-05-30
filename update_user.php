<?php
include "include/header.php";
?>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <!-- <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page"  target="__blank">Notifications</a>
    </nav>
    <hr class="mt-0 mb-4"> -->
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <img class="img-account-profile rounded-circle mb-2" src="assets/img/avatar1.png" alt="">
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Business Name (How your name will appear to
                                other users on the site)</label>
                            <input class="form-control" id="inputUsername" type="text"
                                placeholder="Enter your business name">
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputEmailAddress">Select Business Category</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected disabled>Select Category</option>
                                    <option value="1">Category One</option>
                                    <option value="2">Category Two</option>
                                    <option value="3">Category Three</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Select Business Sub-Category</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected disabled>Select Sub-Category</option>
                                    <option value="1">Category One</option>
                                    <option value="2">Category Two</option>
                                    <option value="3">Category Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="Enter your first name">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" id="inputLastName" type="text"
                                    placeholder="Enter your last name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputLocation">Address</label>
                            <input class="form-control" id="inputLocation" type="text"
                                placeholder="Enter your location">
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email"
                                    placeholder="Enter your email address">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" type="tel"
                                    placeholder="Enter your phone number">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Alternative Phone number</label>
                                <input class="form-control" id="inputPhone" type="tel"
                                    placeholder="Enter your phone number">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputEmailAddress">Year of Establishment</label>
                                <input class="form-control" id="inputEmailAddress" type="email"
                                    placeholder="Enter the year of establishment">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col">
                                <label class="small mb-1" for="inputPhone">Timing</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="@10:00am - 8:00pm">
                            </div>
                            <div class="col">
                                <label class="small mb-1" for="fromDay">From</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected disabled>Select</option>
                                    <option value="1">Sunday</option>
                                    <option value="2">Monday</option>
                                    <option value="3">Tuesday</option>
                                    <option value="4">Wednesday</option>
                                    <option value="5">Thursday</option>
                                    <option value="6">Friday</option>
                                    <option value="7">Saturday</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="small mb-1" for="toDay">To</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected disabled>Select</option>
                                    <option value="1">Sunday</option>
                                    <option value="2">Monday</option>
                                    <option value="3">Tuesday</option>
                                    <option value="4">Wednesday</option>
                                    <option value="5">Thursday</option>
                                    <option value="6">Friday</option>
                                    <option value="7">Saturday</option>
                                </select>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <label for="paymentmethod mb-1 small gx-3">Payment Method</label>
                            <div class="form-check col">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Cash
                                </label>
                            </div>
                            <div class="form-check col">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Master Card
                                </label>
                            </div>
                            <div class="form-check col">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Visa Card
                                </label>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="form-check col">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Debit Cards
                                </label>
                            </div>
                            <div class="form-check col">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Credit Cards
                                </label>
                            </div>
                            <div class="form-check col">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Cheques
                                </label>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Your Website</label>
                                <input class="form-control" id="inputPhone" type="tel"
                                    placeholder="https://www.website.com">
                            </div>
                            <!-- <div class="col-md-6">
                                <label class="small mb-1" for="inputEmailAddress">Year of Establishment</label>
                                <input class="form-control" id="inputEmailAddress" type="email"
                                    placeholder="Enter the year of establishment">
                            </div> -->
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputBirthday">About Your Business</label>
                            <textarea class="form-control" id="inputBirthday" rows="4"
                                placeholder="Enter something about your business"></textarea>
                        </div>
                        <button class="btn btn-primary" type="button">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-xl px-4 mt-4 mb-5">
    <div class="row">
        <div class="col-xl-12">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Upload Post To Your Profile</div>
                <div class="card-body">

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="post1">Post 1</label>
                        <input type="file" class="form-control" id="post1">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="post2">Post 2</label>
                        <input type="file" class="form-control" id="post2">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="post3">Post 3</label>
                        <input type="file" class="form-control" id="post3">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="post4">Post 4</label>
                        <input type="file" class="form-control" id="post4">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="post5">Post 5</label>
                        <input type="file" class="form-control" id="post5">
                    </div>
                    <button class="btn btn-primary" type="button">Upload Posts</button>

                </div>
            </div>
        </div>
    </div>
</div>