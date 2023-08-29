<?php include "include/headerr.php"; ?>
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
                        <li class="breadcrumb-item">
                            <a href="index.php">
                                <img alt="Home" src="assets/images/social/home-icon2.png" class="homeIcon">Home
                            </a>
                        </li>


                        <li class="breadcrumb-item active" aria-current="page">Farmer Registration</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
<div class="bg-light" style="background: url('assets/images/backgrounds/Farmland.jpe') no-repeat; background-size: cover;">
    <h4 class="font_size p-2 mt-2"><center>Farmer Registration Section</center></h4>
    <center class="p-2">Dear Farmer Please fillup The Form. We will Call Back after View your Details</center>
    <div class="container py-4 col-md-6 col-lg-6">
    <?php if(isset($_SESSION["farmer_reg_success"])){
     echo '<div class="alert alert-success text-center text-bold">'.$_SESSION["farmer_reg_success"].'</div>';
     unset($_SESSION["farmer_reg_success"]);   
    } ?>    
        <form action="../admin/action/farmer_reg_post.php" method="post">
            <!-- Name input -->
            <div class="form-outline mb-4 form-floating">
                <input type="text" name="farmerName" class="form-control" autocomplete="off" required/>
                <label class="form-label" for="farmerName" class="form-label">Name</label>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-xs-12">
                    <!-- Name input -->
                    <div class="form-outline mb-4 form-floating">
                        <input type="text" name="farmerMobile" class="form-control" autocomplete="off" required/>
                        <label class="form-label" for="farmerMob" class="form-label">Mobile No.</label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-xs-12">
                    <!-- Name input -->
                    <div class="form-outline mb-4 form-floating">
                        <input type="text" name="farmerDistrict" class="form-control" autocomplete="off" required/>
                        <label class="form-label" for="farmerDist" class="form-label">District</label>
                    </div>
                </div>
            </div>

            <!-- Message input -->
            <div class="form-outline mb-4">
                <!-- <label class="form-label" for="farmerDesc" class="form-label">Message</label> -->
                <textarea class="form-control" name="farmerMsg" rows="4" autocomplete="off" placeholder="Message..." required></textarea>
            </div>

            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Send</button>
        </form>
    </div>
</div>
</section>
<?php include "include/footerr.php"; ?>