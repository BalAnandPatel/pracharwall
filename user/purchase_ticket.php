<?php
include "include/header.php";

$url = $URL."ticket/read_ticket.php";
$data = array();
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

        <?php if(isset($_SESSION['ticket_delete_success'])){ ?>

                 <div class="alert alert-success" id="success-alert" role="alert">
                  <?php echo $_SESSION['ticket_delete_success']; 
                  unset($_SESSION['ticket_delete_success']); ?>
                 </div>

                <?php } ?>

        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Notification details</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase Ticket</li>
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
                <h3 class="card-title">Ticket details</h3>
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
                    <th>Purchase</th>
                
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
                    <td class="col-md-1">
                      <form action="action/ticket_purchase_post.php" method="post">
                      <input type="hidden" name="ticketId" value="<?php echo $value1->id; ?>">
                      <input type="hidden" name="ticketAmount" value="<?php echo $value1->ticketAmount; ?>">
                      <input type="hidden" name="lotteryAmount" value="<?php echo $value1->lotteryAmount; ?>">
                      <input type="hidden" name="lotteryNum" value="<?php echo $value1->lotteryNum; ?>">
                      <input type="hidden" name="status" value="2">
                      <?php if($value1->status=='1'){?>
                      <button type="submit" name="submit" class="btn btn-success">Purchase</button>
                      <?php }else if($value1->status=='2'){?>
                      <button type="button" class="btn btn-success" disabled>Purchased</button>
                      <?php } ?>
                     </form>
                    </td>
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