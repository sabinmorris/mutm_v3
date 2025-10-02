<?php
  include('../Controller/connect.php');
  session_start();
  // $useridn = $_POST['useridn'];
  $instituteidj = $_POST['instituteidj'];
  $startDatej = $_POST['startDatej'];
  $endDatej = $_POST['endDatej'];

  ?>
  <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>S/N</th>
      <th>Mwezi</th>
      <th>Kiasi</th>
    </tr>
    </thead>
    <tbody>
      <?php

        if ($instituteidj == "ZOTE") {
          
          $json5 = file_get_contents($pubIP.'getAllLgaEachMonthsReport?edate='.$endDatej.'&sdate='.$startDatej); //receive json from url

        }else{

          $json5 = file_get_contents($pubIP.'getLgaEachMonthsReport/'.$instituteidj.'?edate='.$endDatej.'&sdate='.$startDatej); //receive json from url

        }

        $num = 1;
        $allMonthTotalj = 0;
        $eachMonthTotalj = 0;
        $arr5 = json_decode($json5, true); //covert json data into array format
        foreach ($arr5 as $key5 => $value5) {
          $months = $value5['months'];
          $eachMonthTotalj = $value5['totalamount'];

          echo '<tr>';
            echo '<td>'.$num.'</td>';
            echo '<td>'.$months.'</td>';
            echo '<td class="text-success">'.number_format($eachMonthTotalj).'.00</td>';
          echo '</tr>';
          $num++;
          $allMonthTotalj = $allMonthTotalj + $eachMonthTotalj;
        }
      
      ?>

</tbody>
<tfoot>
  <tr>
    <th>&nbsp;</th>
    <th>Jumla</th>
    <?php
      echo '<th>'.number_format($allMonthTotalj).'.00</th>';
    ?>
  </tr>
</tfoot>
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

             
                         