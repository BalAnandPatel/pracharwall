<?php
include "include/header.php";
// error_reporting(0);
?>
<?php
$url = $URL."user/read_profile_by_category.php";
$userType='2'; 
$businessCategory=base64_decode($_GET['category']);
$data = array("userType" =>$userType, "businessCategory"=>$businessCategory);
// print_r($data);
$postdata = json_encode($data);
$result = giplCurl($url,$postdata);
// print_r($result);

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

<section>
    <div class="container py-5">

        <div class="row">
            <div class="col">
                <nav class="small"
                    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Your Search List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <?php if($result->records[0]->status=='1'){ ?>
        <h3><?php echo $result->records[0]->businessCategory; ?></h3>
        <?php 
                       
                     $counter=0;  
                     foreach($result as $key => $value){
                     foreach($value as $key1 => $value1)
                    {

                  ?>
          
          <div class="row d-flex mt-3 justify-content-between">
              <div class="col col-lg-9 col-xl-9 col-md-12 col-sm-12 col-xs-12 py-3 border rounded mt-1">
                <a href="profile_view.php?id=<?php echo base64_encode($value1->userId);?>" style="color:inherit; text-decoration:none;">        

                <div class="row">
                    <div class="col col-lg-3 col-xl-3 col-md-6 col-sm-12 col-xs-12 p-2 m-2">
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
                        <img src="<?php echo $USER_WALL_IMGPATH.$userId."/".$wall_img; ?>" style="height:100%;" class="img-fluid img-thumbnail" alt="user wall img">
                    </div>

                    <div class="col col-lg-8 col-xl-8 col-md-12 col-sm-12 col-xs-12">
                        <h4>
                            <?php echo $value1->businessName; ?>
                        </h4>
                        <!-- <div>
                            <span class="bg-success text-white px-2 rounded">4.0</span>
                            <span class="fa fa-star rated"></span>
                            <span class="fa fa-star rated"></span>
                            <span class="fa fa-star rated"></span>
                            <span class="fa fa-star rated"></span>
                            <span class="fa fa-star"></span>&nbsp;
                        </div> -->
                        <div class="col">
                         <?php echo $value1->city.", ".$value1->state; ?>
                        </div>
                        <div class="col">
                            Open Until 8:00 pm
                            -
                        <?php  
                        if($value1->establishmentYear!==""){
                        $C_YEAR=date("Y"); 
                        $E_YEAR = $value1->establishmentYear;
                        echo $C_YEAR - $E_YEAR;
                        }else{ 
                        echo "0";
                        }?> Yrs in Business
                        </div>
                        <div class="col">
                            <?php echo $value1->aboutUser; ?>
                        </div>
                        <button class="btn btn-success mt-2">
                            <i class="fa fa-phone"></i> <?php echo $value1->userMobile; ?>
                        </button>
                        <button class="btn btn-outline-primary mt-2">
                            Send Enquiry
                        </button>

                        <!-- <div class="col col-lg-3 col-xl-3 col-md-6 col-sm-12 col-xs-12 p-2 m-2">
                        <h6 class="text-secondary">Timings</h6>
                        <h6></h6>
                    </div> -->
                    </div>

                </div>

            </a>
            </div>
        </div>
      <?php } } ?>
      <?php }else{
        echo '<div class="container">
 <div class="d-flex align-items-center justify-content-center vh-50">
            <div class="text-center row">
                <div class=" col-md-6">
                    <img src="Pracharwall_image/404.png" alt="404Img"
                        class="img-fluid">
                </div>
                <div class=" col-md-6 mt-5">
                    <p class="fs-3"> <span class="text-danger">Sorry! </span>No Business Listed</p>
                    <p class="lead">
                        The page you’re looking for doesn’t exist.
                    </p>
                    <a href="index.php" class="btn btn-primary"><span class="fa fa-arrow-circle-left"></span> Go Home</a>
                </div>

            </div>
        </div>
</div>';
      } ?>
</section>
<?php include "include/footer.php"; ?>