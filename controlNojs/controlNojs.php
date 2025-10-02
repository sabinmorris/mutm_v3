<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<!-- <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<!-- disable Ctr+u & refresh options -->
<script src="../dist/js/hide.js"></script>

<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script>

<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<!-- <script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script> -->
<!-- InputMask -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<!-- <script src="../plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- bootstrap color picker -->
<!-- <script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<!-- <script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script> -->
<!-- BS-Stepper -->
<!-- <script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script> -->
<!-- dropzonejs -->
<!-- <script src="../plugins/dropzone/min/dropzone.min.js"></script> -->

<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>



<!-- Page specific script -->
<script>

  $(function () {
    bsCustomFileInput.init();
  });
  
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
  

  //spinner js
  document.onreadystatechange = function() {
    if (document.readyState !== "complete") {
      document.querySelector(
        "body").style.visibility = "";
      document.querySelector(
        "#loader").style.visibility = "visible";
    } else {
      document.querySelector(
        "#loader").style.display = "none";
      document.querySelector(
        "body").style.visibility = "visible";
      }
  };


  //avoid viewing the code
  function keydown(e) {
      if (e.ctrlKey && e.keyCode == 85) {
          // 82 = r

          // TODO: your thing.

          if (e.preventDefault) {
              e.preventDefault();
          }
          else {
              return false;
          }
      }
  }
  $(document).keydown(keydown);


  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"] //all options
      "buttons": ["copy", "excel", "pdf", "print", "colvis"] //remove csv option
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