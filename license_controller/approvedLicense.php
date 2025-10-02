<table id="approvedLicense" class="table table-bordered table-striped small">
  <thead>
    <tr>
      <th class="text-center">SNo</th>
      <th class="text-center">Namba ya Leseni</th>
      <th class="text-center">Aina ya leseni</th>
      <th class="text-center">Kategoria</th>
      <th class="text-center">Jina la Biashara</th>
      <th class="text-center">Shehia</th>
      <th class="text-center">Kiwango</th>
      <th class="text-center">Hali</th>
      <th class="text-center">Uhakiki</th>
      <th class="text-center">Kitendo</th>  
    </tr>
  </thead>
  <tbody>
    <?php
    $num = 1;
    foreach ($arr as $key => $value) {
      echo '<tr>';
      echo '<td>' . $num . '</td>';
      echo '<td>' . $value['lnumber'] . '</td>';
      echo '<td>' . $value['licensetype'] . '</td>';
      echo '<td>' . $value['category'] . '</td>';
      echo '<td>' . $value['bname'] . '</td>';
      echo '<td>' . $value['shname'] . '</td>';
      echo '<td>' . number_format($value['amount'], 2) . ' TZS</td>';
      echo '<td class = "text-right">&nbsp;<button class="btn btn-sm btn-success" >PAID</button></td>';
      echo '<td class = "text-right">&nbsp;<button class="btn btn-sm btn-success" >Approved</button></td>';
      
      if ($value['isapproved'] != true) {
        echo '<td class="text-right">';
        echo '<div class="btn-group">';
        if ($_SESSION['urole'] == 'Mwenyekiti bodi') {
            if ($value['cstatus'] == 'PAID') {
                ?>
                <a class="btn btn-sm btn-primary" onclick="approveLicenseinfo('<?php echo $value['lid']; ?>', '<?php echo $value['lnumber']; ?>')" title="Bonyeza kuhakiki Leseni">Approve</a>
                </div>
              <?php
              }
              
              ?>
  
            <?php
        }
        echo '</td>';
      } else {
        echo '<td class="text-right">';
        echo '<div class="btn-group">';
        if ($_SESSION['urole'] == 'Afisa mapato') {

          echo '<a href="printLicense.php?licenseId=' . $value['lid'] . '&businessid=' . $value['businessid'] . '&businesscategory=' . $value['category'] . '" target="_blank" class="btn btn-primary btn-xs" title="Bonyeza kuprint leseni"><i class="fas fa-print"></i>Print</a>';
          
          ?>
          </div>
          <?php
          echo '</td>';
        }
      }
      echo '</tr>';

      $num++;
    }
    ?>
  </tbody>
</table>