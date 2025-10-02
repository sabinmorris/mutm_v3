<?php
	session_start();//start session

  	//set time zone to africa
  	date_default_timezone_set('Africa/Nairobi');

  	try {

	  	if (isset($_POST['uLogin'])) {

	  		include ("../Controller/configuration.php"); //configuration file
	  		// include('../Controller/connect.php');
			include('../Controller/validateInput.php'); //function to validate input data from the user

			$username = inp($_POST['username']);
			$password = inp($_POST['uPwd']);

			$eventts = "ameingia katika mfumo"; //get event
			// $userid = $_SESSION['userid']; //get userid

			include ("LoginClass.php"); //call class

			// CONVERTING USER INPUT TO OBJECT - JSON OBJECT 
			$myObj = new LoginClass();
			$myObj->username = $username;
			$myObj->password = $password;
			// $myObj->userStatus = 'active';

			$myJSON = json_encode($myObj);

			$api ='login'; //define API name
			$api_url = getServer().$api; //call get server func

			//to send response to our database
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $api_url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>$myJSON,
			  CURLOPT_HTTPHEADER => array(
				'content-type: application/json'
			  ),
			));

			$response = curl_exec($curl);
			curl_close($curl);
		//	echo $response;
			$DATA = json_decode($response,true);
			//print_r($DATA);
			if(is_iterable($DATA)){ //used to make data in array format
			foreach ($DATA as $key => $receivedJson) {
				// echo $value['userid'];
				$_SESSION['userid'] = $receivedJson['userid'];
				$_SESSION['fullname'] = $receivedJson['firstname'] . ' ' . $receivedJson['lastname'];
				$_SESSION['instcode'] = $receivedJson['instcode'];
				$_SESSION['instituteid'] = $receivedJson['instituteid'];
				$_SESSION['instname'] = $receivedJson['instname'];
				$_SESSION['urole'] = $receivedJson['urole'];
				$_SESSION['username'] = $receivedJson['username'];
				$_SESSION['zoneid'] = $receivedJson['zoneid'];
				$_SESSION['insttype'] = $receivedJson['insttype'];
				$_SESSION['intergratingcode'] = $receivedJson['intergratingcode'];
				$_SESSION['SPcode'] = $receivedJson['spcode'];
				$_SESSION['subSPcode'] = $receivedJson['subspcode'];
				$_SESSION['zonename'] = $receivedJson['zonename'];
				$_SESSION['logintoken'] = $receivedJson['logintoken'];
				$_SESSION['ustatus'] = $receivedJson['ustatus'];

				//set session to check if user login or not
				$_SESSION['log'] = 'in';
				# code...
			}
		}else{
			
		}

				if (!empty($_SESSION['userid']) AND $_SESSION['ustatus'] == 'active') {
					echo 'success'; //locate to dashboard
				}else{
					echo 'Invalid username or password1';   //display response
				}


		}else{
			echo 'Sorry! Form data not posted';
		}
	
	} catch (Exception $e) {
		echo $e->getMessage(); //error generated;
	}
?>