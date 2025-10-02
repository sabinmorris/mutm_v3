<?php
  include('../Controller/connect.php');
  session_start();
  $instituteid = $_POST['instituteid'];
  $mdsid = $_POST['mdsid'];
  $msid = $_POST['msid'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];

  ?>
  <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>#</th>
      <?php
        if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
          echo '<th>Taasisi</th>';
        }
      ?>
      <th>Chanzo Kikuu</th>
      <th>Chanzo Kidogo</th>
      <th>Msid</th>
      <th>Kiasi</th>
    </tr>
    </thead>
    <tbody>
      <?php

        if ($mdsid == "VYOTE") {
          $json4 = file_get_contents($pubIP.'selectMiddlesourceByMainsource/'.$msid); //receive json from url
        }else{
          $json4 = file_get_contents($pubIP.'selectMiddlesourceById/'.$mdsid); //receive json from url
        }

        $arr4 = json_decode($json4, true); //covert json data into array format

        $num = 1;
        foreach ($arr4 as $key => $value) {
          $instname = $value['instname'];
          $msname = $value['msname'];
          $mdsname = $value['mdsname'];
          $mdsid = $value['mdsid'];

          //find amount by vyanzo
          if ($startDate == '' || $endDate == '') {
            $jsonmy = file_get_contents($pubIP.'getDashboarCollectionByMiddleSource/'.$mdsid); //receive json from url
          }else{
            $jsonmy = file_get_contents($pubIP.'getPeriodicDashboarCollectionByMiddleSource/'.$mdsid.'?edate='.$endDate.'&sdate='.$startDate); //receive json from url
          }
          

          $arrmy = json_decode($jsonmy, true); //covert json data into array format
          $totalamountmy = 0;
          foreach ($arrmy as $key => $valuemy) {
            $totalamountmy = $valuemy['totalamount'];
          }

          // print_r($arr4);
          echo '<tr>';
            echo '<td>'.$num.'</td>';
            if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
              echo '<td>'.$value['instname'].'</td>';
            }
            echo '<td>'.$value['msname'].'</td>';
            echo '<td>'.$value['mdsname'].'</td>';
            echo '<td>'.$value['mdsid'].'</td>';
            echo '<td class="text-success">'.number_format($totalamountmy, 2).'</td>';
          echo '</tr>';
          $num++;
          $yearlyTotalmy = $yearlyTotalmy + $totalamountmy;
        }
      
      ?>

</tbody>
<tfoot>
  <th>&nbsp;</th>
  <?php
    if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
      echo '<th>&nbsp;</th>';
    }
  ?>
  <th>&nbsp;</th>
  <th>Jumla</th>
  <?php
    echo '<th>'.number_format($yearlyTotalmy, 2).'</th>';
  ?>
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
             
                         