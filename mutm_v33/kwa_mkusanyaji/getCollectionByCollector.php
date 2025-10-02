<?php
  include('../Controller/connect.php');
  session_start();
  $useridn = $_POST['useridn'];
  $instituteid = $_POST['instituteid'];
  $startDaten = $_POST['startDaten'];
  $endDaten = $_POST['endDaten'];

  ?>
  <table id="example1" class="table table-bordered table-striped small">
    <thead>
    <tr>
      <th>#</th>
      <th>Jina kamili</th>
      <th>Zoni</th>
      <th>Chanzo</th>
      <th>Hali ya chanzo</th>
      <th>Mlipaji</th>
      <th>Kiasi</th>
      <th>Risiti</th>
      <th>Tarehe</th>
    </tr>
    </thead>
    <tbody>
      <?php

        if ($useridn == "WOTE") {

          if ($startDaten == '' || $endDaten == '') {
            $json5 = file_get_contents($pubIP.'getPosCollectionByInstitute/'.$instituteid); //receive json from url
          }else{
            $json5 = file_get_contents($pubIP.'getPosCollectionByDateRangeInstitute?edate='.$endDaten.'&instid='.$instituteid.'&sdate='.$startDaten); //receive json from url
          }

        }else{

          if ($startDaten == '' || $endDaten == '') {
            $json5 = file_get_contents($pubIP.'getPosCollectionByUser/'.$useridn); //receive json from url
          }else{
            //HAPA NATAKIWA NIPITISHE PARAMETER YA userid BADALA YA instid
            // $json5 = file_get_contents($ipConnect.'/getPosCollectionByDateRangeUser?edate='.$endDate.'&sdate='.$startDate.'&userid='.$userid); //receive json from url

            $json5 = file_get_contents($pubIP.'getPosCollectionByDateRangeUser?edate='.$endDaten.'&sdate='.$startDaten.'&userid='.$useridn); //receive json from url
            // $json5 = file_get_contents($ipConnect.'/getPosCollectionByUser/'.$userid); 
          }

        }

        $num = 1;
        $totalcollection = 0;
        $tamount5 = 0;
        $arr5 = json_decode($json5, true); //covert json data into array format
        foreach ($arr5 as $key5 => $value5) {
          $checkdatetime = $value5['checkdatetime'];
          $csid = $value5['csid'];
          $firstname = $value5['firstname'];
          $middlename = $value5['middlename'];
          $lastname = $value5['lastname'];
          $ltsname = $value5['ltsname'];
          $msname = $value5['msname'];
          $payer = $value5['payer'];
          $quantity = $value5['quantity'];
          $receiptno = $value5['receiptno'];
          $zonename = $value5['zonename'];
          $tamount5 = $value5['amount'];

          echo '<tr>';
            echo '<td>'.$num.'</td>';
            echo '<td>'.$firstname.' ' .$middlename.' '.$lastname.'</td>';
            echo '<td>'.$zonename.'</td>';
            echo '<td>'.$msname.'</td>';
            echo '<td>'.$ltsname.'</td>';
            echo '<td>'.$payer.'</td>';
            echo '<td class="text-success">'.number_format($tamount5).'.00</td>';
            echo '<td>'.$receiptno.'</td>';
            echo '<td>'.$checkdatetime.'</td>';
          echo '</tr>';
          $num++;
          $totalcollection = $totalcollection + $tamount5;
        }
      
      ?>

</tbody>
<tfoot>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
  <th>Jumla</th>
  <th><?php echo number_format($totalcollection). '.00'; ?></th>
  <th>&nbsp;</th>
  <th>&nbsp;</th>
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

             
                         