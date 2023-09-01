<?php
include "include/header.php";
?>
<?php
function giplCurl($url,$postdata){
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
///print_r($response);
$result = json_decode($response);
return $result;    
}
?>

<script type="text/javascript">
    $(window).on('load', function () {
        $('#modal-1').modal('show');
        $('#modal-2').modal('show');
    });
</script>
<style>
    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0);
    }
</style>

<div class="modal fade" id="modal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close bg-white p-4 position-absolute top-0 end-0"
                    data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="alerts d-flex justify-content-center alert-danger" role="alert">
                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                            <g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.31171 10.7615C8.23007 5.58716 9.68925 3 12 3C14.3107 3 15.7699 5.58716 18.6883 10.7615L19.0519 11.4063C21.4771 15.7061 22.6897 17.856 21.5937 19.428C20.4978 21 17.7864 21 12.3637 21H11.6363C6.21356 21 3.50217 21 2.40626 19.428C1.31034 17.856 2.52291 15.7061 4.94805 11.4063L5.31171 10.7615ZM12 7.25C12.4142 7.25 12.75 7.58579 12.75 8V13C12.75 13.4142 12.4142 13.75 12 13.75C11.5858 13.75 11.25 13.4142 11.25 13V8C11.25 7.58579 11.5858 7.25 12 7.25ZM12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z" fill="#ff0000"/> </g>
                        </svg>
                        <div class="p-2">
                            <b>Note: </b>This is a 15 day trial-version of this site.
                            The website is still under maintainence. Please give your feedback of your experience.
                        </div>
                    </div>
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
                <video controls>
                    <source src="assets/videos/How to Register your wall.mp4">
                </video>
            </div>
        </div>
    </div>
</div>

<div id="carouselExampleCaptions" class="carousel slide">
    <!--- <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div> -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="Pracharwall_image/slider-1.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p> -->
            </div>
        </div>
        <div class="carousel-item">
            <img src="Pracharwall_image/slider-2.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h1>Abc</h1> -->
            </div>
        </div>
        <div class="carousel-item">
            <img src="Pracharwall_image/slider-3.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h1>Abc</h1> -->
            </div>
        </div>
        <div class="carousel-item">
            <img src="Pracharwall_image/slider-4.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <!-- <h1>Abc</h1> -->
            </div>
        </div>
        <!-- <div class="carousel-item">
            <img src="assets/img/photography.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div> -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="">Next</span>
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

<div class="container d-flex justify-content-center">
    <ul class="d-flex">
        <li class="card border-0 m-4 text-center lh-1">
            <?php
             $users_count_url = $URL . "admin/read_users_count.php";
             $users_count_data = array("status" => '1', "userType" => '2');
             $users_count_postdata = json_encode($users_count_data);
             $users_count_result = giplCurl($users_count_url,$users_count_postdata);
             //print_r($users_count_result);  
             $users_count="";
             if(isset($users_count_result)){
             $users_count = $users_count_result->records[0]->users_count;
             } 
            ?>
            <strong><?php echo $users_count; ?>+</strong><br>Happy Users
        </li>
      <!--   <li class="card border-0 m-4 text-center lh-1">
            <strong>200+ K</strong><br>Verified Experts
        </li> -->
        <li class="card border-0 m-4 text-center lh-1">
            <?php
                    $count_category_url = $URL . "admin/read_category_count.php";
                    $count_category_data = array();
                    $count_category_postdata = json_encode($count_category_data);
                    $count_category_result = giplCurl($count_category_url,$count_category_postdata);
                    //print_r($count_category_result);
                    $count_category="";
                    if(isset($count_category_result)){
                    $count_category = $count_category_result->records[0]->category_count;
                    }
            ?>
            <strong><?php echo $count_category; ?>+</strong><br>Categories
        </li>
    </ul>
</div>

<br>

