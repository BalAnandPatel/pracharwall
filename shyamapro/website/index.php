<?php
include 'include/headerr.php';
?>
<script type="text/javascript">
    $(window).on('load', function () {
        $('#modal-1').modal('show');
        $('#modal-2').modal('show');
        $('#modal-3').modal('show');
    });
</script>
<style>
    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0);
    }
</style>
<!-- Modal -->
<div class="modal fade" id="modal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center">
                <button type="button" class="btn-close bg-white p-4 position-absolute top-0 end-0"
                    data-bs-dismiss="modal" aria-label="Close"></button>
                <img src="assets/img/notice.jpg" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center">
                <button type="button" class="btn-close bg-white p-4 position-absolute top-0 end-0"
                    data-bs-dismiss="modal" aria-label="Close"></button>
                <img src="assets/img/modal-1.png" class="img-fluid">
            </div>
        </div>
    </div>
</div><div class="modal fade" id="modal-3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center">
                <button type="button" class="btn-close bg-white p-4 position-absolute top-0 end-0"
                    data-bs-dismiss="modal" aria-label="Close"></button>
                <img src="assets/img/modal-2.png" class="img-fluid">
            </div>
        </div>
    </div>
</div>



<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div>
</div>


<div class="slider-traceperant"></div>
<section class="rev_slider_wrapper">
    <div id="slider1" class="rev_slider">
        <ul>
            <li> <img src="assets/img/slider/1.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/2.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/3.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/4.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/5.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/6.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/7.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/8.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/9.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/10.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/11.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/12.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/13.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/14.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/15.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/16.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/17.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/18.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/19.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/20.jpeg" alt=""> </li>
            <li> <img src="assets/img/slider/21.jpeg" alt=""> </li>
        </ul>
    </div>

</section>




<!--Main Slider Start-->
<!-- <section class="main-slider clearfix">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                "el": "#main-slider-pagination",
                "type": "",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                "delay": 5000
                }}'>
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(assets/images/backgrounds/main-slider-2-1.jpg);">
                    <div class="main-slider__img"><img src="assets/images/logo/logo.png"></div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <p class="main-slider__sub-title">We are Producing Natural Products</p>
                                <h2 class="main-slider__title">Agriculture.</h2>
                                <div class="main-slider__btn-box">
                                    <a href="div-agriculture.php" class="thm-btn main-slider__btn">Discover More <i
                                            class="icon-right-arrow"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(assets/images/backgrounds/main-slider-2-9.jpg);">
                    <div class="main-slider__img"><img src="assets/images/logo/logo.png"></div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <p class="main-slider__sub-title">We are Providing Education for Student</p>
                                <h2 class="main-slider__title">Education.</h2>
                                <div class="main-slider__btn-box">
                                    <a href="#" class="thm-btn main-slider__btn">Discover More <i
                                            class="icon-right-arrow"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(assets/images/backgrounds/main-slider-3-5.jpg);">
                    <div class="main-slider__img"><img src="assets/images/logo/logo.png"></div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <p class="main-slider__sub-title">We are Providing Small Scale Industries Services</p>
                                <h2 class="main-slider__title">Small Scale Industries.</h2>
                                <div class="main-slider__btn-box">
                                    <a href="div-ssindustry.php" class="thm-btn main-slider__btn">Discover More <i
                                            class="icon-right-arrow"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(assets/images/backgrounds/main-slider-4-1.jpg);">
                    <div class="main-slider__img"><img src="assets/images/logo/logo.png"></div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <p class="main-slider__sub-title">We are Providing Animal Husbandry Services</p>
                                <h2 class="main-slider__title">Animal Husbandry.</h2>
                                <div class="main-slider__btn-box">
                                    <a href="div-animalhusbandry.php" class="thm-btn main-slider__btn">Discover More <i
                                            class="icon-right-arrow"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(assets/images/backgrounds/main-slider-4-2.png);">
                    <div class="main-slider__img"><img src="assets/images/logo/logo.png"></div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <p class="main-slider__sub-title">We are Providing Beekeeping Services</p>
                                <h2 class="main-slider__title">Beekeeping.</h2>
                                <div class="main-slider__btn-box">
                                    <a href="div-bee.php" class="thm-btn main-slider__btn">Discover More <i
                                            class="icon-right-arrow"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(assets/images/backgrounds/main-slider-4-3.jpg);">
                    <div class="main-slider__img"><img src="assets/images/logo/logo.png"></div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <p class="main-slider__sub-title">We are Providing Poultry Farming Services</p>
                                <h2 class="main-slider__title">Poultry Farming.</h2>
                                <div class="main-slider__btn-box">
                                    <a href="div-animalhusbandry.php" class="thm-btn main-slider__btn">Discover More <i
                                            class="icon-right-arrow"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(assets/images/backgrounds/main-slider-4-4.jpg);">
                    <div class="main-slider__img"><img src="assets/images/logo/logo.png"></div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <p class="main-slider__sub-title">We are Providing Veterinary Medical Care Services</p>
                                <h2 class="main-slider__title">Veterinary Medical Care.</h2>
                                <div class="main-slider__btn-box">
                                    <a href="div-medical.php" class="thm-btn main-slider__btn">Discover More <i
                                            class="icon-right-arrow"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(assets/images/backgrounds/main-slider-4-5.jpg);">
                    <div class="main-slider__img"><img src="assets/images/logo/logo.png"></div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <p class="main-slider__sub-title">We are Providing Vermicomposting Services</p>
                                <h2 class="main-slider__title">Vermicomposting.</h2>
                                <div class="main-slider__btn-box">
                                    <a href="div-agriculture.php" class="thm-btn main-slider__btn">Discover More <i
                                            class="icon-right-arrow"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="swiper-pagination" id="main-slider-pagination"></div>

         If we need navigation buttons 
        <div class="main-slider__nav">
            <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                <i class="icon-right-arrow"></i>
            </div>
            <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                <i class="icon-right-arrow"></i>
            </div>
        </div>

    </div>
