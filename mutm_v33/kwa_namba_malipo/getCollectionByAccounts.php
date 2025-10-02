<?php
  include('../Controller/connect.php');
  session_start();
  $instituteid = $_POST['instituteid'];
  $accid = $_POST['accid'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];

  ?>
  <table id="example1" class="table table-bordered table-striped small">
    <thead>
    <tr>
      <th>#</th>
      <?php
        if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
          echo '<th>Taasisi</th>';
        }
      ?>
      <th class="text-center">Akaunti Namba</th>
      <th class="text-center">Mlipaji</th>
      <th class="text-center">Huduma</th>
      <th class="text-center">Nam. Ankara</th>
      <th class="text-center">Kumbukumbu</th>
      <th class="text-center">T. Malipo</th>
      <th class="text-center">Risiti</th>
      <th class="text-center">Malipo</th>
      <th class="text-center">Hali</th>
    </tr>
    </thead>
    <tbody>
      <?php

        if ($accid == "ZOTE") {
          include('../Controller/account_controller/selectAccountByInstitute2.php'); //query to select accounts no by institute
          $json4 = $selectAccountByInstitute; //receive json from url
        }else{
          //$json4 = file_get_contents($ipConnect.'/selectaccountbyid/'.$accid); //receive json from url
          include('../Controller/account_controller/selectaccountbyid.php'); //query to select accounts no by institute
          $json4 = $selectaccountbyid; //receive json from url
        }

        $arr4 = json_decode($json4, true); //covert json data into array format

        $num = 1;
        foreach ($arr4 as $key => $value) {
          $accid = $value['accid'];
          $accnum = $value['accnum'];
          $bankcode = $value['bankcode'];
          $accname = $value['accname'];

          //find amount by user
          if ($startDate == '' || $endDate == '') {
            $json5 = file_get_contents($pubIP.'getcontrollnumberbyaccountno?accnum='.$accnum); //receive json from url
          }else{
            $json5 = file_get_contents($pubIP.'getcontrollnumberbyaccountnoperiodic?accnum='.$accnum.'&edate='.$endDate.'&sdate='.$startDate); //receive json from url
          }
          

          $arr5 = json_decode($json5, true); //covert json data into array format

          $tamount5 = 0;
          foreach ($arr5 as $key5 => $value5) {
            if ($value5['totalamount'] > 0) {
              $controlnumber = $value5['controlnumber'];
              $fullname = $value5['fullname'];
              $phonenumber = $value5['phonenumber'];
              $cstatus = $value5['cstatus'];
              $referencenumber = $value5['referencenumber'];
              $tamount5 = $value5['totalamount'];
              $requestdate = $value5['requestdate'];
              $duedate = $value5['duedate'];
              $paiddate = $value5['paiddate'];
              $receiptnumber = $value5['receiptnumber'];
              $firstname = $value5['firstname'];
              $middlename = $value5['middlename'];
              $lastname = $value5['lastname'];
              $username = $value5['username'];
              $servicename = '';
              $instname = $value5['instname'];
              $userid = $value5['userid'];
            }else{
              $controlnumber = '';
              $fullname = '';
              $phonenumber = '';
              $cstatus = '';
              $referencenumber = '';
              $tamount5 = 0;
              $requestdate = '';
              $duedate = '';
              $paiddate = '';
              $receiptnumber = '';
              $firstname = '';
              $middlename = '';
              $lastname = '';
              $username = '';
              $servicename = '';
              $instname = '';
              $userid = '';
            }

            if ($tamount5 > 0) {

              //find servicename by control no.
              $jsonS = file_get_contents($pubIP.'getCollectedServiceByControlNumber/'.$controlnumber); //receive json from url
              $arrS = json_decode($jsonS, true); //covert json data into array format

              $serviceno = 1;
              foreach ($arrS as $keyS => $valueS) {

                if ($serviceno <= 1) {
                  $servicename = $servicename . ' ' .$valueS['servicename'];
                }else{
                  $servicename = $servicename . ', ' .$valueS['servicename'];
                }

              }

              if ($_SESSION['urole'] == 'Mkusanyaji') {
                if ($userid == $_SESSION['userid']) {
                  // if mkusanyaji
                  echo '<tr>';
                  echo '<td>'.$num.'</td>';
                  if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                    echo '<td>'.$instname.'</td>';
                  }
                  echo '<td class="text-success">'.$accnum.' - ' .$accname.' ('.$bankcode.')</td>';
                  echo '<td>'.$fullname.'</td>';
                  echo '<td>'.$servicename.'</td>';
                  echo '<td>'.$controlnumber.'</td>';
                  echo '<td>'.$referencenumber.'</td>';
                  echo '<td>'.$paiddate.'</td>';
                  echo '<td>'.$receiptnumber.'</td>';
                  echo '<td>'.number_format($tamount5).'</td>';
                  if ($cstatus == 'CREATED') {
                    echo '<td class="text-primary">';
                  }elseif ($cstatus == 'CANCELED') {
                    echo '<td class="text-danger">';
                  }else{
                    echo '<td class="text-success">';
                  }
                    echo $cstatus;
                  echo '</td>';
                echo '</tr>';
                $num++;
                }
              }else{
                // if mkusanyaji
                echo '<tr>';
                echo '<td>'.$num.'</td>';
                if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
                  echo '<td>'.$instname.'</td>';
                }
                
                echo '<td class="text-success">'.$accnum.' - ' .$accname.' ('.$bankcode.')</td>';
                echo '<td>'.$fullname.'</td>';
                echo '<td>'.$servicename.'</td>';
                echo '<td>'.$controlnumber.'</td>';
                echo '<td>'.$referencenumber.'</td>';
                echo '<td>'.$paiddate.'</td>';
                echo '<td>'.$receiptnumber.'</td>';
                echo '<td>'.number_format($tamount5).'</td>';
                if ($cstatus == 'CREATED') {
                  echo '<td class="text-primary">';
                }elseif ($cstatus == 'CANCELED') {
                  echo '<td class="text-danger">';
                }else{
                  echo '<td class="text-success">';
                }
                  echo $cstatus;
                echo '</td>';
              echo '</tr>';
              $num++;
            }
            }
          }
          
        }
      
      ?>

</tbody>
<tfoot>
  <tr>
    <th>#</th>
    <?php
      if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
        echo '<th>Taasisi</th>';
      }
    ?>
    <th class="text-center">Akaunti Namba</th>
    <th class="text-center">Mlipaji</th>
    <th class="text-center">Huduma</th>
    <th class="text-center">Nam. Ankara</th>
    <th class="text-center">Kumbukumbu</th>
    <th class="text-center">T. Malipo</th>
    <th class="text-center">Risiti</th>
    <th class="text-center">Malipo</th>
    <th class="text-center">Hali</th>
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

             
                         