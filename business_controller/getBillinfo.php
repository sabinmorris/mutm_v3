<?php
session_start();
include('../Controller/connect.php');
$bussid = $_POST['bussid'];
//$publicIPConnect
$json = file_get_contents($pubIP1 . 'mutm/api/getBillItemByBussid/' . $bussid); //receive json from url
$arr = json_decode($json, true); //covert json data into array format
?>

<table class="table table-bordered table-striped small">
	<thead>
		<tr>
			<th class="text-center">#</th>
			<th class="text-center">Description</th>
			<th class="text-center">Aina ya Malipo</th>
			<th class="text-center">Kiasi cha Form</th>
			<th class="text-center">Kiasi cha Ukaguzi</th>
			<th class="text-center">Kiasi cha Jumla</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$num = 1;
		$totalAm = 0;
		foreach ($arr as $key => $value) {
			echo '<tr>';
			echo '<td>' . $num . '</td>';
			echo '<td>' . $value['description'] . '</td>';
			echo '<td>' . $value['billtype'] . '</td>';
			echo '<td>' . $value['formamount'] . '</td>';
			echo '<td>' . $value['inspectionamount'] . '</td>';
			echo '<td>' . number_format($value['amount'], 2) . ' TZS</td>';
			echo '</tr>';
			$totalAm = $totalAm + $value['amount'];
			$num++;
		}
		?>
	<tfoot>
		<tr>
			<?php

			echo '<th colspan="5" class="text-right">Jumla yote</th>';

			?>
			<th class="">
				<?php echo number_format($totalAm, 2); ?> TZS
			</th>
		</tr>
	</tfoot>

	</tbody>
</table>