</section> -->
<!--Main Slider End-->

<!--Feature One Start-->
<section class="" style="background-color:#0e2207;">
    <div class="container">
        <div class="row">
            <!--Feature One Single Start-->
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="feature-one__single">
                    <div class="feature-one__icon">
                        <span class="icon-farm"></span>
                    </div>
                    <div class="feature-one__content">
                        <h3 class="feature-one__title">the Best Quality <br> Standards</h3>
                    </div>
                </div>
            </div>
            <!--Feature One Single End-->
            <!--Feature One Single Start-->
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="feature-one__single">
                    <div class="feature-one__icon">
                        <span class="icon-agriculture"></span>
                    </div>
                    <div class="feature-one__content">
                        <h3 class="feature-one__title">a Smart organic <br> services</h3>
                    </div>
                </div>
            </div>
            <!--Feature One Single End-->
            <!--Feature One Single Start-->
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="feature-one__single">
                    <div class="feature-one__icon">
                        <span class="icon-harvest"></span>
                    </div>
                    <div class="feature-one__content">
                        <h3 class="feature-one__title">Natural Healthy <br> products</h3>
                    </div>
                </div>
            </div>
            <!--Feature One Single End-->
        </div>
    </div>
</section>
<!--Feature One End-->

<section class="content" style="padding: 20px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4" style="padding-left: 0px !important;">
                <div class="row minister-section">
                    <div class="col-12 col-md-12">

                        <div class="">
                            <a class="link_ redirectconfirmation" href="index.php" class="link_"
                                style="display:flex;flex-direction: column;align-items: center;justify-content: center;">

                                <img src="assets/images/logo/logo.png" alt="SHYAMAVSVSS KRISHI LIMITED"
                                    style="width: 50%;" />
                                <h4 class="section_content_two_heading">SHYAMAVSVSS KRISHI LIMITED</h4>
                                <!-- <p class="font_size text-center">
                                            Hon’ble Minister of Agriculture & <br />
                                            Farmers Welfare
                                        </p> -->
                            </a>
                        </div>

                    </div>
                    <!-- <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="minister-box minister-box_ ">
                                    <a  href="index.php"
                                        class="link_ redirectconfirmation" style="display:flex;flex-direction: column;align-items: center;justify-content: center;">
                                       
                                        <img src="assets/images/resources/sushri-shobha-karandlaje.jpg" alt="sushri-shobha-karandlaje" />
                                            <h4 class="section_content_two_heading font_size">
                                                Sushri Shobha
                                                Karandlaje
                                            </h4><p class="font_size">Hon'ble Minister of State</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="minister-box minister-box_">
                                    <a href="index.php"
                                       class="link_ redirectconfirmation" style="display:flex;flex-direction: column;align-items: center;justify-content: center;">
                                        
                                        <img src="assets/images/resources/shri-kailash-choudhary.jpg" alt="shri-kailash-choudhary" />
                                            <h4 class="section_content_two_heading font_size">
                                                Shri Kailash
                                                Choudhary
                                            </h4>
                                            <p class="font_size">Hon'ble Minister of State</p>                                    </a>
                                </div>
                            </div>
                        </div> -->
                    <!-- <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="audio_box">

                                <h2 class="songheading">Krishi Geet</h2>

                                <audio controls>
                                    <source src="assets/images/resources/audio_agri.mpeg" type="audio/mpeg" />
                                </audio>
                            </div>
                        </div> -->
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 dst_sm">
                <div class="row padding_80px row_sm">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="footer_content">
                            <h4 class="font_size pb-2">About Shyamavsvss Krishi Limited</h4>
                            <p class="font_size">
                                Shyamavsvss Krishi Limited is a Public Limited Company which is having a expertise in
                                Agriculture Farming, Fish Farming, Duck Farming, Geni Pig Farming, Goat Farming, Pig
                                Farming, Seap Farming, Fish Hatchery, Duck Hatchery, Egg Hatchery of Birds, Rural work
                                etc. The Company provide offer to farmer for the contract base agriculture which provide
                                more profit than self farming.</p>
                            <p>
                                The Shyamavsvss Krishi Limited aim to create a big agriculture market in all over india
                                with Brand name of Shyamavsvss Krishi Limited also the aim of Shyamavsvss Krishi Limited
                                is Provide Job work for all types of unemloyed human body. Shyamavsvss Krishi Limited is
                                currently starting the fishing pond in several rural area for the Fish Farming.
                            </p>
                        </div>

                        <div class="about-one__btn-box">
                            <a href="about.php" class="thm-btn about-one__btn" style="text-decoration: none;">More<i
                                    class="icon-right-arrow"></i> </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
