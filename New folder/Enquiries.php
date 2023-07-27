<?php include "include/header.php";?>
            <style type="text/css">
    .label {width:100px;text-align:right;float:left;padding-right:10px;font-weight:bold;}
    #register-form label.error, .output {color:#FB3A3A;font-weight:bold;}
</style>

<script src="../code.jquery.com/jquery-1.9.1.js"></script>
<script src="../ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script>
    $(function () {

        // Setup form validation on the #register-form element
        $("#register-form").validate({
            // Specify the validation rules
            rules: {
                name: "required",
                gender: "required",
                message: "required",
                city: "required",
                enquiry: "required",
                email: {
                    required: true,
                    email: true
                },
                username: "required",
                mobile: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                }
            },
            // Specify the validation error messages
            messages: {
                name: "Please enter your name",
                gender: "Please specify your gender",
                message: "Please write some text",
                email: "Please enter a valid email address",
                username: "Please enter a valid username",
                city: "Please specify your city",
                enquiry: "Please specify your enquiry",
                mobile: {
                    required: "Please provide a 10 Digit mobile No",
                    minlength: "Your password must be at least 10 characters long",
                    maxlength: "Your password must be at least 10 characters long"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

    });

</script>

<!-- BREADCRUMBS -->

<div class="bread-crumb-wrap ibc-wrap-2">
    <div class="container padding_remove">
        <div class="inner-page-title-wrap col-xs-12 col-md-12 col-sm-12">
            <div class="bread-heading">
                <h3>Enquiries</h3>
            </div>
            <div class="bread-crumb pull-right">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="Enquiries.html">Enquiries</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid managment_contents">
    <div class="container">
        <div class="row">
            <div class="bhoechie-tab-container departments">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 bhoechie-tab-menu">
                    <div class="list-group">
                        <a href="Enquiries.html" class="list-group-item active">
                            <h4 class="fa fa-user fontawsme"></h4><span>Enquiries</span>
                        </a>
                        <a href="Address_and_Direction_Map.html" class="list-group-item">
                            <h4 class="fa fa-user fontawsme"></h4><span>Address & Direction Map</span>
                        </a>
                        <a href="Hospital_Directory.html" class="list-group-item">
                            <h4 class="fa fa-h-square fontawsme"></h4><span>Hospital Directory</span>
                        </a>
                        <a href="Work_With_Us.html" class="list-group-item">
                            <h4 class="fa fa-plus-square fontawsme"></h4><span>Work With Us</span>
                        </a>
                       
                    </div> 
                </div>

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 bhoechie-tab">
                    <!-- train section -->
                    <div class="bhoechie-tab-content active">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h4 style="font-size:18px; color:red; border-bottom: 2px solid black; padding-bottom: 5px;">Enquiries !</h4> 
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12  padding_remove padding_btm form-container">
                                    <form method="post" action="https://Asthahospital.org/DB.php?stage=Enquiries"  id="register-form" >
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <div class="row form-group">
                                                <div class="col-sm-4 col-md-4">
                                                   Full Name:
                                                </div>
                                                <div class="col-sm-8 col-md-8">
                                                    <input type="text" name="name" class="form-control" required  placeholder="Please Write Your Full Name">
                                                </div>
                                            </div> 
                                            <div class="row form-group">
                                                <div class="col-sm-4 col-md-4">
                                                    Gender:
                                                </div>
                                                <div class="col-sm-8 col-md-8">
                                                    <select name="gender" class="form-control">
                                                        <option value="">Select Gender</option> 
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-4 col-md-4">
                                                    Country:
                                                </div>
                                                <div class="col-sm-8 col-md-8">
                                                    <select  name="Country"  class="form-control" >
                                                        <option value="">Select Country</option>
                                                        <option value="Afghanistan">Afghanistan</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antarctica">Antarctica</option>
                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermuda">Bermuda</option>
                                                        <option value="Bhutan">Bhutan</option>
                                                        <option value="Bolivia">Bolivia</option>
                                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Bouvet Island">Bouvet Island</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                        <option value="Bulgaria">Bulgaria</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Cape Verde">Cape Verde</option>
                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                        <option value="Central African Republic">Central African Republic</option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Christmas Island">Christmas Island</option>
                                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros">Comoros</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Cook Islands">Cook Islands</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Cote D'ivoire">Cote Divoire</option>
                                                        <option value="Croatia">Croatia</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Czech Republic">Czech Republic</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                        <option value="East Timor">East Timor</option>
                                                        <option value="Ecuador">Ecuador</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Estonia">Estonia</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="France, metropolitan">France, metropolitan</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="French Polynesia">French Polynesia</option>
                                                        <option value="French Southern Territories">French Southern Territories</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambia">Gambia</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="Greenland">Greenland</option>
                                                        <option value="Grenada">Grenada</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Heard and McDonald Islands">Heard and McDonald Islands</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option selected value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Iran">Iran</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Korea (North)">Korea (North)</option>
                                                        <option value="Korea (South)">Korea (South)</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="Lao">Lao</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libya Arab Jamahiriya">Libya Arab Jamahiriya</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lithuania">Lithuania</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Macau">Macau</option>
                                                        <option value="Macedonia">Macedonia</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malta">Malta</option>
                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Micronesia">Micronesia</option>
                                                        <option value="Moldova">Moldova</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolia">Mongolia</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Morocco">Morocco</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="Namibia">Namibia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Netherlands">Netherlands</option>
                                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                        <option value="New Caledonia">New Caledonia</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                        <option value="Norway">Norway</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau">Palau</option>
                                                        <option value="Palestinian Territory">Palestinian Territory</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Pitcairn">Pitcairn</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Romania">Romania</option>
                                                        <option value="Russian Federation">Russian Federation</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Slovakia">Slovakia</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="South Georgia and Islands">South Georgia and Islands</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="St. Helena">St. Helena</option>
                                                        <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Surictr_name">Surictr_name</option>
                                                        <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syria">Syria</option>
                                                        <option value="Taiwan">Taiwan</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania">Tanzania</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tokelau">Tokelau</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Trinctr_idad and Tobago">Trinctr_idad and Tobago</option>
                                                        <option value="Tunisia">Tunisia</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="United States">United States</option>
                                                        <option value="US Minor Outlying Islands">US Minor Outlying Islands</option>
                                                        <option value="Uruguay">Uruguay</option>
                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Vatican City State">Vatican City State</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Viet Nam">Viet Nam</option>
                                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                        <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                                                        <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                                                        <option value="Western Sahara">Western Sahara</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Yugoslavia">Yugoslavia</option>
                                                        <option value="Zaire">Zaire</option>
                                                        <option value="Zambia">Zambia</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col-sm-4 col-md-4">
                                                    Enquiry:
                                                </div>
                                                <div class="col-sm-8 col-md-8"> 
                                                    <select name="enquiry" class="form-control">
                                                        <option value="">Select Enquiry type</option>
                                                        <option value="General Enquiry">General Enquiry</option>
                                                        <option value="Medical Enquiry">Medical Enquiry</option>
                                                        <option value="Request an Appointment">Request an Appointment</option>
                                                        <option value="Patient Feedback">Patient Feedback/Testimonial</option>
                                                        <option value="Complaints">Complaints/Grievance</option>
                                                        <option value="Suggestions">Suggestions</option>
                                                        <option value="Media Enquiry">Media Enquiry</option>
                                                        <option value="Suppliers">Suppliers</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                         
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                            <div class="row form-group">
                                                <div class="col-sm-4 col-md-4">
                                                    Email:
                                                </div>
                                                <div class="col-sm-8 col-md-8">
                                                    <input class="form-control" type="email" name="email" placeholder="Please Write Your Email Id">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-4 col-md-4">
                                                    Mobile:
                                                </div>
                                                <div class="col-sm-8 col-md-8">
                                                    <input class="form-control" type="number" name="mobile" placeholder="Please Write Your Mobile">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-4 col-md-4">
                                                    City
                                                </div>
                                                <div class="col-sm-8 col-md-8">
                                                    <input class="form-control" type="text" name="city" placeholder="Please Write Your City">
                                                </div>
                                            </div> 
                                            
                                            <div class="row form-group">
                                                <div class="col-sm-4 col-md-4">
                                                   Enquiry Message:
                                                </div>
                                                <div class="col-sm-8 col-md-8">
                                                    <textarea placeholder="Please Write Your Message" name="message" style="height: 100px;" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                 <button type="submit" class="btn btn-default">
                                                     <img src="images/submitbutton.jpg" style="float:right; height:40px; width:130px;">
                                                 </button>
                                              

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div> 
                </div>

            </div>
        </div>
    </div>
</div>
</div>


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

<!-- Mirrored from Asthahospital.org/Enquiries.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Jul 2023 08:12:42 GMT -->
</html>


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