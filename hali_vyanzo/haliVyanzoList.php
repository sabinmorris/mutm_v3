<table id="example1" class="table table-bordered table-striped small">

<thead>
  <tr>
    <th>#</th>
    <th>Zoni</th>
    <th>Chanzo Kati</th>
    <th>Hali Chanzo</th>
    <th>Aina</th>
    <th>Aina Malipo</th>
    <th>GFS Code</th>
    <th>SubSp Code</th>
    <th>Kiasi</th>
    <th>Hali</th>
    <?php
      if ($_SESSION['urole'] == 'Afisa mapato') {
        echo '<th>&nbsp;</th>';
      }
    ?>
  </tr>
  </thead>
  <tbody>
    <?php
      $num = 1;
      foreach ($arr as $key => $value) {
        
        echo '<tr>';
          echo '<td>'.$num.'</td>';
          echo '<td>'.$value['zonename'].'</td>';
          echo '<td>'.$value['mdsname'].'</td>';
          echo '<td class="font-weight-bold">'.$value['ltsname'].'</td>';
          echo '<td>'.$value['scondition'].'</td>';
          echo '<td>'.$value['paymenttype'].'</td>';
          echo '<td>'.$value['gfscode'].'</td>';
          echo '<td>'.$value['subspcode'].'</td>';
          echo '<td class="font-weight-bold">'. number_format($value['ltsprice'], 2).' TZS</td>';
          if (strtoupper($value['ltsstatus']) == 'ACTIVE') {
            echo '<td class = "text-success">'.strtoupper($value['ltsstatus']).'</td>';
          }else{
            echo '<td class = "text-danger">'.strtoupper($value['ltsstatus']).'</td>';
          }
          
          if ($_SESSION['urole'] == 'Afisa mapato') {
            echo '<td class="text-right">';

            if (strtoupper($value['scondition']) == 'B') {
              $sconditionkk = 'Bila Idadi';
            }else{
              $sconditionkk = 'Idadi';
            }

            if ($value['mdsname'] == 'VITAMBULISHO VYA WAJASIRIAMALI') {
              echo '&nbsp;';
            }else{

              echo '<a data-id="'.$value['ltsid'].'" data-conf2="'.$value['ltsname'].'" data-conf3="'.$value['ltsprice'].'" data-conf4="'.$value['scondition'].'" data-conf5="'.$value['mdsname'].'" data-conf6="'.$sconditionkk.'" data-conf7="'.$value['paymenttype'].'" data-conf8="'.$value['gfscode'].'" data-conf9="'.$value['mdsid'].'" data-conf10="'.$value['subspcode'].'" href="#editLittleSource" class="btn btn-xs btn-success open-editLittleSource" title="Bonyeza kubadilisha taariza za hali ya chanzo">
              <i class="fas fa-pen-alt"></i>
              </a>';

              ?>

              <a class="btn btn-xs btn-danger" onClick="deleteLittleSource('<?php echo $value['ltsid']; ?>', '<?php echo $value['ltsname']; ?>')" title="Bonyeza kufuta hali ya chanzo"><i class="fas fa-trash"></i></a>

              <?php
            }
            
              
            echo'</td>';
          }
        echo '</tr>';

        $num++;
      }
    ?>
  </tbody>
  <tfoot>
    <th>#</th>
    <th>Zoni</th>
    <th>Chanzo Kati</th>
    <th>Hali Chanzo</th>
    <th>Aina</th>
    <th>Aina Malipo</th>
    <th>GFS Code</th>
    <th>SubSp Code</th>
    <th>Kiasi</th>
    <th>Hali</th>
    <?php
      if ($_SESSION['urole'] == 'Afisa mapato') {
        echo '<th>&nbsp;</th>';
      }
    ?>
  </tfoot>
</table>