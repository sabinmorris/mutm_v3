<?php
	session_start();
	include('../Controller/connect.php');
	$controlnumber = $_POST['controlnumber'];

	$json = file_get_contents($pubIP.'getCollectedServiceByControlNumber/'.$controlnumber); //receive json from url
	$arr = json_decode($json, true); //covert json data into array format
?>

<table class="table table-bordered table-striped small">
	<thead>
		<tr>
			<th class="text-center">#</th>
			<th class="text-center">GFS Code</th>
			<th class="text-center">Huduma</th>
			<th class="text-center">Namba ya Malipo</th>
			<th class="text-center">Benki</th>
			<th class="text-center">Kiasi</th>
		</tr>
	</thead>
	<tbody>
		<?php
          $num = 1;
          $totalAm = 0;
          foreach ($arr as $key => $value) {
          	echo '<tr>';
				echo '<td>'.$num.'</td>';
				echo '<td>'.$value['servicecode'].'</td>';
				echo '<td>'.$value['servicename'].'</td>';
				echo '<td>'.$value['accountnumber'].'</td>';
				echo '<td>'.$value['bankcode'].'</td>';
				echo '<td>TZS '.number_format($value['amount']).'.00</td>';
			echo '</tr>';
			$totalAm = $totalAm + $value['amount'];
			$num++;
          }
        ?>
        <tfoot>
            <tr>
            	<th colspan="5" class="text-right">Jumla</th>
            	<th class="">
            		TZS <?php echo number_format($totalAm); ?>.00
            	</th>
        	</tr>
        </tfoot>
	</tbody>
</table>