</section>






<!--About One Start-->
<section class="about-one">
    <div class="about-one-shape-1 float-bob-x">
        <img src="assets/images/shapes/about-one-shape-1.png" style="width:100%;">
    </div>
    <div class="container">
        <div class="row mb-3">
            <?php
            $url = $URL . "notification/read_notification.php";
            $data = array();
            //print_r($data);
            $postdata = json_encode($data);
            $client = curl_init($url);
            curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
            $response = curl_exec($client);
            //print_r($response);
            $result = json_decode($response);
            //print_r($result);
            ?>
            <div class="col-xl-4">
                <img src="assets/images/notifi.png" class="img-fluid" alt="">
            </div>
            <div class="col-xl-8">
                <span class="section-title__tagline">
                    <image src="assets/images/resources/new.gif" style="width:50px; height:50px;" alt="">
                        Notifications
                </span>
                <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="max-height:300px;">

                    <ul class="list-group">
                        <?php

                        $counter = 0;
                        foreach ($result as $key => $value) {
                            foreach ($value as $key1 => $value1) {
                                $pdf_path = "../admin/image/notification_pdf/" . $value1->id . "/pdf/" . $value1->id . ".pdf";
                                ?>
                                <li class="list-group-item d-flex">
                                    <p class="p-0 m-0 flex-grow-1 text-danger"><u>
                                            <?php echo $value1->n_title; ?>
                                        </u></p>
                                    <a href="<?php echo $pdf_path; ?>" target="_blank"><button
                                            class="btn btn-danger btn-sm rounded-0">View PDF</button></a>
                                </li>
                            <?php }
                        } ?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="about-one__left">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">Get to know about us</span>
                        <h2 class="font_size">About Shyamavsvss Krishi Limited</h2>
                        <div class="section-title__icon">
                            <img src="assets/images/icon/section-title-icon-1.png" alt="">
                        </div>
                    </div>
                    <p class="font_size">
                        Shyamavsvss Krishi Limited Company is a multi sector Comapny which deal in The Follwing Sector
                        which can imporve the quality.</p>
                    <p>

                    <p class="font_size">
                        Shyamavsvss Krishi Limited start the network of work.
                        Shyamavsvss Krishi limited start project as village and block wise then we create the block
                        level office and distric level office by which we collect the product from rural level worker
                        and supply to country level.</p>
                    <p>
                        The Shyamavsvss Krishi Limited aim to create a big agriculture market in all over india with
                        Brand name of Shyamavsvss Krishi Limited also the aim of Shyamavsvss Krishi Limited is Provide
                        Job work for all types of unemloyed human body. Shyamavsvss Krishi Limited is currently starting
                        the fishing pond in several rural area for the Fish Farming.
                    </p>
                    <p>
                        The Shyamavsvss Krishi Limited is Company Also
                        provide Training Programm. The aim Of the Training
                        programm to Provide the knowleg of self Employeement.
                        We Provide the Following Sector training Program.
                        <br> 1- Agriculture Farming
                        <br>2-Fishing Farming
                        <br>3-Sanitary Pad Making
                        <br>4-Goat Farming
                        <br>5-Varmi Compost Making
                        <br>6-Egg Hachery Training.



                    </p>

                    <div class="about-one__btn-and-ceo mt-5">
                        <div class="about-one__btn-box">
                            <a href="about.php" class="thm-btn about-one__btn">About More<i
                                    class="icon-right-arrow"></i> </a>
                        </div>
                        <div class="about-one__ceo">
                            <!--  <div class="about-one__ceo-img">
                                         <img src="assets/images/resources/about-one-ceo-mg.jpg" alt="Ceo img"> 
                                    </div> -->
                            <!-- <div class="about-one__ceo-content">
                                        <h4 class="about-one__ceo-name">Mike Hardson</h4>
                                        <img src="assets/images/resources/sign.png" width="250px" height="80px" alt="">
                                        <p class="about-one__ceo-title">CEO of Agrion</p>
                                    </div> -->
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-one__right">
                    <div class="about-one__img-box wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="about-one__img-one">
                            <img src="assets/img/about/ssi1.jpeg" alt="">
                        </div>
                        <div class="about-one__img-two">
                            <img src="assets/img/about/baag.jpeg" style="width:350px; height:332px;" alt="">
                            <div class="about-one__logo"><img src="assets/images/logo/logo.png"></div>
                        </div>
                        <div class="about-one__video-link">
                            <a href="#" class="video-popup">
                                <div class="about-one__video-icon">
                                    <span class="fa fa-play"></span>
                                    <i class="ripple"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About One End-->

