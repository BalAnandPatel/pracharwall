<?php 
include 'include/headerr.php'; 
?>



<div>

    <!--------banner-------->

    <section class="content">

        <div class="banner_slider banner_slider_one">

            <div class="swiper mySwiper">

                <div class="swiper-wrapper">

                    <div class="swiper-slide">

                         <img alt="banner" src="assets/images/banner/breadcrumb-banner-1.jpg" style="width:100%">

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
        <nav class="breadcrumb1" aria-label="breadcrumb">
            <ol class="breadcrumb font_size">
                <li class="breadcrumb-item">
                    <a href="index.php">
                        <img alt="homeIcon" src="assets/images/social/home-icon2.png" class="homeIcon">Home
                    </a>
                </li>
                <li class="breadcrumb-item font_size active" aria-current="page">Division</li>
                <li class="breadcrumb-item font_size active" aria-current="page">Egg Hechari</li>

            </ol>
        </nav>
    </div>

    <div class="container">


        <div class="footer_content">
            <h4 class="font_size pb-2">Egg Hechari</h4>
        </div>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h1 style="color: white;">Egg Hechari</h1>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        
                        <br />
                        <div class="row">
                            <div class="col-lg-3"><img src="assets/images/sector/egghechari.jpg" style="width: 100%;" alt="cooperation" /></div>
                            <div class="col-lg-9" style="text-align:justify">
                                <div class="row">
                                    <div class="adminlist-group">
                                        <ul>
                                            <p>An egg is an organic vessel grown by an animal to carry a possibly fertilized egg cell (a zygote) and to incubate from it an embryo within the egg until the embryo has become an animal fetus that can survive on its own, at which point the animal hatches.</p>
                                            <p>Most arthropods such as insects, vertebrates (excluding live-bearing mammals), and mollusks lay eggs, although some, such as scorpions, do not.</p>
                                            <p>Reptile eggs, bird eggs, and monotreme eggs are laid out of water and are surrounded by a protective shell, either flexible or inflexible. Eggs laid on land or in nests are usually kept within a warm and favorable temperature range while the embryo grows. When the embryo is adequately developed it hatches, i.e., breaks out of the egg's shell. Some embryos have a temporary egg tooth they use to crack, pip, or break the eggshell or covering.</p>
                                            <p>The largest recorded egg is from a whale shark and was 30 cm × 14 cm × 9 cm (11.8 in × 5.5 in × 3.5 in) in size. Whale shark eggs typically hatch within the mother. At 1.5 kg (3.3 lb) and up to 17.8 cm × 14 cm (7.0 in × 5.5 in), the ostrich egg is the largest egg of any living bird, though the extinct elephant bird and some non-avian dinosaurs laid larger eggs. The bee hummingbird produces the smallest known bird egg, which measures between 6.35–11.4 millimetres (0.250–0.449 in) long and weighs half of a gram (around 0.02 oz). Some eggs laid by reptiles and most fish, amphibians, insects, and other invertebrates can be even smaller.</p>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Portal of Agriculture Census
                    </button>
                </h2>
            </div> -->


            <br><br>




            <ul>

                <!-- <li class="breadcrumb-item font_size active" aria-current="page">Publish Date :12-12-2022</li> -->

            </ul>
        </div>
    </div>

</section>


<script>



    /*******************************
    * ACCORDION WITH TOGGLE ICONS
    *******************************/
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>





<?php 
include 'include/footerr.php'; 
?>