<?php
  include('../Controller/connect.php');
  session_start();
  $instituteid = $_POST['instituteid'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];
  $pageSize = $_POST['pageSize'];

  // if ($startDate == '' || $endDate == '') {

    $json = file_get_contents($pubIP.'getControllNumberByInstitutePeriodic?edate='.$endDate.'&instid='.$instituteid.'&pageNumber=1&pageSize='.$pageSize.'&sdate='.$startDate); //receive json from url

    $arr = json_decode($json, true); //covert json data into array format

  // }

?>

  <table id="cnByDate" class="table table-bordered table-striped small">
    <?php
      include('cnByDate.php');
    ?>
  </table>

<script>
  $(function () {
    $("#cnByDate").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"] //all options
      "buttons": ["copy", "excel", "pdf", "print", "colvis"] //remove csv option
    }).buttons().container().appendTo('#cnByDate_wrapper .col-md-6:eq(0)');
    $('#cnByDate2').DataTable({
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
