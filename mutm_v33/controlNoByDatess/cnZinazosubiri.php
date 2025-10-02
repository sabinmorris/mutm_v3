<thead>
  <tr>
    <th class="text-center">#</th>
    <th class="text-center">Mlipaji</th>
    <th class="text-center">Simu</th>
    <th class="text-center">T. Kuomba</th>
    <th class="text-center">TrxCode</th>
    <th class="text-center">Kumbukumbu</th>
    <th class="text-center">Malipo</th>
    <th class="text-center">Mkusanyaji</th>
    <th class="text-center">Hali</th>
    <th>&nbsp;</th>
    
  </tr>
  </thead>
  <tbody>
    <?php
      $num = 1;
      $totalCnPending = 0;
      foreach ($arr as $key => $value) {
        //find totalAmount
        $totalCnPending = $totalCnPending + $value['totalamount'];
         
        echo '<tr>';
          echo '<td>'.$num.'</td>';
          echo '<td>'.$value['fullname'].'</td>';
          echo '<td>'.$value['phonenumber'].'</td>';
          echo '<td>'.$value['requestdate'].'</td>';
          if ($value['transactioncode'] != 7101 AND $value['transactioncode'] != '') {
            echo '<td class="bg-warning">'.$value['transactioncode'].'</td>';
          }else{
            echo '<td>'.$value['transactioncode'].'</td>';
          }
          echo '<td>'.$value['referencenumber'].'</td>';
          echo '<td>'.number_format($value['totalamount'], 2).' TZS</td>';
          echo '<td>'.$value['userid'].'</td>';

          echo '<td class="text-danger">';
            echo $value['cstatus'];
          echo '</td>';

          echo '<td class = "text-right">';
            ?>
            <div class="btn-group">

              <?php
                echo '<a data-id="'.htmlspecialchars($value['controlnumber_request_payload']).'" data-conf2="'.$value['referencenumber'].'" data-conf3="'.$value['fullname'].'" data-conf4="'.$value['phonenumber'].'" data-conf5="'.$value['requestdate'].'" data-conf6="'.$value['duedate'].'" data-conf7="'.$value['cstatus'].'" data-conf8="'.$value['totalamount'].'" data-conf9="'.$value['transactioncode'].'" data-conf10="'.$value['userid'].'" href="#infoCnP" class="btn btn-success btn-xs open-infoCnP" title="Bonyeza kuona huduma zilizoombwa kulipiwa kupitia namba ya malipo"><i class="fas fa-eye"></i>Taarifa</a>';
              ?>
            </div>
            <?php
          echo'</td>';
        echo '</tr>';

        $num++;
      }
    ?>
  </tbody>
  <tfoot>
    <tr>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th class="text-center">Jumla</th>
      <th class="text-center"><?php echo number_format($totalCnPending, 2) . ' TZS'; ?></th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>
  </tfoot>