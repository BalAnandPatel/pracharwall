<?php
include 'include/headerr.php';
?>
<?php
$url = $URL . "gallery/read_video_gallery.php";
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
<style>
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }

    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0);
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
                        <li class="breadcrumb-item active" aria-current="page">Video Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="footer_content">
            <h4 class="font_size pb-2">Video Gallery</h4>
        </div>
        <p>Shyamavsvss Krishi Limited is a public incorporated company. It is classified as Non-govt company and is
            registered at Registrar of Companies. The company provide following services and work mentioned
            below.There are some division which are following please click to link and visit and get the complete
            information about project. Here are some memory of our organisation which are capturde by media and
            people.</p>
        <br>

        <div class="row row-cols-1 row-cols-md-4 g-4">

            <?php
            $counter = 0;
            foreach ($result as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    $video = $GALLERY_VIDEO_PATH . "gallery_video_" . $value1->id . ".mp4";
                    ?>

            <div class="col-md-4 col-sm-12">
                <div class="card h-100">
                    <a href="videogallery.php" data-toggle="lightbox" data-gallery="example-gallery">
                     <!--<iframe src="" title="YouTube video" allowfullscreen></iframe>-->
                     <video width="100%" height="240" controls>
                      <source src="<?php echo $video; ?>" type="video/mp4">
                      Your browser does not support the video tag.
                     </video>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $value1->videoTitle; ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $value1->videoDescription; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php }
            } ?>
        </div>
    </div>
</section>

<?php
include 'include/footerr.php';
?>