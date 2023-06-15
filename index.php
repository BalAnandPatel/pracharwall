<?php
include "include/header.php";
?>
<!-- header part end here -->
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

<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
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
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="">Next</span>
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
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
        <div class="row justify-content-center">
            <?php
            $counter = '0';
            foreach ($result as $key => $value) {
                foreach ($value as $key1 => $value1) {
            ?>
                    <div class="col-md-1 col-sm-4 col-xs-12 img-thumbnail m-1">
                        <a href="profile_list.php?category=<?php echo $value1->businessCategory; ?>">
                            <img class="img img-fluid" src="<?php echo $CATEGORY_IMGPATH . $value1->id . ".png"; ?>" style="height:60px;">
                            <p>
                                <?php echo $value1->businessCategory; ?>
                            </p>
                        </a>
                    </div>
                    <?php if(++$counter==2){ ?>
                        <div class="col-md-1 col-sm-4 col-xs-12 img-thumbnail m-1 d-flex align-items-center">
                        <a class="fs-4" data-bs-toggle="offcanvas" href="#sidenav" aria-controls="offcanvasExample" style="text-decoration:none;">
                        <img class="img img-fluid" src="Pracharwall_image/hamburger-menu.png" style="height:auto;">
                            <!-- <p>
                                View More
                            </p> -->
                        </a>
                    </div>
                    <?php break; } ?>
            <?php
                }
            }
            ?>
        </div>
    </div>
</center>

<br>

<div class="container">

    <?php
    $counter = 0;
    foreach ($result as $key => $value) {
        foreach ($value as $key1 => $value1) {
    ?>
        <div class="my-4">
            <div class="row">
                <div class="col">
                    <h3 class="card-title"><?php echo $value1->businessCategory; ?></h3>
                </div>
                <div class="col d-flex justify-content-end" id="customize-controls">
                    <button class="btn btn-outline-primary btn-sm m-1" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <i class="bi bi-arrow-left"></i>
                        <span class="">Previous</span>
                    </button>
                    <button class="btn btn-outline-primary btn-sm m-1" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="">Next</span>
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $url = $URL . "user/read_profile_by_category.php";
                    $userType = '2';
                    $businessCategory = $value1->businessCategory;
                    $data = array("userType" => $userType, "businessCategory" => $businessCategory);
                    $postdata = json_encode($data);
                    $client = curl_init($url);
                    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
                    $response = curl_exec($client);
                    //print_r($response);
                    $result = json_decode($response);
                    //print_r($result);
                    ?>
                    <?php error_reporting(0); if($result->records[0]->status=='1'){ ?>
                    <div class="carousel-item active">
                        <div class="row my-slider align-items-center">
                        <?php 
                          $counter=0;  
                          foreach($result as $key => $value){
                          foreach($value as $key1 => $value1)
                         {
                    ?>
                            <div class="col-md-3 col-lg-3 col-xl-3 col-sm-12 col-xs-12">
                            <a href="profile_view.php?id=<?php echo $value1->userId;?>" style="color:inherit; text-decoration:none;">
                                <div class="card" style="width: 16rem;height:100%;">
                                    <img id="businessImg" src="<?php $id=$value1->userId; echo $USER_PROFILE_IMGPATH.$id."/user_img_".$id.".png"; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php echo $value1->businessName; ?>
                                        </h5>
                                        <p class="card-text"><?php echo $value1->city; ?></p>
                                        <a href="#" class="btn btn-primary w-100">Enquiry Now</a>
                                    </div>
                                </div>
                              </a>
                            </div>
                          <?php }} ?>
                        </div>
                    </div>
                    <?php }else{
                        echo '<p class="text-center text-warning p-2">No Business Listed</p>';
                    } ?>
                </div>
            </div>
        </div>
    <?php }
    } ?>

    <br>
    <!-- <hr> -->

    <!-- <div class="">
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
    </div> -->

</div>

<?php include "include/footer.php"; ?>