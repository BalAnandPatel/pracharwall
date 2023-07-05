<?php
include "include/header.php";
  $url = $URL."user/read_customers_inquiry.php";
  $userId=$_SESSION["USER_ID"];
  $data = array("userId"=>$userId);
  //print_r($data);
  $postdata = json_encode($data);
  $client = curl_init($url);
  curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
  //curl_setopt($client, CURLOPT_POST, 5);
  curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
  $response = curl_exec($client);
  //print_r($response);
  $result = json_decode($response);
  //print_r($result);
  ?>
<!-- DataTables -->
<link rel="stylesheet" href="common/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="common/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="common/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<div class="container">

    <div class="card my-4">
        <div class="card-header">
            <h3 class="card-title">Customers Inquiry List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr class="table-warning">
                        <th>Sr No.</th>
                        <th>Customer Name</th>
                        <th>Email Id</th>
                        <th>Monile No.</th>
                        <th>Address</th>
                        <th>Service (needed)</th>
                        <!-- <th>Delete</th> -->
                    </tr>

                </thead>
                <tbody>
                   <?php
                  $counter = '0';
                  foreach ($result as $key => $value) {
                    foreach ($value as $key1 => $value1) {
                      ?>
                    <tr>
                        <td class="col-md-1"><?php echo ++$counter; ?></td>
                        <td><?php echo $value1->cuName; ?></td>
                        <td><?php echo $value1->cuEmail; ?></td>
                        <td><?php echo $value1->cuMobile; ?></td>
                        <td><?php echo $value1->cuAddress; ?></td>
                        <td><?php echo $value1->requiredService; ?></td>
                        <!-- <td class="col-md-1"><button class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button></td> -->
                    </tr>
                  <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- DataTables  & Plugins -->
<script src="common/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="common/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="common/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="common/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="common/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="common/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="common/plugins/jszip/jszip.min.js"></script>
<script src="common/plugins/pdfmake/pdfmake.min.js"></script>
<script src="common/plugins/pdfmake/vfs_fonts.js"></script>
<script src="common/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="common/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="common/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<?php include "include/footer.php"; ?>