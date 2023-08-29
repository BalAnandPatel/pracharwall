<?php
include 'include/headerr.php';
?>

<style>
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }
</style>
<div>
    <!--------banner-------->
    <section class="content">
        <div class="banner_slider banner_slider_one">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img alt="banner" src="assets/images/banner/breadcrumb-2.png" style="width:100%">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!------banner end-------------->
    <!---breadcrumb----->
    <a name="skiptomain"></a>
</div>

<section class="ab_msec">

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <nav class="breadcrumb1" aria-label="breadcrumb">
                    <ol class="breadcrumb font_size">
                        <li class="breadcrumb-item"><a href="index.php"><img alt="Home"
                                    src="assets/images/social/home-icon2.png" class="homeIcon">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Media</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="footer_content">
            <h4 class="font_size pb-2">Media</h4>
        </div>
        <p>Shyamavsvss Krishi Limited is a public incorporated company. It is classified as Non-govt company and is
            registered at Registrar of Companies. The company provide following services and work mentioned
            below.There are some division which are following please click to link and visit and get the complete
            information about project. Here are some memory of our organisation which are capturde by media and
            people.</p>
        <br>
    </div>

    <div class="container">
        <div class="row">

            <div class="col position-relative justify-content-center d-flex mb-5">
                <a href="gallery.php">
                    <img src="assets/img/img-gallery.png"
                        class="h-50 w-25 z-3 rounded-circle position-absolute top-0 start-50 translate-middle"
                        alt="...">
                    <div class="card w-100 text-center">
                        <div class="card-body pt-5">
                            <h5 class="card-title">Photo Gallery</h5>
                            <p class="card-text">Some photos of our organisation</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col position-relative justify-content-center d-flex mb-5">
                <a href="videogallery.php">
                    <img src="assets/img/video-gallery.png"
                        class="h-50 w-25 z-3 rounded-circle position-absolute top-0 start-50 translate-middle"
                        alt="...">
                    <div class="card w-100 text-center">
                        <div class="card-body pt-5">
                            <h5 class="card-title">Video Gallery</h5>
                            <p class="card-text">Some photos of our organisation</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col position-relative justify-content-center d-flex mb-5">
                <a href="news.php">
                    <img src="assets/img/news-gallery.png"
                        class="h-50 w-25 z-3 rounded-circle position-absolute top-0 start-50 translate-middle"
                        alt="...">
                    <div class="card w-100 text-center">
                        <div class="card-body pt-5">
                            <h5 class="card-title">News Gallery</h5>
                            <p class="card-text">Some news about our organisation</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>

<?php
include 'include/footerr.php';
?>