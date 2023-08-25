<?php
include "include/header.php";
if(isset($_SESSION["USER_EMAIL"])){
$userEmail= $_SESSION["USER_EMAIL"];   
$U_Id= $_SESSION["USER_ID"];   
}else{
$userEmail="";
$U_Id="";    
}
?>
<?php
$url = $URL."user/read_user_profile.php";
$wall_url = $URL . "user/read_user_wall.php";
$userType='3'; 
$id=base64_decode($_GET['id']);
$userId=$id;
$data = array("userType" =>$userType, "id"=>$id);
// print_r($data);
$postdata = json_encode($data);
$result = giplCurl($url,$postdata);
//  print_r($result);

// get users wall image
$status = '1';
$wall_data = array("status" => $status, "userId" => $userId);
$wall_postdata = json_encode($wall_data);
$wall_result = giplCurl($wall_url,$wall_postdata);
// print_r($wall_result);
$wall_img="";
if(isset($wall_result->records[0]->wallImg)){
$wall_img = $wall_result->records[0]->wallImg; 
}


function giplCurl($url,$postdata){
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
    $response = curl_exec($client);
    //print_r($response);
    $result = json_decode($response);
    return $result;    
    }
?>

<style>
    .rated {
        color: orange;
    }

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }
</style>

  <?php 
                       
                     $counter=0;  
                     foreach($result as $key => $value){
                     foreach($value as $key1 => $value1)
                    {

                  ?>
<div class="modal fade" id="ExploreStore" tabindex="-1" aria-labelledby="ExploreStore" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body mx-3 row">
                <div class="position-relative">
                    <button type="button" class="btn-close position-absolute top-0 start-100 translate-middle" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 py-3">
                    <h2>Are you looking for?</h2>
                    <h5 class="text-secondary">"<?php echo $value1->businessCategory; ?>"</h5>
                    <form name="InquiryForm" id="InquiryForm" method="post" onsubmit="return inquiryFormdataPost(event)">
                        <input type="hidden" name="userId" value="<?php echo $value1->id; ?>"> 
                        <div class="form-group">
                            <label for="contact-username">Full Name:</label>
                            <?php if(!isset($_SESSION["USER_EMAIL"])){ ?>
                            <input type="text" class="form-control" name="cuName" placeholder="Enter Your Name"  autocomplete="off" required>
                           <?php }else{ ?>
                            <input type="text" class="form-control" name="cuName" placeholder="Enter Your Name" value="<?php echo $_SESSION["NAME"]; ?>" autocomplete="off" disabled>
                           <?php } ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="contact-email">Email address:</label>
                            <?php if(!isset($_SESSION["USER_EMAIL"])){ ?>
                            <input type="email" class="form-control" name="cuEmail" placeholder="Enter Your Email Id" value="" autocomplete="off" required>
                           <?php }else{ ?>
                            <input type="email" class="form-control" name="cuEmail" placeholder="Enter Your Email Id" value="<?php echo $_SESSION["USER_EMAIL"]; ?>" autocomplete="off" disabled>
                           <?php } ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="serv">Service(Write about your need):</label>
                            <textarea class="form-control" placeholder="Enter Your Service" autocomplete="off" name="requiredService" required></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <input type="submit" class="form-control btn btn-primary" value="SEND ENQUIRY"
                                id="submit-contact">
                        </div>
                    </form>
                    <div class="mt-2">
                        <li>Your requirement is sent to the selected relevant businesses</li>
                        <li>Businesses compete with each other to get you the Best Deal</li>
                        <li>You choose whichever suits you best</li>
                        <li>Contact info sent to you by SMS/Email</li>
                    </div>
                </div>

                <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <img src="assets/img/service/distance-education.jpg" width="100%">
                </div>

            </div>
        </div>
    </div>
</div>
<?php } } ?>

<script>
function inquiryFormdataPost(event) {
  event.preventDefault();
  var userId = document.forms["InquiryForm"]["userId"].value;
  var cuName = document.forms["InquiryForm"]["cuName"].value;
  var cuEmail = document.forms["InquiryForm"]["cuEmail"].value;
  var requiredService = document.forms["InquiryForm"]["requiredService"].value;

if("<?php echo $userEmail; ?>"=="" || "<?php echo $userEmail; ?>"!==cuEmail){
// alert("session expired");
$('#ExploreStore').modal('hide');    
$('#signin').modal('show');   

}else{

    $.ajax({
    url:'admin/action/customer_inquiry_post.php',
    type:'POST',
    data:{
       "cuId":"<?php echo $U_Id; ?>", 
       "userId":userId,
       "cuName":cuName,
       "cuEmail":cuEmail,
       "requiredService":requiredService
    },
    success:function(response){
        // alert(response);
     if(response=="1"){
        swal("Thank you!", "Your message has been successfully sent. We will contact you very soon!", "success");
        $("#InquiryForm")[0].reset();
        $("#ExploreStore").modal('hide');
     }else if(response=="0"){
        swal("Sorry!", "Something Went Wrong! Please check the API ", "error");
     } 
    }
  });    
    
}
exit();  
}
</script>


