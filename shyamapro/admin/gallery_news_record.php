<?php
include "include/header.php";
$url = $URL."gallery/read_gallery_news.php";
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

        <?php if(isset($_SESSION['activity_delete_post'])){ ?>

                 <div class="alert alert-danger" id="success-alert" role="alert">
                  <?php echo $_SESSION['activity_delete_post']; 
                  unset($_SESSION['activity_delete_post']); ?>
                 </div>

                <?php } ?>

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>News details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">News Gallery Records</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php if(isset($_SESSION["news_delete_success"])){ ?>
      <div class="alert alert-success"><?php echo $_SESSION["news_delete_success"]; unset($_SESSION["news_delete_success"]); ?></div>
      <?php } ?>
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">News details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="table-warning">
                    <th>S.N</th>
                    <th>News Title</th>
                    <th>Description</th>
                    <th>News</th>
                    <th>Created On</th>
                    <th>Actions</th>
                
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                       
                     $counter=0;  
                     foreach($result as $key => $value){
                     foreach($value as $key1 => $value1)
                    {
                    $news_image = $GALLERY_NEWS_PATH."news_".$value1->id.".png";
                  ?>

                  <tr>
                    <td class="col-md-1"><?php echo ++$counter; ?> </td>
                    <td><?php echo $value1->newsTitle; ?> </td>
                    <td><?php echo $value1->newsDescription; ?> </td>
                    <td class="col-md-1"><img class="img-fluid img-thumnel" src="<?php echo $news_image; ?>" height="100px" width="200px"></td>
                    <td class="col-md-2"><?php echo date("d-m-Y",strtotime($value1->created_on)); ?></td>
                    <td class="col-md-2">
                      <form action="action/news_delete_post.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $value1->id; ?>">
                      <button type="submit" name="delete" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
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