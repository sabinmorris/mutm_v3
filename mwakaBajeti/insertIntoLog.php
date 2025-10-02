<?php
	session_start();
	include('../Controller/connect.php');

	//INSERT INTO LOG
		$insertLog = array();

		$insertLog['device'] = gethostbyaddr($_SERVER['REMOTE_ADDR']); //get device
		if (isset($_POST['act'])) {
			if ($_POST['act'] == 'insertLog') {
				$insertLog['eventts'] = "Amesajili mwaka mpya wa bajeti wa " . $_POST['startdate'] . " / " . $_POST['enddate']; //get event
			}elseif ($_POST['act'] == 'updateLog') {
				$insertLog['eventts'] = "Amebadilisha Taarifa za mwaka wa bajeti  wa ". $_POST['startdate'] . " / " . $_POST['enddate']; //get event
			}else{
				$insertLog['eventts'] = "Amefuta mwaka wa bajeti wa ". $_POST['startdate'] . " / " . $_POST['enddate']; //get event
			}
		}
		
		$insertLog['userid'] = $_SESSION['userid']; //get userid

			//get user location
			$userLocation = '';
			$query = @unserialize (file_get_contents('http://ip-api.com/php/'));
			if ($query && $query['status'] == 'success') {
			  foreach ($query as $data) {
			  // $data . ", ";
			    $insertLog['location'] = $userLocation . ' ' . $data . ', ';
			  }
			  // $_SESSION['userLocation'] = $userLocation;
			}else{
				$insertLog['location'] = "";
			}

		$json = json_encode($insertLog); //convert arry into json

		$curl3 = curl_init();
		curl_setopt_array($curl3, array(
		  CURLOPT_URL => $pubIP.'insertLog?email='. $_SESSION['username'].'&token='.$_SESSION['logintoken'],
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>$json,
		  CURLOPT_HTTPHEADER => array(
			'content-type: application/json'
		  ),
		));

		$response3 = curl_exec($curl3);
		curl_close($curl3);
		echo 'success';
?>