<section>
    <div class="container py-5">

        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <?php 
                       
                     $counter=0;  
                     foreach($result as $key => $value){
                     foreach($value as $key1 => $value1)
                    {

                  ?>

        <div class="row border p-3 rounded">

            <div class="col-lg-2 col-xl-2 col-md-6 col-sm-12 col-xs-12 py-3 d-flex justify-content-center">
                 <?php
                    $file=$USER_PROFILE_IMGPATH.$userId."/user_img_".$userId.".png";
                    if(getimagesize($file))
                    { ?>
                    <img class="img-account-profile img-fluid img-thumbnail rounded-circle mb-2" src="<?php echo $USER_PROFILE_IMGPATH.$userId."/user_img_".$userId.".png"; ?>" alt="Profile Image">
                    <?php } else { ?>
                    <img class="img-account-profile img-fluid img-thumbnail rounded-circle mb-2" src="assets/img/user_icon.png" alt="user-profile">
                    <?php } ?>
            </div>

            <div class="col-lg-7 col-xl-7 col-md-6 col-sm-12 col-xs-12">

                <h2><?php echo $value1->businessName; ?></h2>
                <!-- <div>
                    <span class="bg-success text-white px-2 rounded">4.0</span>
                    <span class="fa fa-star rated"></span>
                    <span class="fa fa-star rated"></span>
                    <span class="fa fa-star rated"></span>
                    <span class="fa fa-star rated"></span>
                    <span class="fa fa-star"></span>&nbsp;
                    <span class="text-secondary">223 Ratings</span>
                    <span><i class="bi bi-check-circle-fill"></i> Checked</span>
                </div> -->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <?php echo $value1->city.", ".$value1->state; ?> 
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <i class="bi bi-dot"></i>Open Until 8:00 pm
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <i class="bi bi-dot"></i>
                        <?php  
                        if($value1->establishmentYear!==""){
                        $C_YEAR=date("Y"); 
                        $E_YEAR = $value1->establishmentYear;
                        echo $C_YEAR - $E_YEAR;
                        }else{ 
                        echo "0";
                        }?> Yrs in Business
                    </div>
                </div>
                <div>
                    300 people recently enquired
                </div>
                <a href="tel:<?php echo $value1->userMobile; ?>" class="border bg-success text-white btn mt-2">
                    <i class="fa fa-phone"></i>
                    <?php echo $value1->userMobile; ?>
                </a>
            </div>

            <div class="col-lg-3 col-xl-3 col-md-12 col-sm-12 col-xs-12 d-flex align-items-center mt-1">
                <a class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#ExploreStore" href="">
                    <b>Enquiry Now</b>
                </a>
            </div>

        </div>


        <div class="row d-flex mt-3 justify-content-between">
            <div class="col-lg-9 col-xl-9 col-md-12 col-sm-12 col-xs-12 py-3 border rounded mt-1">
                <h5>Quick Information</h5>

                <div class="row">
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-12 col-xs-12 p-2 m-2">
                        <h6 class="text-secondary">Mode of Payment</h6>
                        <h6><?php echo $value1->paymentMode; ?></h6>
                    </div>

                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-12 col-xs-12 p-2 m-2">
                        <h6 class="text-secondary">Year of Establishment</h6>
                        <h6><?php echo $value1->establishmentYear; ?></h6>
                    </div>

                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-12 col-xs-12 p-2 m-2">
                        <h6 class="text-secondary">Timings</h6>
                        <h6><?php echo $value1->businessDay; ?><br><?php echo $value1->businessTiming; ?></h6>
                    </div>
                </div>
                <div class="row">
                    <h5>Services</h5>
                    <p><?php echo $value1->userServices; ?></p>
                </div>
                <div class="row mt-4">
                    <h5>About Us</h5>
                    <div class="col">
                     <?php echo $value1->aboutUser; ?>
                    </div>
                </div>

            </div>

            <div class="col-lg-3 col-xl-3 col-md-12 col-sm-12 col-xs-12 border rounded mt-1 py-3">
                <h5>Address</h5>
                <h6><?php echo $value1->userAddress; ?></h6>
                <a href="#" class="m-1 link-underline-light"><i class="bi bi-compass"></i> Get Directions</a>
                <!-- <a href="#" class="m-1 link-underline-light"><i class="bi bi-clipboard-plus"></i> Copy</a> -->
                <hr>
                <a href="#" class="m-1 link-underline-light" data-bs-toggle="modal" data-bs-target="#ExploreStore"><i class="bi bi-envelope"></i> Send Enquiry by Email</a>
                <hr>
                <a href="https://wa.me/<?php echo $value1->userMobile; ?>?text=Hi%20I%20am%20interested%20in%20your%20service." target="_blank" class="m-1 link-underline-light"><i class="bi bi-whatsapp"></i> Get info via Whatsapp</a>
                <hr>
                <a href="#" data-bs-toggle="modal" data-bs-target="#shareProfile" class="m-1 link-underline-light"><i class="bi bi-share"></i> Share this</a>
                <!-- <hr>
                <a href="#rate" class="m-1 link-underline-light"><i class="bi bi-compass"></i> Tap to rate</a> -->
                <hr>
                <a href="<?php echo $value1->userWebsite; ?>" class="m-1 link-underline-light" target="_blank"><i class="bi bi-globe"></i> Visit our Website</a>
            </div>

        </div>

        <div class="row border rounded mt-4 py-3">
            <div class="col">
                <h5>Photos</h5>
                <div class="row">

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 mt-1">
                    <a href="<?php echo $USER_WALL_IMGPATH.$userId."/".$wall_img; ?>" data-toggle="lightbox">
                        <img src="<?php echo $USER_WALL_IMGPATH.$userId."/".$wall_img; ?>" class="img-fluid border rounded">
                    </a>
                    </div>
                    
                </div>
              
            </div>
        </div>
<?php } } ?>
        <!-- <div class="row border rounded mt-4 py-3">
            <div class="col">
                <h5>Question & Answers</h5>
                <h6 class="text-secondary">Would you like to ask a questions?</h6>
                <div class="row btn mt-2">
                    <button class="btn btn-primary">Post Your Question</button>
                </div>
            </div>
        </div>

        <div class="row border rounded mt-4 py-3">
            <div class="col">
                <h5>Reviews & Ratings</h5>
                <div class="row">

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 d-flex border-secondary border-end">
                        <div class="p-4">
                            <h1 class="bg-success d-inline text-white p-2 rounded-4">4.0</h1>
                        </div>
                        <div class="p-2">
                            <h2>223 Ratings</h2>
                            <h6 class="text-secondary">Pracharwall rating index based on 223 ratings across the web</h6>
                        </div>
                    </div>

                    <div id="rate" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 px-4">
                        <h2>Start Your Review</h2>
                        <div class="rate">
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="Excellent">1 star</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="Nice">2 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="Enough">3 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="Not Useful">4 stars</label>
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="Poor">5 stars</label>
                        </div>
                    </div>

                </div>

                <div class="row mt-3">
                    <h5>User Reviews</h5>
                    <div class="col p-2">
                        <ul class="d-flex justify-content-between" id="myTab" role="tablist">
                            <div class="nav nav-tabs">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home-tab-pane" type="button" role="tab"
                                        aria-controls="home-tab-pane" aria-selected="true">Relevant</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-pane" type="button" role="tab"
                                        aria-controls="profile-tab-pane" aria-selected="false">Friends Ratings</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#contact-tab-pane" type="button" role="tab"
                                        aria-controls="contact-tab-pane" aria-selected="false">Latest</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="disabled-tab" data-bs-toggle="tab"
                                        data-bs-target="#disabled-tab-pane" type="button" role="tab"
                                        aria-controls="disabled-tab-pane" aria-selected="false">High to Low</button>
                                </li>
                            </div>
                            <li class="nav-item" style="list-style-type: none;">
                                <div class="input-group">
                                    <span class="input-group-text" id="SearchReview">
                                        <i class="bi bi-search"></i>
                                    </span>
                                    <input type="text" size="40" class="form-control" placeholder="Search Reviews"
                                        aria-describedby="SearchReview">
                                </div>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">

                                <div class="d-flex flex-start p-5">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (23).webp" alt="avatar"
                                        width="60" height="60" />
                                    <div>
                                        <h6 class="fw-bold mb-1">Maggie Marsh</h6>
                                        <div class="d-flex align-items-center mb-3">
                                            <p class="mb-0">March 07, 2021</p>
                                        </div>
                                        <p class="mb-0">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text ever
                                            since the 1500s, when an unknown printer took a galley of type and
                                            scrambled it.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-0" />

                        </div>

                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                            tabindex="0">
                            ...
                        </div>
                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                            tabindex="0">
                            ...
                        </div>
                        <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab"
                            tabindex="0">
                            ...
                        </div>
                    </div>

                </div>
            </div>
        </div> -->
    </div>

    </div>
</section>

<?php include "include/footer.php"; ?>