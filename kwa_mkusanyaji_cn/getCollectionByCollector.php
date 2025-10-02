<?php
  include('../Controller/connect.php');
  session_start();
  $userid = $_POST['userid'];
  $instituteid = $_POST['instituteid'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];
?>
  <table id="example1" class="table table-bordered table-striped small">
    <thead>
      <tr>
        <th>#</th>
        <th class="text-center">Mkusanyaji3</th>
        <th class="text-center">Mlipaji</th>
        <th class="text-center">Ankara Nam.</th>
        <th class="text-center">T. Kuomba</th>
        <th class="text-center">T. Kumaliza</th>
        <th class="text-center">T. Malipo</th>
        <th class="text-center">Kumbukumbu</th>
        <th class="text-center">Risiti</th>
        <th class="text-center">Malipo</th>
        <th class="text-center">Hali</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
<?php

  if ($userid == "WOTE") {
    //find amount by user
    if ($startDate == '' || $endDate == '') {
      //receive json from url
      $json5 = file_get_contents($pubIP.'getControllNumberByInstitute?instid='.$instituteid.'&pageNumber=1&pageSize=50');

    }else{

      $json5 = file_get_contents($pubIP.'getControllNumberByInstitutePeriodic?edate='.$endDate.'&instid='.$instituteid.'&sdate='.$startDate.'&pageNumber=1&pageSize=50');
    }
  }else{

    //find amount by user
    if ($startDate == '' || $endDate == '') {
      $json5 = file_get_contents($pubIP.'getControllNumberByUser?userid='.$userid);

    }else{
      
      $json5 = file_get_contents($pubIP.'getControllNumberByUserPeriodic?edate='.$endDate.'&sdate='.$startDate.'&userid='.$userid.'&pageNumber=1&pageSize=50');
    }
  }

  $arr5 = json_decode($json5, true); //covert json data into array format

  $num = 1;
  foreach ($arr5 as $key5 => $value5) {
    $controlnumber = $value5['controlnumber'];
    $fullname = $value5['fullname'];
    $phonenumber = $value5['phonenumber'];
    $cstatus = $value5['cstatus'];
    $referencenumber = $value5['referencenumber'];
    $tamount5 = number_format($value5['totalamount']);
    $requestdate = $value5['requestdate'];
    $duedate = $value5['duedate'];
    $paiddate = $value5['paiddate'];
    $receiptnumber = $value5['receiptnumber'];
    $firstname = $value5['firstname'];
    $middlename = $value5['middlename'];
    $lastname = $value5['lastname'];
    $username = $value5['username'];
    $servicename = $value5['servicename'];
    $instname = $value5['instname'];
    $username = $value5['username'];

    if($controlnumber != null || $controlnumber != ''){
      echo '<tr>';
        echo '<td>'.$num.'</td>';
        echo '<td>'.$firstname.' ' .$middlename.' '.$lastname.'</td>';
        echo '<td>'.$fullname.'</td>';
        echo '<td class="text-success">'.$controlnumber.'</td>';
        echo '<td>'.$requestdate.'</td>';
        echo '<td>'.$duedate.'</td>';
        echo '<td>'.$paiddate.'</td>';
        echo '<td>'.$referencenumber.'</td>';
        
        echo '<td>'.$receiptnumber.'</td>';
        echo '<td class="text-success">'.$tamount5.'.00</td>';
        if ($cstatus == 'CREATED') {
          echo '<td class="text-primary">';
        }elseif ($cstatus == 'CANCELED') {
          echo '<td class="text-danger">';
        }else{
          echo '<td class="text-success">';
        }
          echo $cstatus;
        echo '</td>';
        echo '<td class = "text-right">';
          if ($cstatus == 'CREATED') {
                  ?>
            <div class="btn-group">

              <?php
                echo '<a data-id="'.$controlnumber.'" href="#infoCn" class="btn btn-success btn-xs open-infoCn" title="Bonyeza kuona huduma zilizoombwa kulipiwa kupitia ankara namba"><i class="fas fa-eye"></i>Taarifa</a>';
                
                echo '<a href="../controlNo/previewReceipts.php?controlnumber='.$controlnumber.'&refn='.$referencenumber.'" target="_blank" class="btn btn-primary btn-xs" title="Bonyeza kuprint"><i class="fas fa-print"></i>Risiti</a>';

                if($_SESSION['urole'] == 'Afisa mapato'){
                  echo '<a data-id="'.$controlnumber.'" data-conf2="'.$requestdate.'" data-conf3="'.$referencenumber.'" data-conf4="'.$_SESSION['instcode'].'" href="#cancelCn" class="btn btn-warning btn-xs open-cancelCn" title="Bonyeza kuhairisha namba ya ankara"><i class="fas fa-window-close"></i>Hairi</a>';
                }

                }elseif($cstatus == 'PAID'){
                  echo '<a data-id="'.$controlnumber.'" href="#infoCn" class="btn btn-success btn-xs open-infoCn" title="Bonyeza kuona huduma zilizoombwa kulipiwa kupitia ankara namba"><i class="fas fa-eye"></i>Taarifa</a>';

                  echo '<a href="../controlNo/previewReceipts.php?controlnumber='.$controlnumber.'&refn='.$referencenumber.'" target="_blank" class="btn btn-primary btn-xs" title="Bonyeza kuprint"><i class="fas fa-print"></i>Risiti</a>';
                }else {
                  echo '<a data-id="'.$controlnumber.'" href="#infoCn" class="btn btn-success btn-xs open-infoCn" title="Bonyeza kuona huduma zilizoombwa kulipiwa kupitia ankara namba"><i class="fas fa-eye"></i>Taarifa</a>';
                }
              ?>
            </div>
          <?php
        echo '</td>';
      echo '</tr>';
      $num++;
    }
      
}

?>
</tbody>
<tfoot>
  <th>#</th>
  <th class="text-center">Mkusanyaji</th>
  <th class="text-center">Mlipaji</th>
  <th class="text-center">Ankara Nam.</th>
  <th class="text-center">T. Kuomba</th>
  <th class="text-center">T. Kumaliza</th>
  <th class="text-center">T. Malipo</th>
  <th class="text-center">Kumbukumbu</th>
  <th class="text-center">Risiti</th>
  <th class="text-center">Malipo</th>
  <th class="text-center">Hali</th>
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


  

             
                         