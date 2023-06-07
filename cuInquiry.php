<?php include "include/header.php"; ?>
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
                        <th>Service (needed)</th>
                        <th>Status</th>
                        <th>Delete</th>
                    </tr>

                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>Name</td>
                        <td>name@gmail.com</td>
                        <td></td>
                        <td>Pending</td>
                        <td>Delete</td>
                    </tr>

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