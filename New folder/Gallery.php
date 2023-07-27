<?php include "include/header.php";?>
            
            
<script src="../ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="prettyphoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="prettyphoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

<!-- BREADCRUMBS -->

<div class="bread-crumb-wrap ibc-wrap-2">
    <div class="container padding_remove">
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
            <div class="bread-heading">
                <h3>Gallery</h3>
            </div>
            <div class="bread-crumb pull-right">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="Gallery.html">Gallery</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid managment_contents">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12  padding_remove padding_btm">
               <div class="bhoechie-tab-container departments">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 bhoechie-tab-menu">
                   
                       
                            <div class="list-group">
                                <a href="#Press_Release.html" class="list-group-item">
                            <h4 class="fa fa-user fontawsme"></h4><span>Press Release</span>
                        </a>
                                <a href="#Social_Media_Coverage.html" class="list-group-item">
                            <h4 class="fa fa-user fontawsme"></h4><span>Social Media Coverage</span>
                        </a>
                                <a href="#health_checkup_packages.html" class="list-group-item">
                            <h4 class="fa fa-h-square fontawsme"></h4><span>Health Checkup Packages</span>
                        </a>
                                <a href="#Gallery.html" class="list-group-item active">
                            <h4 class="fa fa-plus-square fontawsme"></h4><span>Gallery</span>
                        </a>
                                <a href="#Health_Tips.html" class="list-group-item">
                            <h4 class="fa fa-plus-square fontawsme"></h4><span>Health Tips</span>
                        </a>
                                <a href="#Events_Free_Check_Ups.html" class="list-group-item">
                            <h4 class="fa fa-plus-square fontawsme"></h4><span>Events and Free Check Ups</span>
                        </a>
                    
                                <a href="#Testimonials.html" class="list-group-item">
                            <h4 class="fa fa-eye fontawsme"></h4><span>Testimonials</span>
                        </a>
<!--                                <a href="News_Letters.php" class="list-group-item">
                            <h4 class="fa fa-h-square fontawsme"></h4><span>News Letters</span>
                        </a>-->
                       
                      
                      
                    </div> 
                       
                   
                </div>
                      </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 bhoechie-tab">
                    <div class="row gallery clearfix">
                        
                        <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12" style="margin-bottom: 15px;">
                            <a href="images/Gallery2/gallery_logo.png" rel="prettyPhoto[gallery1]" title="Click Here">
                                <img src="images/Gallery2/gallery_logo.png" style="width:100%;height:150px;" alt="Astha Hospital Pathology Center" />
                            </a>
                        </div>
                         <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12" style="margin-bottom: 15px;">
                            <a href="images/Gallery2/gallery_logo.png" rel="prettyPhoto[gallery1]" title="Click Here">
                                <img src="images/Gallery2/gallery_logo.png" style="width:100%;height:150px;" alt="Astha Hospital Pathology Center" />
                            </a>
                        </div>
                         <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12" style="margin-bottom: 15px;">
                            <a href="images/Gallery2/gallery_logo.png" rel="prettyPhoto[gallery1]" title="Click Here">
                                <img src="images/Gallery2/gallery_logo.png" style="width:100%;height:150px;" alt="Astha Hospital Pathology Center" />
                            </a>
                        </div>
                         <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12" style="margin-bottom: 15px;">
                            <a href="images/Gallery2/gallery_logo.png" rel="prettyPhoto[gallery1]" title="Click Here">
                                <img src="images/Gallery2/gallery_logo.png" style="width:100%;height:150px;" alt="Astha Hospital Pathology Center" />
                            </a>
                        </div>
                         <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12" style="margin-bottom: 15px;">
                            <a href="images/Gallery2/gallery_logo.png" rel="prettyPhoto[gallery1]" title="Click Here">
                                <img src="images/Gallery2/gallery_logo.png" style="width:100%;height:150px;" alt="Astha Hospital Pathology Center" />
                            </a>
                        </div>
                         <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12" style="margin-bottom: 15px;">
                            <a href="images/Gallery2/gallery_logo.png" rel="prettyPhoto[gallery1]" title="Click Here">
                                <img src="images/Gallery2/gallery_logo.png" style="width:100%;height:150px;" alt="Astha Hospital Pathology Center" />
                            </a>
                        </div>
                         <div class="col-sm-12 col-md-3 col-lg-3 col-xs-12" style="margin-bottom: 15px;">
                            <a href="images/Gallery2/gallery_logo.png" rel="prettyPhoto[gallery1]" title="Click Here">
                                <img src="images/Gallery2/gallery_logo.png" style="width:100%;height:150px;" alt="Astha Hospital Pathology Center" />
                            </a>
                        </div>                     

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $("area[rel^='prettyPhoto']").prettyPhoto();

        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'normal', theme: 'light_square', slideshow: 3000, autoplay_slideshow: true});
        $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'fast', slideshow: 10000, hideflash: true});

        $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
            custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
            changepicturecallback: function () {
                initialize();
            }
        });

        $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
            custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
            changepicturecallback: function () {
                _bsap.exec();
            }
        });
    });
