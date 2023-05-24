<?php
include "include/header.php";
// try{
$url = $URL."payment/read_payment_details.php";
// $userType=$_SESSION["USER_TYPE"];
$id=$_POST["id"];
$data = array("id"=>$id);
//print_r($data);
$postdata = json_encode($data);
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
// curl_setopt(
//   $client,
//   CURLOPT_HTTPHEADER,
//   array(
//     'Content-Type: application/json',
//     'Authorization: Bearer ' . $token
//   )
// );
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
$result = json_decode($response);
//print_r($result);

// $userid=$result->records[0]->id;
// $user_img=$USER_PROFILE_IMGPATH.$userid."/user_img_".$userid.".png";
// if(isset($result->message))
// if ($result->message == "Access denied." && $result->error == "Expired token") {
//   unset($_SESSION['login_session']);
// // }
?>
<style>
.form-group .form-control{
background:light;
border-radius:0;
color:#000;
font-weight:500;
cursor:pointer;    
}
</style>   
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Update Profile Details</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Payment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Account Details</h3>
              </div>
              <form action="action/user_payment_byAdmin_post.php" method="post" enctype="multipart/form-data">
              <?php 
								   foreach($result as $key => $value){
                   foreach($value as $key1 => $value1)
                    {
              ?> 
                <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                         <label>Ticket Amount</label>
                         <input type="text"  class="form-control" name="ticketAmount" 
                         value="<?php echo $value1->ticketAmount; ?>" readonly>
                      </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-group">
                          <label>Lottery Number</label>
                          <input type="text"  class="form-control" name="lotteryNum" 
                          value="<?php echo $value1->lotteryNum; ?>" readonly>
                         </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label>Lottery Amount</label>
                          <input type="text"  class="form-control" name="lotteryAmount" 
                          value="<?php echo $value1->lotteryAmount; ?>" readonly>
                         </div>
                      </div>
                 </div>
                 <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                         <label>User Name</label>
                         <input type="text"  class="form-control" name="userName" 
                         value="<?php echo $value1->userName; ?>" readonly>
                      </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-group">
                          <label>Bank Name</label>
                          <input type="text"  class="form-control" name="bankName" 
                          value="<?php echo $value1->bankName; ?>" readonly>
                         </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label>Branch Name</label>
                          <input type="text"  class="form-control" name="branchName" 
                          value="<?php echo $value1->branchName; ?>" readonly>
                         </div>
                      </div>
                 </div>
                 <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                         <label>Account No.</label>
                         <input type="text"  class="form-control" name="accountNum" 
                         value="<?php echo $value1->accountNum; ?>" readonly>
                      </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-group">
                          <label>IFSC Code</label>
                          <input type="text"  class="form-control" name="ifscCode" 
                          value="<?php echo $value1->ifscCode; ?>" readonly>
                         </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label>Account Holder</label>
                          <input type="text"  class="form-control" name="accountHolder" 
                          value="<?php echo $value1->accountHolder; ?>" readonly>
                         </div>
                      </div>
                 </div>
                 <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                         <label>Mobile NO.</label>
                         <input type="text"  class="form-control" name="userMobile" 
                         value="<?php echo $value1->userMobile; ?>" readonly>
                      </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-group">
                          <label>Phone Pay Number</label>
                          <input type="text"  class="form-control" name="phonePayNum" 
                          value="<?php echo $value1->phonePayNum; ?>" readonly>
                         </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label>Google Pay Number</label>
                          <input type="text"  class="form-control" name="googlePayNum" value="<?php echo $value1->googlePayNum; ?>" readonly>
                         </div>
                      </div>
                 </div>
                 <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Payment Mode*</label>
                         <select name="paymentMode" class="form-control jb_1" readonly required>
                           <option value="Online" selected>Online</option>
                         </select>
                      </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-group">
                          <label>Slip No.*</label>
                          <input type="text"  class="form-control" name="slipNum" 
                           placeholder="Slip No." autocomplete="off" required>
                         </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label>Upload Payment Slip*</label>
                          <input type="file"  class="form-control" name="uploaded_slip" required>
                         </div>
                      </div>
                 </div>
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                         <label>Remark</label>
                         <textarea class="form-control" name="remark" 
                          placeholder="Account Holder" autocomplete="off">
                        </textarea> 
                      </div>
                     </div>
                 </div>
                <div class="card-footer text-center">
                  <input type="hidden" name="userId" value="<?php echo $value1->userId; ?>">
                  <input type="hidden" name="ticketId" value="<?php echo $value1->ticketId; ?>">
                  <button type="submit" name="submit" class="btn btn-success">Payment Now</button>
                </div>
                <?php 
                                      }
                                     } 
                                    ?>
              </form>
            </div>
<!-----------*******************------->			
            </div>
          </div>
       </div>
 </section>
    <!-- /.content -->
  </div>
                                    </div>
  <!-- /.content-wrapper -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<?php
include "include/footer.php";
// }
// catch (Exception $e){

//    if($e->getMessage() == "Expired token"){

     
//  // set response code
//        http_response_code(401);
   
//        // show error message
//        echo json_encode(array(
//            "message" => "Access denied.",
//            "error" => $e->getMessage()
//        ));

          
//    } else {

//        die();
//        }
//    }

?>
