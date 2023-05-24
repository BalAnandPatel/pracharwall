 <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://glintel.com/" target="_blank">www.glintel.com</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../common/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../common/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../common/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../common/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../common/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../common/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../common/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../common/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../common/plugins/moment/moment.min.js"></script>
<script src="../common/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../common/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../common/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../common/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../common/dist/js/adminlte.js"></script>
<!-- DataTables  & Plugins -->
<script src="../common/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../common/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../common/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../common/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../common/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../common/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../common/plugins/jszip/jszip.min.js"></script>
<script src="../common/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../common/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../common/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../common/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../common/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 5000);
 
});
</script>
<!-- <script>
  $(document).ready(function() {
  $("#success-alert").hide();
  $("#myWish").click(function showAlert() {
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#success-alert").slideUp(500);
    });
  });
});
</script> -->
<!-- Page specific script -->
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
</body>
</html>
