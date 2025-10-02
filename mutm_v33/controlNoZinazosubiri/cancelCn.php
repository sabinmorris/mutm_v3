<?php
	session_start();
	//set time zone to africa
  	date_default_timezone_set('Africa/Nairobi');
	// include('../Controller/connect.php');
	include ("../Controller/configuration.php"); //configuration file
	try {

		if (isset($_POST['cancelCn'])) {
			// $arr = array();
			$requestDatespSysId = date('Y-m-d H:m:s');
			// $spCode = 'SP20008';
			// $spSysId = 'TAMISEMI';
			$spCode = $_SESSION['SPcode'];
			$spSysId = 'LMUTM001';
			$controlNumber = $_POST['controlnumber'];
			$billId = $_POST['referencenumber'];
			$canclReasn = $_POST['cancelationReason'];

			include ("cancelCNClass.php"); //call class

			// CONVERTING input INPUT TO OBJECT - JSON OBJECT 
			$myObj = new CNCancelClass();
			$myObj->spCode = $spCode;
			$myObj->spSysId = $spSysId;
			$myObj->billId = $billId;
			$myObj->canclReasn = $canclReasn;

			$myJSON = json_encode($myObj);

			$api ="receiveControlNumberCancellationRequest"; //define API name with parameter

			$api_url = getServer().$api; //call get server func

			$data = postData($api_url,$myJSON);  //call postData func

			//check if success
			if($data->http_code == 200){
				$receivedJson = json_decode($data->data,true);

				// echo 'success';   //display response
				print_r($receivedJson['TrxStsCode']);
			}else{
			    print_r($receivedJson['TrxStsCode'] . ' - Samahani!  Ankara namba '.$controlNumber.' imeshindwa kuhairishwa. Jaribu tena.');
			}


		}else{
			echo 'Error Occured. Try again';
		}

	} catch (Exception $e) {
		echo $e->getMessage(); //error generated;
	}

	
?>