<center>
    <div class="container">
        <div class="row justify-content-center">
            <?php
            $counter = '0';
            foreach ($result as $key => $value) {
                foreach ($value as $key1 => $value1) {
            ?>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 img-thumbnail m-1">
                        <a href="profile_list.php?category=<?php echo base64_encode($value1->id); ?>">
                            <img class="img img-fluid" src="<?php echo $CATEGORY_IMGPATH . $value1->id . ".png"; ?>" style="height:60px;">
                            <p>
                                <?php echo $value1->businessCategory; ?>
                            </p>
                        </a>
                    </div>
                    <?php if(++$counter==10){ ?>
                        <div class="col-md-1 col-sm-4 col-xs-12 img-thumbnail m-1 d-flex align-items-center">
                        <a class="fs-4" data-bs-toggle="offcanvas" href="#sidenav" aria-controls="offcanvasExample" style="text-decoration:none;">
                        <img class="img img-fluid" src="Pracharwall_image/hamburger-menu.png" style="height:auto;">
                            <!-- <p>
                                View More
                            </p> -->
                        </a>
                    </div>
                    <?php break; } ?>
            <?php
                }
            }
            ?>
        </div>
    </div>
</center>

<br>

<div class="container">
    <?php
    $counter = 0;
    foreach ($result as $key => $value) {
    foreach ($value as $key1 => $value1) {
    ?>

    <div class="row mt-3">
        <a href="profile_list.php?category=<?php echo base64_encode($value1->id); ?>">
            <h3 class="card-title" id="hideCategory"><?php echo $value1->businessCategory; ?></h3>
        </a>
    </div>
    <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                <?php
                    $url = $URL . "user/read_profile_by_category.php";
                    $userType = '2';
                    $businessCategory = $value1->id;
                    $data = array("userType" => $userType, "businessCategory" => $businessCategory);
                    $postdata = json_encode($data);
                    $result = giplCurl($url,$postdata);
                    //print_r($result);
                    ?>
                    <?php error_reporting(0); if($result->records[0]->status=='1'){ ?>
                    <?php 
                      $counter=0;  
                      foreach($result as $key => $value){
                      foreach($value as $key1 => $value1)
                     {
                    ?>
                    
                    <a href="profile_view.php?id=<?php echo base64_encode($value1->userId);?>">
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay">
                                    <?php
                                    $wall_url = $URL . "user/read_user_wall.php";
                                    $status = '1';
                                    $userId = $value1->userId;
                                    $wall_data = array("status" => $status, "userId" => $userId);
                                    $wall_postdata = json_encode($wall_data);
                                    $wall_result = giplCurl($wall_url,$wall_postdata);
                                    // print_r($wall_result);
                                    $wall_img = $wall_result->records[0]->wallImg;
                                     ?>
                                    <img src="<?php echo $USER_WALL_IMGPATH.$userId."/".$wall_img; ?>" height="100%" alt="wall_img" class="card-img">
                                </span>

                                <div class="card-image">
                                </div>
                            </div>

                            <div class="card-content">
                                <a href="profile_view.php?id=<?php echo base64_encode($value1->userId);?>" class="name"><?php echo $value1->businessName; ?></a>
                                <a href="profile_view.php?id=<?php echo base64_encode($value1->userId);?>" class="description"><?php echo $value1->city; ?></a>
                                <a href="profile_view.php?id=<?php echo base64_encode($value1->userId);?>" class="btn btn-primary w-100 mt-3">Enquiry Now</a>
                            </div>
                        </div>
                    </a>
                    <?php }} ?>
                    <?php }else{
                        echo "comming soon";
                        // echo '<script>document.querySelectorAll("#hideCategory").style.display="none"</script>';
                    } ?>

                    <!-- <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                                <img src="images/profile2.jpg" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">David Dell</h2>
                            <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>

                            <button class="button">View More</button>
                        </div>
                    </div> -->
                    
                    
                </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
    <?php } } ?>
