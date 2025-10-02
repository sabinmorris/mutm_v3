<?php
  include('../Controller/connect.php');
  session_start();
  
  if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
    $instituteidch = $_POST['instituteidms'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
  }else{
    $instituteidch = $_SESSION['instituteid'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
  }

  if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Msimamizi mkuu') {

    if ($instituteidch == 'ZOTE') {
      $json = file_get_contents($pubIP.'getReconcilliation'); //receive json from url
    }else{
      $json = file_get_contents($pubIP.'getreconcilliationByInstitute?edate='.$endDate.'&instid='.$instituteidch.'&sdate='.$startDate); 
    }
      
  }else{

    $json = file_get_contents($pubIP.'getreconcilliationByInstitute?edate='.$endDate.'&instid='.$instituteidch.'&sdate='.$startDate); //receive json from url

  }

  $arr = json_decode($json, true); //covert json data into array format
?>

<h5 class="text-primary">
  Reconciliation from 
  <span class="text-danger">
    <?php echo $startDate?>
  </span>
  to 
  <span class="text-danger">
    <?php echo $endDate?>
  </span>
</h5>
              
<table id="example1" class="table table-bordered table-striped small">
  <?php
    include('reconciliationList.php');
  ?>
</table>

<script>
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