<?php
include "include/header.php";
$url = $URL."admin/read_business_category_byId.php";
if(isset($_POST['categoryId'])){
$categoryId = $_POST['categoryId'];
$data = array("id"=>$categoryId);
//print_r($data);
$postdata = json_encode($data);
$result = giplCurl($url,$postdata);
//print_r($result);
}

function giplCurl($url,$postdata){
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($client, CURLOPT_POST, 5);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
return $result = json_decode($response);
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Add Notification</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Update Category Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="container-fluid">

          <?php
          if(isset($_SESSION['categoryUploadSuccess'])){
          echo '<div class="alert alert-success rounded-0" role="alert">'.$_SESSION['categoryUploadSuccess'].'</div>';
          unset($_SESSION['categoryUploadSuccess']);
          }else if(isset($_SESSION['categoryUploadErrors'])){
            echo '<div class="alert alert-danger rounded-0" role="alert">'.$_SESSION['categoryUploadErrors'].'</div>';
            unset($_SESSION['categoryUploadErrors']);
          } 

          ?>

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Update Category Detail</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
             <?php 
                     $counter='0';
                     foreach($result as $key => $value){
                     foreach($value as $key1 => $value1)
                     {
                  ?>  
          <form action="action/business_category_post.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Business Category*</label>
                    <input style="text-transform:capitalize;" type="text" class="form-control" name="businessCategory"  value="<?php echo $value1->businessCategory; ?>">
                  </div>
              </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Category Image*</label>
                    <span class="ml-2"><img class="img-fluid" height="100" width="100" src="<?php echo $CATEGORY_IMGPATH.$value1->id.".png"; ?>" /></span>
                  </div>
              </div>
            
            </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Upload Business Image*</label>
                    <input type="file" class="form-control" name="busineshImg" required>
                  </div>
              </div>
            
            </div>
          
            <!-- /.row -->
                <div class="btn-group w-auto">
                  <button type="submit" name="submit" class="btn btn-success col start">
                    <i class="fas fa-edit mr-1"></i><span>Change details</span>
                  </button>
                </div>
           <?php } } ?>
          </div>
        </form>
          <!-- /.card-body -->
          <div class="card-footer">
           PRACHARWALL
          </div>
        </div>
        <!-- /.card -->

    
        <div class="row">
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include "include/footer.php"; ?>