</div>
  
    <!-- <hr> -->

    <!-- <div class="">
        <div class="container">
            <br>
            <center>
                <h1>WE'VE GOT IT BLOGGED</h1>
                <h3 class="text-body-secondary">Your Best Practices Guide for all your local service needs</h3>
            </center>
            <br>
            <div class="row">

                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="card">
                        <img src="assets/img/service/competitive-exam-coaching.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title">Niviya Chanchez</h6>
                            <h5 class="card-title">Get Set to Host a Low-Budget Summer Party</h5>
                            <p class="card-text">It's summer and time for a holiday plan. With the past few years
                                spent confined and distanced socially, this summer is the time for bash and back to
                                socializing. It is also when kids have summer vacations and want to indulge in fun
                                and frolic. From......</p>
                            <a href="#" class="btn w-100 text-danger border-danger">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="card">
                        <img src="assets/img/service/competitive-exam-coaching.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title">Sai Vishal Kannan</h6>
                            <h5 class="card-title">Why is Summer the Best Season!</h5>
                            <p class="card-text">It's summer and time for a holiday plan. With the past few years
                                spent confined and distanced socially, this summer is the time for bash and back to
                                socializing. It is also when kids have summer vacations and want to indulge in fun
                                and frolic. From......</p>
                            <a href="#" class="btn w-100 text-danger border-danger">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="card">
                        <img src="assets/img/service/competitive-exam-coaching.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title">Sai Vishal Kannan</h6>
                            <h5 class="card-title">Breaking Barriers: British Council Scholarships to Empo...</h5>
                            <p class="card-text">It's summer and time for a holiday plan. With the past few years
                                spent confined and distanced socially, this summer is the time for bash and back to
                                socializing. It is also when kids have summer vacations and want to indulge in fun
                                and frolic. From......</p>
                            <a href="#" class="btn w-100 text-danger border-danger">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="card">
                        <img src="assets/img/service/competitive-exam-coaching.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title">Harshavardini M</h6>
                            <h5 class="card-title">12 Global Events to Look Forward to in 2023</h5>
                            <p class="card-text">It's summer and time for a holiday plan. With the past few years
                                spent confined and distanced socially, this summer is the time for bash and back to
                                socializing. It is also when kids have summer vacations and want to indulge in fun
                                and frolic. From......</p>
                            <a href="#" class="btn w-100 text-danger border-danger">READ MORE</a>
                        </div>
                    </div>
                </div>

            </div>
            <br><br>
        </div>
    </div> -->

</div>
<style>
.slide-container{
  max-width: 1120px;
  width: 100%;
  padding: 10px 0;
}
.slide-content{
  margin: 0 40px;
  overflow: hidden;
  border-radius: 25px;
}
.card{
  border-radius: 25px;
  background-color: #FFF;
}
.image-content,
.card-content{
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 10px 14px;
}
.image-content{
  position: relative;
  row-gap: 5px;
  padding: 25px 0;
}
.overlay{
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  /* background-color: #4070F4; */
  border-radius: 25px 25px 0 25px;
}
/* .overlay::before,
.overlay::after{
  content: '';
  position: absolute;
  right: 0;
  bottom: -40px;
  height: 40px;
  width: 40px;
  background-color: #4070F4;
} */
/* .overlay::after{
  border-radius: 0 25px 0 0;
  background-color: #FFF;
} */
.card-image{
  /* position: relative; */
  height: 150px;
  /* width: 150px; */
  /* border-radius: 50%; */
  /* background: #FFF; */
  padding: 3px;
}
.card-image .card-img{
  height: 100%;
  width: 100%;
  object-fit: cover;
  /* border-radius: 50%; */
  /* border: 4px solid #4070F4; */
}
.name{
  font-size: 18px;
  font-weight: 500;
  color: #333;
}
.description{
  font-size: 14px;
  color: #707070;
  text-align: center;
}
.button{
  border: none;
  font-size: 16px;
  color: #FFF;
  padding: 8px 16px;
  background-color: #4070F4;
  border-radius: 6px;
  margin: 14px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.button:hover{
  background: #265DF2;
}

.swiper-navBtn{
  color: #6E93f7;
  transition: color 0.3s ease;
}
.swiper-navBtn:hover{
  color: #4070F4;
}
.swiper-navBtn::before,
.swiper-navBtn::after{
  font-size: 35px;
}
.swiper-button-next{
  right: 0;
}
.swiper-button-prev{
  left: 0;
}
.swiper-pagination-bullet{
  background-color: #6E93f7;
  opacity: 1;
}
.swiper-pagination-bullet-active{
  background-color: #4070F4;
}

@media screen and (max-width: 768px) {
  .slide-content{
    margin: 0 10px;
  }
  .swiper-navBtn{
    display: none;
  }
}
</style>

<?php include "include/footer.php"; ?>