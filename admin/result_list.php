<?php
include "include/header.php";

$url = $URL."ticket/read_release_result.php";
$status=3;
$userType=$_SESSION["USER_TYPE"];
$userId=$_SESSION["USER_ID"];
$data = array("status"=>$status, "userId"=>$userId, "userType"=>$userType);
//print_r($data);
$postdata = json_encode($data);
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
$result = json_decode($response);
//print_r($result);
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Notification details</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Result</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lottery Result</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="table-warning">
                    <th>S.N</th>
                    <th>Ticket Amount</th>
                    <th>Lottery Amount</th>
                    <th>Lottery Number</th>
                    <th>Payment Status</th>
                    <th>Purchased By</th>
                    <th>Purchase Date</th>
                    <?php
                     if($userType==1){ 
                    ?>
                    <th>Payment</th>
                    <?php } ?>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                       
                     $counter=0;  
                     foreach($result as $key => $value){
                     foreach($value as $key1 => $value1)
                    {

                  ?>

                  <tr>
                    <td class="col-md-1"><?php echo ++$counter; ?> </td>
                    <td><?php echo $value1->ticketAmount; ?></td>
                    <td><?php echo $value1->lotteryAmount; ?></td>
                    <td><?php echo $value1->lotteryNum; ?></td>
                    <td class="col-md-2">
                      <button type="button" name="submit" class="btn btn-light btn-sm rounded-0">
                      <?php if($value1->paymentStatus=='1'){
                        echo "Paid";
                      }else{
                        echo "Not Paid";
                      }
                      ?>
                    </button>
                    </td>
                    <td><?php echo $value1->userName; ?></td>
                    <td><?php echo date('d-m-Y',strtotime($value1->createdOn)); ?></td>
                    <?php
                     if($userType==1){ 
                    ?>
                    <td class="col-md-2">
                      <form action="user_payment_byAdmin.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $value1->id; ?>">
                      <?php if($value1->paymentStatus==1){ ?>
                      <button class="btn btn-success" type="button" disabled>Amount Paid</button>
                      <?php }else{ ?>
                      <button class="btn btn-success" type="submit" name="submit">Pay Now</button>
                      <?php } ?>
                      </form>
                    </td>
                   <?php } ?>
                  </tr>
             
                  <?php } } ?>

                  </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

include "include/footer.php"

?>