<table id="example1" class="table table-bordered table-striped small">
  <thead>
    <tr>
      <th>#</th>
      <?php
        if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
          echo '<th>Taasisi</th>';
        }
      ?>
      <th>Zoni</th>
      <th>Chanzo Kikuu</th>
      <th>Chanzo Kidogo</th>
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
          if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
            echo '<td>'.$value['instname'].'</td>';
          }
          echo '<td>'.$value['zonename'].'</td>';
          echo '<td>'.$value['msname'].'</td>';
          echo '<td class="font-weight-bold">'.$value['mdsname'].'</td>';
          echo '<td>'.$value['mdsstatus'].'</td>';
          if ($_SESSION['urole'] == 'Afisa mapato') {
            echo '<td class="text-right">';

            if ($value['mdsname'] == 'VITAMBULISHO VYA WAJASIRIAMALI') {
              echo '&nbsp;';
            }else{

              echo '<a data-id="'.$value['mdsid'].'" data-conf2="'.$value['mdsname'].'" data-conf3="'.$value['zonename'].'" href="#addLittleSource" class="btn btn-xs btn-primary open-addLittleSource" title="Bonyeza kuongeza hali ya chanzo"><i class="fas fa-plus-circle"></i>&nbsp;Hali Chanzo</a>&nbsp;';
              echo '<a data-id="'.$value['msid'].'" data-conf2="'.$value['mdsname'].'" data-conf3="'.$value['msname'].'" data-conf4="'.$value['zoneid'].'" data-conf5="'.$value['zonename'].'" data-conf6="'.$value['mdsid'].'" href="#editMiddleSource" class="btn btn-xs btn-success open-editMiddleSource" title="Bonyeza kubadilisha taariza za chanzo cha kati">
                <i class="fas fa-pen-alt"></i></a>';
                ?>
                <a class="btn btn-xs btn-danger" onClick="deleteMiddleSource('<?php echo $value['mdsid']; ?>', '<?php echo $value['mdsname']; ?>')" title="Bonyeza kufuta chanzo cha kati"><i class="fas fa-trash"></i></a>
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
    <?php
      if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
        echo '<th>Taasisi</th>';
      }
    ?>
    <th>Zoni</th>
    <th>Chanzo Kikuu</th>
    <th>Chanzo Kidogo</th>
    <th>Hali</th>
    <?php
      if ($_SESSION['urole'] == 'Afisa mapato') {
        echo '<th>&nbsp;</th>';
      }
    ?>
  </tfoot>
</table>