<?php
include "include/header.php";
if(!isset($_SESSION["USER_ROLE"])=="Admin"){
// header('location:http://localhost/pracharwall/index.php');
echo '<script>window.location="'.$BASE_URL.'"</script>';  
}
?>
<?php
function giplCurl($url, $postdata)
{
  $client = curl_init($url);
  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
  $response = curl_exec($client);
  //print_r($response);
  return $result = json_decode($response);
}


 $url_read_total_users = $URL . "admin/read_users_count.php";
 $url_user_update_req = $URL . "admin/users_update_request_count.php";
// $url_read_total_vacancy = $URL . "dashboard/total_vacancy_count.php";


$data_pending = array("status" => '0', "userType" => '2');
$postdata_pending = json_encode($data_pending);

$data_customer = array("status" => '0', "userType" => '3');
$postdata_customer = json_encode($data_customer);

$data_approved = array("status" => '1', "userType" => '2');
$postdata_approved = json_encode($data_approved);

$data_user_update_req = array("status"=>'0', "userType"=>'2');
$postdata_user_update_req = json_encode($data_user_update_req);

$result_pendin_reg = giplCurl($url_read_total_users, $postdata_pending);
//print_r($result_pendin_reg);
$pending_users = $result_pendin_reg->records[0]->users_count;

$result_customer = giplCurl($url_read_total_users, $postdata_customer);
//print_r($result_customer);
$totle_customers = $result_customer->records[0]->users_count;

$result_approved_users = giplCurl($url_read_total_users, $postdata_approved);
//print_r($result_approved_users);
$approved_users = $result_approved_users->records[0]->users_count;

$result_users_update_req = giplCurl($url_user_update_req, $postdata_user_update_req);
//print_r($result_users_update_req);
$users_update_req_count = $result_users_update_req->records[0]->users_update_req;

// $result_vacancy_count = giplCurl($url_read_total_vacancy, $postdata_approved);
// //print_r($result_vacancy_count);
// $total_vacncy = $result_vacancy_count->records[0]->exam_count;
?>
<!-- <script>windo.location.href="http://localhost/pracharwall/"</script> -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3> <?php  echo $pending_users; ?></h3>

              <p>Pending Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="user_registration_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $approved_users; ?></h3>

              <p>Approved Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="approved_users_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $users_update_req_count; ?></h3>

              <p>Users Update Request</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="rejected_registration_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">

              <h3><?php echo $totle_customers;  ?></h3>
              <p>Number of Customers</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="customer_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
      </div>
    
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "include/footer.php";
?>