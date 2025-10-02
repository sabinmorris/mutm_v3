<table id="example1" class="table table-bordered table-striped small">
  <thead>
  <tr>
    <th>#</th>
    <?php
      if ($_SESSION['urole'] == 'Msimamizi mkuu' || $_SESSION['urole'] == 'Muangalizi mkuu') {
        echo '<th>Taasisi</th>';
      }
    ?>
    <th>Chanzo Kikuu</th>
    <th>Namba ya Malipo</th>
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
          echo '<td>'.$value['msname'].'</td>';
          echo '<td>'.$value['accnum'] . ' - '.$value['accname'].'</td>';
          echo '<td>'.$value['msstatus'].'</td>';
          if ($_SESSION['urole'] == 'Afisa mapato') {
            echo '<td class="text-right">';

            if ($value['msname'] == 'USHURU NA UZALISHAJI') {
              echo '&nbsp;';
            }else{

              echo '<a data-id="'.$value['msid'].'" data-conf2="'.$value['msname'].'" href="#addMiddleSource" class="btn btn-xs btn-primary open-addMiddleSource" title="Bonyeza kuongeza chanzo cha kati"><i class="fas fa-plus-circle"></i>&nbsp;Chanzo cha Kati</a>&nbsp;';
              echo '<a data-id="'.$value['msid'].'" data-conf2="'.$value['instituteid'].'" data-conf3="'.$value['msname'].'" data-conf4="'.$value['accnum'].'" data-conf5="'.$value['accname'].'" data-conf6="'.$value['accid'].'" href="#editMainSource" class="btn btn-xs btn-success open-editMainSource" title="Bonyeza kubadilisha taariza za chanzo kikuu"><i class="fas fa-pen-alt"></i></a>';
                ?>
                <a class="btn btn-xs btn-danger" onClick="deleteMainSource('<?php echo $value['msid']; ?>', '<?php echo $value['msname']; ?>')" title="Bonyeza kufuta chanzo kikuu"><i class="fas fa-trash"></i></a>
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
    <th>Chanzo Kikuu</th>
    <th>Namba ya Akaunti</th>
    <th>Hali</th>
    <?php
      if ($_SESSION['urole'] == 'Afisa mapato') {
        echo '<th>&nbsp;</th>';
      }
    ?>
  </tfoot>
</table>