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
                <li class="breadcrumb-item font_size active" aria-current="page">Medical</li>

            </ol>
        </nav>
    </div>

    <div class="container">


        <div class="footer_content">
            <h4 class="font_size pb-2">Medical</h4>
        </div>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h1 style="color: white;">Veterinary Medical Care</h1>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        
                        <br />
                        <div class="row">
                            <div class="col-lg-3"><img src="assets/images/sector/medical.jpg" style="width: 100%;" alt="cooperation" /></div>
                            <div class="col-lg-9" style="text-align:justify">
                                <div class="row">
                                    <div class="adminlist-group">
                                        <ul>
                                            <p>A veterinarian (vet) is a medical professional who practices veterinary medicine. They manage a wide range of health conditions and injuries in non-human animals. Along with this, veterinarians also play a role in animal reproduction, health management, conservation, husbandry and breeding and preventive medicine like nutrition, vaccination and parasitic control as well as biosecurity and zoonotic disease surveillance and prevention.</p>
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