</script> 


<footer class="footer">

    <div class="container">
        <div class="row">
            <!--Foot widget-->
            <div class="col-xs-12 col-sm-6 col-md-3 foot-widget">
                <a href="index.html"><div class="foot-logo col-xs-12 no-pad">
                       
                    </div></a>

                   <address class="foot-address">
                  <div class="col-xs-12 padding_remove"><i class="fa fa-globe address-icons"></i><span>Astha Hospital</span></div>
                    <div class="col-xs-12 padding_remove"><i class="fa fa-file address-icons"></i><span>49/163A, Jawahar Lal Nehru Road, Tagore Town, Allahabad.</span></div>
                    <div class="col-xs-12 padding_remove"><i class="fa fa-phone address-icons"></i><span>+91 - 9838086888</span></div>
                    <div class="col-xs-12 padding_remove"><i class="fa fa-envelope address-icons"></i><span>info@Asthahospital.org</span></div>
                    <div class="col-xs-12 padding_remove"><a href="http://www.Asthahospital.org/"style="color:black">Visitors No:-&nbsp;<img src="http://www.reliablecounter.com/count.php?page=www.Asthahospital.org1&amp;digit=style/odometers/5/&amp;reloads=0" alt="" title="" border="0"   style="width:50px;"></a></div>
                </address>
            </div>

            <!--Foot widget-->
            <div class="col-xs-12 col-sm-6 col-md-3 recent-post-foot foot-widget">
                <div class="foot-widget-title">Quick Links</div>
                <ul>
                    <li><a href="Doctors.html">Doctors</a></li>
                    <li><a href="Departments.html">Departments</a></li>
                    <li><a href="Intensive_Care_Unit.html">Services</a></li> 
                    <li><a href="Patient_Rooms.html">Patient Rooms</a></li> 
                    <li><a href="About_Us.html">Who We Are</a></li> 
                    <li><a href="Why_Us-2.html">Why Us</a></li>
                    <li><a href="Doctor_Schedule.html">OPD Schedule</a></li>
                   
                   
                </ul>
            </div>


            <!--Foot widget-->
            <div class="col-xs-12 col-sm-6 col-md-3 recent-post-foot foot-widget">
                <div class="foot-widget-title" style="font-family: Montserrat;">Disclaimer</div>
                <ul>
                    <li><a href="Terms_Conditions.html">Terms & Conditions</a></li>
                    <li><a href="Privacy_Policy.html">Privacy Policy</a></li>
                     <li><a href="Guidelines_For_Patients.html">Guidelines for Patients</a></li> 
                    <li><a href="Guidelines_For_Visitors.html">Guidelines for Visitors</a></li> 



                   
                </ul>
            </div>

            <!--Foot widget-->
            <div class="col-xs-12 col-sm-6 col-md-3 foot-widget">
               
                <div class="foot-widget-title">social media</div>
                <div class="social-wrap">
 <div class="fb-page" data-href="https://www.facebook.com/Asthahospitalallahabad" data-tabs="timeline" data-height="150" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/Asthahospitalallahabad" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Asthahospitalallahabad">Astha Hospital</a></blockquote></div>
                </div>
            </div>

        </div>
    </div>       

</footer>
<div class="bottom-footer">
    <div class="container">

        <div class="row">
            <!--Foot widget-->
            <div class="col-xs-12 col-sm-12 col-md-12 foot-widget-bottom">
                <p class="col-xs-12 col-sm-6 col-md-9 no-pad">Astha Hospital © 2012 - 2018 | All Rights Reserved.</p>
                <p class="foot-menu col-sm-6 col-xs-12 col-md-3 no-pad" style="text-align: right;">
                    Designed By: <a target="_blank" href="https://www.swankinfytech.in/index.html" target="_blank" style="color:#fff;">Swank InfyTech</a>                      
                </p>
            </div>
        </div>
    </div> 
</div>

</div>

</body>

<!-- Mirrored from Asthahospital.org/Gallery.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Jul 2023 08:12:35 GMT -->
</html>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>-->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>  
<script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="js/jquery.scrollUp.min.js"></script>
<script type="text/javascript" src="js/jquery.sticky.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.flexisel.min.js"></script>
<script type="text/javascript" src="js/jquery.imedica.min.js"></script>
<script type="text/javascript" src="js/custom-imedicajs.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

<script src="js/owl.carousel.min.js"></script>


</body>
</html>