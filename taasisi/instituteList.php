<table id="example1" class="table table-bordered table-striped small">
  <thead>
    <tr>
      <th>SP/IntgCode</th>
      <th>InstCode</th>
      <th>Taasisi</th>
      <th>Aina</th>
      <th>Mkoa</th>
      <th>Hali</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $num = 1;
        foreach ($arr as $key => $value) {
          echo '<td>'.$value['intergratingcode'].'</td>';
          echo '<td>'.$value['instcode'].'</td>';
          echo '<td class="font-weight-bold">'.$value['instname'].'</td>';
          echo '<td>'.$value['insttype'].'</td>';
          echo '<td>'.$value['regname'].'</td>';
          if ($value['inststatus'] == 'inactive') {
            echo '<td class="text-danger">'.strtoupper($value['inststatus']).'</td>';
          }else{
            echo '<td>'.strtoupper($value['inststatus']).'</td>';
          }
            
            if ($_SESSION['urole'] == 'Msimamizi mkuu') {
              if ($value['inststatus'] == 'active') {
                echo '<td class="text-right">';
                  echo '<div class="btn-group">';
                    echo '<a data-conf0="'.$value['instituteid'].'" data-conf2="'.$value['instcode'].'" data-conf3="'.$value['instname'].'" href="#addPOS" class="btn btn-xs btn-warning open-addPOS" title="Bonyeza Kusajili POS katika Taasisi"><i class="fas fa-tablet-alt"></i>&nbsp;POS</a>';

                    include('../Controller/account_controller/insertAccount.php'); //query to insert account no
                    echo '<a data-conf0="'.$value['instituteid'].'" data-conf2="'.$value['instcode'].'" data-conf3="'.$value['instname'].'" data-conf4="'.$insertAccount.'" href="#addAccountNo" class="btn btn-xs btn-success open-addAccountNo" title="Bonyeza Kusajili Namba za Akaunti ya Kupokea Malipo ya Taasisi"><i class="fas fa-plus"></i>&nbsp;Akaunti</a>';

                    echo '<a data-id="'.$value['instituteid'].'" data-conf2="'.$value['instcode'].'" data-conf3="'.$value['instname'].'" data-conf4="'.$value['insttype'].'" data-conf5="'.$value['regname'].'" data-conf6="'.$value['regid'].'" data-conf7="'.$value['intergratingcode'].'" href="#editInstitutionf" class="btn btn-xs btn-info open-editInstitutionf" title="Bonyeza kubadili taariza za taasisi"><i class="fas fa-pencil-alt"></i></a>';
                      ?>
                      <a class="btn btn-xs btn-danger" onClick="deleteInstitution('<?php echo $value['instituteid']; ?>', '<?php echo $value['instname']; ?>')" title="Bonyeza kufuta taasisi"><i class="fas fa-trash"></i></a>
                  </div>
                  <?php
                echo'</td>';
              }else{
                echo '<td class = "text-right">&nbsp;</td>';
              }
              
            }else{
              echo '<td class="text-right">&nbsp;</td>';
            }
            
          echo '</tr>';

          $num++;
        }
      ?>
  </tbody>
  <tfoot>
    <th>SP/IntgCode</th>
    <th>InstCode</th>
    <th>Taasisi</th>
    <th>Aina</th>
    <th>Mkoa</th>
    <th>Hali</th>
    <th>&nbsp;</th>
  </tfoot>
</table>