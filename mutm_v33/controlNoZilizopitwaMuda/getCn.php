<?php
	session_start();
	include('../Controller/connect.php');
	$controlnumber = $_POST['controlnumber'];
	$referencenumber = $_POST['referencenumber'];

	$fstchar = $controlnumber[0]; //GET FIRST CHARACTER OF CONTROL NUMBER

	if ($fstchar == 8) {
		//get old zanmalipo controlno services
		$json = file_get_contents($pubIP.'getCollectedServiceByControlNumber/'.$controlnumber); //receive json from url
	}else{
		//get new zanmalipo controlno services
		$json = file_get_contents($pubIP.'getCollectedServiceByBillId/'.$referencenumber); //receive json from url
	}

	
	$arr = json_decode($json, true); //covert json data into array format
?>

<table class="table table-bordered table-striped small">
	<thead>
		<tr>
			<th class="text-center">#</th>
			<th class="text-center">GFS Code</th>
			<th class="text-center">Huduma</th>
			<?php
				if ($fstchar == 8) {
                    echo '<th class="text-center">Namba ya Malipo</th>';
					echo '<th class="text-center">Benki</th>';
                }
			?>
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
				echo '<td>';
					if ($fstchar == 8) {
                        echo $value['servicename'];
                    }else{
                        echo $value['ltsname'];
                    }
				echo '</td>';

				if ($fstchar == 8) {
                    echo '<td>'.$value['accountnumber'].'</td>';
					echo '<td>'.$value['bankcode'].'</td>';
                }
				
				echo '<td>'.number_format($value['amount'], 2).' TZS</td>';
			echo '</tr>';
			$totalAm = $totalAm + $value['amount'];
			$num++;
          }
        ?>
        <tfoot>
            <tr>
            	<?php
					if ($fstchar == 8) {
	                    echo '<th colspan="5" class="text-right">Jumla</th>';
	                }else{
	                	echo '<th colspan="3" class="text-right">Jumla</th>';
	                }
				?>
            	<th class="">
            		<?php echo number_format($totalAm, 2); ?> TZS
            	</th>
        	</tr>
        </tfoot>
	</tbody>
</table>