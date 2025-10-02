<?php
	session_start();
	//set time zone to africa
  	date_default_timezone_set('Africa/Nairobi');
	include('../Controller/connect.php');

	if (isset($_POST['cancelCn'])) {
		$arr = array();
		$arr['requestDate'] = date('Y-m-d H:m:s');
		$arr['institutionCode'] = +$_POST['instcode'];
		$arr['controlNumber'] = $_POST['controlnumber'];
		$arr['referenceNumber'] = $_POST['referencenumber'];
		$arr['cancelationReason'] = $_POST['cancelationReason'];
	}else{
		echo 'Error Occured. Try again';
	}

	$output = json_encode($arr);
	//echo $output;
	//die();

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  // CURLOPT_URL => 'http://102.223.7.37:8900/message-api/zanmalipo/message/',
	  CURLOPT_URL => $pubIP.'receiveControlNumberCancellationRequest/',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>$output,
	  CURLOPT_HTTPHEADER => array(
		'content-type: application/json'
		// ,
		// 'x-zanmalipo-msg-name: CONTROL_NUMBER_CANCELATION',
		// 'x-zanmalipo-callback-url: '.$ipConnect.'/mutm/controlnumber/cancelationResponse',
		// 'x-zanmalipo-integrating-code: '.$_SESSION['intergratingcode']
	  ),
	));

	$response = curl_exec($curl);
	if($e = curl_error($curl)){
		echo $e;
	}else{
		//echo "great";
		$decode = json_decode($response);
		$msg = $decode->statusMessage;
		$code = $decode->statusCode;

		if ($msg == 'Success' AND $code == 5000) {

			//insert into log
			$insertLog = array();

			$insertLog['device'] = gethostbyaddr($_SERVER['REMOTE_ADDR']); //get device
			$insertLog['eventts'] = "Amehairisha namba ya malipo yenye kumbukumbu no. ".$arr['referenceNumber']; //get event
			
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

			$jsonlg = json_encode($insertLog); //convert arry into json

			$curl3lg = curl_init();
			curl_setopt_array($curl3lg, array(
			  CURLOPT_URL => $pubIP.'insertLog/',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>$jsonlg,
			  CURLOPT_HTTPHEADER => array(
				'content-type: application/json'
			  ),
			));

			$response3lg = curl_exec($curl3lg);
			curl_close($curl3lg);

			echo 'success';
		}else{
			echo 'failed';
		}	
	}
	curl_close($curl);
	echo $response;
?>