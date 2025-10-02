<table id="example1" class="table table-bordered table-striped small">
  <thead>
    <tr>
      <th>Control Namba</th>
      <th>Jina la Biashara</th>
      <th>Hali ya Malipo</th>
      <th>Kiwango</th>
      <th>Maelezo</th>
      <th>Tarehe ya Mwanzo</th>
      <th>Tarehe ya Mwisho</th>
      <th>Kitendo</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $num = 1;
    foreach ($arr as $key => $value) {
      echo '<td>' . $value['controlnumber'] . '</td>';
      echo '<td>' . $value['bname'] . '</td>';
      echo '<td>' . $value['status'] . '</td>';
      echo '<td>' . $value['amount'] . '</td>';
      echo '<td>' . $value['description'] . '</td>';
      echo '<td>' . $value['sdate'] . '</td>';
      echo '<td>' . $value['edate'] . '</td>';
      // if ($value['status'] == 'INACTIVE') {
      //   echo '<td class="text-danger">' . $value['status'] . '</td>';
      // } else {
      //   echo '<td>' . $value['status'] . '</td>';
      // }

      if ($_SESSION['urole'] == 'Afisa mapato') {
        // if ($value['status'] == 'ACTIVE') {
        echo '<td class="text-right">';
        echo '<div class="btn-group">';
        echo '<a href="previewInvoice.php?invid='.$value['invlid'].'&refn='.$value['referencenumberr'].'&controlnumber='.$value['controlnumber'].'&status='.$value['status'].'" target="_blank" class="btn btn-primary btn-xs" title="Bonyeza kuprint"><i class="fas fa-print"></i>Invoice</a>';
    ?>
        <!-- <a class="btn btn-xs btn-danger" onClick="deleteLicenseinfo('<?php echo $value['lid']; ?>', '<?php echo $value['lnumber']; ?>')" title="Bonyeza kufuta Invoice"><i class="fas fa-trash"></i> Futa</a> -->
        </div>
    <?php
        echo '</td>';
        
      } else {
        echo '<td class="text-right">&nbsp;</td>';
      }

      echo '</tr>';

      $num++;
    }
    ?>
  </tbody>
  <tfoot>
    <th>Control Namba</th>
    <th>Jina la Biashara</th>
    <th>Hali ya Malipo</th>
    <th>Kiwango</th>
    <th>Maelezo</th>
    <th>Tarehe ya Mwanzo</th>
    <th>Tarehe ya Mwisho</th>
    <th>Kitendo</th>
  </tfoot>
</table>