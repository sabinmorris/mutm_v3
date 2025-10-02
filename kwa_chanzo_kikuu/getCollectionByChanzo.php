<?php
  include('../Controller/connect.php');
  session_start();
  $instituteid = $_POST['instituteid'];
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
      <th>msid</th>
      <th>Chanzo Kikuu</th>
      <th>Kiasi</th>
      <!--<th>msid</th>-->
    </tr>
    </thead>
    <tbody>
      <?php

        if ($msid == "ZOTE") {
          $json4 = file_get_contents($pubIP.'selectMainsourceByInstitute/'.$instituteid); //receive json from url
        }else{
          $json4 = file_get_contents($pubIP.'selectMainsourceById/'.$msid); //receive json from url
        }

        $arr4 = json_decode($json4, true); //covert json data into array format

        $num = 1;
        $yearlyTotalmy = 0;
        $totalamountmy = 0;
        foreach ($arr4 as $key => $value) {
          $msname = $value['msname'];
          $instname = $value['instname'];
          $msid = $value['msid'];

          //find amount by vyanzo
          if ($startDate == '' || $endDate == '') {
            $jsonmy = file_get_contents($pubIP.'getYearDashboarCollectionByVyanzo/'.$msid); //receive json from url
          }else{
            $jsonmy = file_get_contents($pubIP.'getPeriodicCollectionByVyanzo/'.$msid.'?edate='.$endDate.'&sdate='.$startDate); //receive json from url
          }
          

          // $arr5 = json_decode($json5, true); //covert json data into array format

          // $tamount5 = 0;
          // foreach ($arr5 as $key5 => $value5) {
          //   if ($value5['totalamount'] > 0) {
          //     $tamount5 = $value5['totalamount'];
          //   }else{
          //     $tamount5 = 0;
          //   }
          // }

          $arrmy = json_decode($jsonmy, true); //covert json data into array format
          $totalamountmy = 0;
          foreach ($arrmy as $key => $valuemy) {
            $totalamountmy = $valuemy['totalamount'];
          }

          // print_r($arr4);
          echo '<tr>';
            echo '<td>'.$num.'</td>';

            if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
              echo '<td>'.$instname.'</td>';
            }
            echo '<td>'.$msid.'</td>';
            echo '<td>'.$msname.'</td>';
              
            echo '<td class="text-success">'.number_format($totalamountmy).'.00</td>';

            // echo '<td>'.$msid.'</td>';
            
          echo '</tr>';
          $num++;
          $yearlyTotalmy = $yearlyTotalmy + $totalamountmy;
        }
      
      ?>

</tbody>
<tfoot>
  <th>#</th>
  <?php
    if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
      echo '<th>&nbsp;</th>';
    }
  ?>
  <th>Jumla</th>
  <?php
    echo '<th>'.number_format($yearlyTotalmy).'.00</th>';
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
             
                         