<!--Services One Start-->
<section class="services-one">
    <div class="services-one__bg" style="background-image: url(assets/images/shapes/services-one-shape-1.png);">
    </div>
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">What We’re Doing</span>
            <h2 class="section-title__title">Services We’re offering</h2>
            <div class="section-title__icon">
                <img src="assets/images/icon/section-title-icon-1.png" alt="">
            </div>
        </div>

        <div class="row gallery-wrap">
            <center>
                <div>
                    <div>
                        <div class="gallery col-sm-12 col-lg-6 col-md-12">

                            <!--Services One Single Start-->
                            <div class="container mySlides">
                                <div class="services-one__single">
                                    <div class="services-one__img-box">
                                        <div class="services-one__img">
                                            <img src="assets/img/about/silai.jfif" height="196px" alt="">
                                        </div>
                                        <div class="services-one__icon">
                                            <span class="icon-vegetables"></span>
                                        </div>
                                    </div>
                                    <div class="services-one__content">
                                        <h3 class="services-one__title"><a href="service_education.php"> Small Scale
                                                Industries</a></h3>
                                        <p class="services-one__text" style="text-align:justify;">Small Scale Industry
                                            is also called cottage industry this is a field that gives maximum Jobs to
                                            the people. Small Scale industry has a very important contribution in
                                            strengthening the economy of our India Country. At present...</p>
                                    </div>
                                </div>
                            </div>
                            <!--Services One Single End-->

                            <!--Services One Single Start-->
                            <div class="container mySlides">
                                <div class="services-one__single">
                                    <div class="services-one__img-box">
                                        <div class="services-one__img">
                                            <img src="assets/img/about/baag3.jpeg" alt="">
                                        </div>
                                        <div class="services-one__icon">
                                            <span class="icon-organic-food"></span>
                                        </div>
                                    </div>
                                    <div class="services-one__content">
                                        <h3 class="services-one__title"><a href="service_agriculture.php"> Organic
                                                Farming</a></h3>
                                        <p class="services-one__text" style="text-align:justify;">Organic Farming by the
                                            company which is a method of agriculture. which is based on the use of
                                            synthetic fertilizers and pesticides and which uses Crop rotation Green
                                            manure compost etc to mantian the fertility of land.</p>
                                    </div>
                                </div>
                            </div>
                            <!--Services One Single End-->

                            <!--Services One Single Start-->
                            <div class="container mySlides">
                                <div class="services-one__single">
                                    <div class="services-one__img-box">
                                        <div class="services-one__img">
                                            <img src="assets/img/about/sital.jfif" height="196px" alt="">
                                        </div>
                                        <div class="services-one__icon">
                                            <span class="icon-vegetables"></span>
                                        </div>
                                    </div>
                                    <div class="services-one__content">
                                        <h3 class="services-one__title"><a href="service_education.php"> Education level
                                                Improvement</a></h3>
                                        <p class="services-one__text" style="text-align:justify;">In our country,
                                            however civic duties have been included in the education theory. However not
                                            all students have their complete knowledge If today's students want to
                                            improve the level of education by keeping the spirit of...</p>
                                    </div>
                                </div>
                            </div>
                            <!--Services One Single End-->
                        </div>
                    </div>
                </div>

                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>

            </center>
        </div>
    </div>
