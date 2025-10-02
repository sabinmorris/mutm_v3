<?php
	session_start();
	//set time zone to africa
	date_default_timezone_set('Africa/Nairobi');
	include ("../Controller/configuration.php"); //configuration file

	try {

		if (isset($_POST['reqReconc'])) {
			$reconcOpt = 1;
			$spCode = $_SESSION['SPcode']; // 'SP20008'namba ya taasisi from session;
			$spSysId = "LMUTM001"; //Service Provider System Identification Code 
			$spReconcReqId = (time()+ rand(1,1000)); //Generate unique random number

	  		$tnxDtRec = $_POST['tnxDt'];
			$tnxDt = date('Y-m-d', strtotime($tnxDtRec));//

			include ("RequestReconciliationClass.php"); //call class

			// CONVERTING RECONCILIATION INPUT TO OBJECT - JSON OBJECT 
			$myObj = new RequestReconciliationClass();
			$myObj->reconcOpt = $reconcOpt;
			$myObj->spCode = $spCode;
			$myObj->spReconcReqId = $spReconcReqId;
			$myObj->spSysId = $spSysId;
			$myObj->tnxDt = $tnxDt;

			$myJSON = json_encode($myObj);

			$api ="billReconcilliationRequest/"; //define API name
			$api_url = getServer().$api; //call get server func
			$data = postData($api_url,$myJSON); //call postData func

			//check if success
			if($data->http_code == 200){
				$receivedJson = json_decode($data->data,true);

				if ($receivedJson['ReconcStsCode'] == 7101) {
					print_r($receivedJson['ReconcStsCode'] . ' - Reconciliation Request has been sent successfully.');
				}else{

					print_r($receivedJson['ReconcStsCode'] . ' - Samahani! Maombi yako yameshindwa kutumwa. Jaribu tena.');
				}	

			}else{

			    print_r($data->http_code . ' - Samahani! Maombi yako yameshindwa kutumwa. Jaribu tena.');
			}



		}else{
			echo 'Samahani! Maombi yako yameshindwa kutumwa. Jaribu tena.';
		}

	} catch (Exception $e) {
		echo $e->getMessage(); //error generated;
	}

?>