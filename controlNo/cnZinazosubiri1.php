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
      foreach ($arrp as $key => $value) {
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
                echo '<a data-id="'.$value['referencenumber'].'" href="#infoCnP" class="btn btn-warning btn-xs open-infoCnP" title="Bonyeza kutuma tena maombi ya ankara namba"><i class="fas fa-redo"></i>&nbsp;Resend</a>';
              ?>
            </div>
            <?php
          echo'</td>';
        echo '</tr>';  
       $num++;
       break;
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