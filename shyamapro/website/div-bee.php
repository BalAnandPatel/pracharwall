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
                <li class="breadcrumb-item font_size active" aria-current="page">Beekeeping</li>

            </ol>
        </nav>
    </div>

    <div class="container">


        <div class="footer_content">
            <h4 class="font_size pb-2">Beekeeping</h4>
        </div>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h1 style="color: white;">Beekeeping</h1>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        
                        <br />
                        <div class="row">
                            <div class="col-lg-3"><img src="assets/images/sector/beekeeping.jfif" style="width: 100%;" alt="cooperation" /></div>
                            <div class="col-lg-9" style="text-align:justify">
                                <div class="row">
                                    <div class="adminlist-group">
                                        <ul>
                                            <p>Beekeeping (or apiculture) is the maintenance of bee colonies, commonly in man-made beehives. Honey bees in the genus Apis are the most commonly kept species but other honey producing bees such as Melipona stingless bees are also kept. Beekeepers (or apiarists) keep bees to collect honey and other products of the hive: beeswax, propolis, bee pollen, and royal jelly. Pollination of crops, raising queens, and production of package bees for sale are other sources of beekeeping income. Bee hives are kept in an apiary or "bee yard".</p>
                                            <p>The keeping of bees by humans, primarily for honey production, began around 10,000 years ago. Georgia is known as the "cradle of beekeeping" and the oldest honey ever found comes from that country. The 5,500-year-old honey was unearthed from the grave of a noblewoman during archaeological excavations in 2003 near the town Borjomi.[1] Ceramic jars found in the grave contained several types of honey, including linden and flower honey. Domestication of bees can be seen in Egyptian art from around 4,500 years ago; there is also evidence of beekeeping in ancient China, Greece, and Maya.</p>
                                            <p>In the modern era, beekeeping is often used for crop pollination and the production of other products, such as wax and propolis. The largest beekeeping operations are agricultural businesses but many small beekeeping operations are run as a hobby. As beekeeping technology has advanced, beekeeping has become more accessible, and urban beekeeping was described as a growing trend as of 2010. Some studies have found city-kept bees are healthier than those in rural settings because there are fewer pesticides and greater biodiversity in cities.</p>
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