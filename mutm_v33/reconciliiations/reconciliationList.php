<thead>
  <tr>
    <th>#</th>
    <th>Tarehe</th>
    <th>billid</th>
    <th>psptrxid</th>
    <th>pspcode</th>
    <th>pspname</th>
    <th>RefNo</th>
    <th>Jina</th>
    <th>Simu</th>
    <th>Baruapepe</th>
    <th>AnkaraNam</th>
    <th>Kiasi</th>
    <th>usdpaychannel</th>
  </tr>
  </thead>
  <tbody>
    <?php
      $num = 1;
      foreach ($arr as $key => $value) {
        echo '<tr>';
          echo '<td>'.$num.'</td>';
          echo '<td>'.date("d-m-Y", strtotime($value['transactiondatetime'])).'</td>';
          echo '<td>'.$value['billid'].'</td>';
          echo '<td>'.$value['psptrxid'].'</td>';
          echo '<td>'.$value['pspcode'].'</td>';
          echo '<td>'.$value['pspname'].'</td>';
          echo '<td>'.$value['paymentreferencenumber'].'</td>';
          echo '<td>'.$value['fullname'].'</td>';
          echo '<td>'.$value['phonenumber'].'</td>';
          echo '<td>'.$value['email'].'</td>';
          echo '<td>'.$value['controlnumber'].'</td>';
          echo '<td>'.number_format($value['totalamount'], 2).'</td>';
          echo '<td>'.$value['usdpaychannel'].'</td>';
        echo '</tr>';

        $num++;
      }
    ?>
  </tbody>
  <tfoot>
    <tr>
      <th>#</th>
      <th>Tarehe</th>
      <th>billid</th>
      <th>psptrxid</th>
      <th>pspcode</th>
      <th>pspname</th>
      <th>RefNo</th>
      <th>Jina</th>
      <th>Simu</th>
      <th>Baruapepe</th>
      <th>AnkaraNam</th>
      <th>Kiasi</th>
      <th>usdpaychannel</th>
    </tr>
  </tfoot>