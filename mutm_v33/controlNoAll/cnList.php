<thead>
  <tr>
    <th class="text-center">#</th>
    <th class="text-center">Ankara Nam.</th>
    <th class="text-center">Jina kamili</th>
    <th class="text-center">Simu</th>
    <th class="text-center">T. Kuomba</th>
    <th class="text-center">T. Kumaliza</th>
    <th class="text-center">TrxCode</th>
    <th class="text-center">Kumbukumbu</th>
    <th class="text-center">Malipo</th>
    <th class="text-center">T. Malipo</th>
    <th class="text-center">Risiti</th>
    <th class="text-center">Hali</th>
    <th>&nbsp;</th>
  </tr>
  </thead>
  <tbody>
    <?php
      $num = 1;
      $totalCnHazijalipiwa = 0;
      foreach ($arr as $key => $value) {
        //find totalAmount
        $totalCnHazijalipiwa = $totalCnHazijalipiwa + $value['totalamount'];
        echo '<tr>';
          echo '<td>'.$num.'</td>';
          if ($value['controlnumber'] == 0) {
            echo '<td class="text-success font-weight-bold">&nbsp;</td>';
          }else{
            echo '<td class="text-success font-weight-bold">'.$value['controlnumber'].'</td>';
          }
          
          echo '<td>'.$value['fullname'].'</td>';
          echo '<td>'.$value['phonenumber'].'</td>';
          echo '<td>'.$value['requestdate'].'</td>';
          echo '<td>'.$value['duedate'].'</td>';

          if ($value['transactioncode'] != 7101 AND $value['transactioncode'] != '') {
            echo '<td class="bg-warning">'.$value['transactioncode'].'</td>';
          }else{
            echo '<td>'.$value['transactioncode'].'</td>';
          }

          echo '<td>'.$value['referencenumber'].'</td>';
          echo '<td>'.number_format($value['totalamount'], 2).' TZS</td>';
          echo '<td>'.$value['paiddate'].'</td>';
          echo '<td>'.$value['receiptnumber'].'</td>';

          if ($value['cstatus'] == 'CREATED') {
            echo '<td class="text-primary">';
          }elseif ($value['cstatus'] == 'CANCELED') {
            echo '<td class="text-danger">';
          }elseif ($value['cstatus'] == 'EXPIRED') {
            echo '<td class="text-warning">';
          }elseif ($value['cstatus'] == 'PAID') {
            echo '<td class="text-success">';
          }else{
            echo '<td class="text-primary">';
          }
          
            echo $value['cstatus'];
          echo '</td>';

          echo '<td class = "text-right">';
            ?>
            <div class="btn-group">

              <?php
                echo '<a data-id="'.$value['controlnumber'].'" data-conf2="'.$value['referencenumber'].'" href="#infoCn" class="btn btn-success btn-xs open-infoCn" title="Bonyeza kuona huduma zilizoombwa kulipiwa kupitia namba ya malipo"><i class="fas fa-eye"></i>Taarifa</a>';

                if ($value['cstatus'] == 'CREATED') {
                  echo '<a href="previewInvoice.php?refn='.$value['referencenumber'].'&controlnumber='.$value['controlnumber'].'" target="_blank" class="btn btn-primary btn-xs" title="Bonyeza kuprint"><i class="fas fa-print"></i>Invoice</a>';
                }else{
                  echo '<a href="previewReceipts.php?refn='.$value['referencenumber'].'&controlnumber='.$value['controlnumber'].'" target="_blank" class="btn btn-primary btn-xs" title="Bonyeza kuprint"><i class="fas fa-print"></i>Risiti</a>';
                }

                if($_SESSION['urole'] == 'Afisa mapato' AND $value['cstatus'] == 'CREATED'){
                  echo '<a data-id="'.$value['controlnumber'].'" data-conf2="'.$value['requestdate'].'" data-conf3="'.$value['referencenumber'].'" data-conf4="'.$_SESSION['instcode'].'" href="#cancelCn" class="btn btn-warning btn-xs open-cancelCn" title="Bonyeza kuhairisha namba ya malipo"><i class="fas fa-window-close"></i>Hairi</a>';
                }
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
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th class="text-center">Jumla</th>
      <th clas="text-center"><?php echo number_format($totalCnZilizolipiwa, 2); ?></th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>
  </tfoot>