</section>
<!--Services One End-->

<style>
    .mySlides {
        display: none;
    }

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {
            font-size: 11px
        }
    }
</style>


<!--Unbeatable One Start-->
<!-- <section class="unbeatable-one">
            <div class="unbeatable-one__bg  jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url(assets/images/backgrounds/unbeatable-one-bg.jpg);"></div>
            <div class="container">
                <div class="unbeatable-one__inner text-center">
                    <div class="unbeatable-one__content">
                        <div class="unbeatable-one__shape-one wow slideInLeft" data-wow-delay="100ms"
                            data-wow-duration="2500ms">
                            <img src="assets/images/shapes/unbeatable-shape-1.png" alt="" class="float-bob-y">
                        </div>
                        <div class="unbeatable-one__shape-two wow slideInRight" data-wow-delay="100ms"
                            data-wow-duration="2500ms">
                            <img src="assets/images/shapes/unbeatable-shape-2.png" alt="" class="float-bob-y">
                        </div>
                        <p class="unbeatable-one__tagline">We are Providing good services</p>
                        <h3 class="unbeatable-one__title">Agriculture Services</h3>
                        <div class="unbeatable-one__btn-box">
                            <a href="service_agriculture.php" class="thm-btn unbeatable-one__btn">Discover More <i
                                    class="icon-right-arrow"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section> -->
<!--Unbeatable One End-->

<!-- <br><br><br><br> -->



<style>
    .gallery {
        /* width: 60%; */
        display: flex;
        justify-content: center;
        overflow-x: scroll;
    }

    .gallery-wrap div {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .gallery div {
        display: grid;
        grid-template-columns: auto;
        flex: none;
        width: 100%;
    }

    .gallery::-webkit-scrollbar {
        display: none;
    }

    #backbtn,
    #nextbtn {
        cursor: pointer;
        border-radius: 50%;
        border: 5px solid #1f6306;
        margin: 4px;
    }
</style>


<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 5000); // Change image every 5 seconds
    }
</script>





<?php
include 'include/footerr.php';
?>