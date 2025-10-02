<?php
// echo 'hhhhh';
	session_start();//start session

  	//set time zone to africa
  	date_default_timezone_set('Africa/Nairobi');

  	try {

	  	if (isset($_POST['nSChange'])) {

	  		include ("../Controller/configuration.php"); //configuration file

			include('../Controller/validateInput.php'); //function to validate input data from the user

			$username = inp($_POST['username']);

			$eventts = 'Amebadili neno la siri la mtumiaji ' . $username; //get event
			$userid = $_SESSION['userid']; //get userid

			include ("NenoSiriClass.php"); //call class

			// CONVERTING USER INPUT TO OBJECT - JSON OBJECT 
			$myObj = new NenoSiriClass();
			$myObj->username = $username;
			// $myObj->userStatus = 'active';

			$myJSON = json_encode($myObj);

			// $api ='selectUsersByEmail/'.$username.'?email='. $_SESSION['username'].'&token='.$_SESSION['logintoken']; //define API name
			$api ='selectUsersByEmail/'.$username;
			$api_url = getServer().$api; //call get server func
			// // $data = postData($api_url,$myJSON, $user_email, $password);
			$data = getData($api_url);  //call postData func
			// echo $data->http_code;

			//check if success
			if($data->http_code == 200){
				$receivedJson = json_decode($data->data,true);
				// $receivedArray = $receivedJson['data'];

				//insert into log

				// CONVERTING USER INPUT TO OBJECT - JSON OBJECT 
				$myObjL = new InsertLogClass();
				include('insertIntoLog.php');

				echo 'success';   //display response
			}else{
			    echo 'Error code: ' . $data->http_code.' - '. $data->data_err.'. System Error Please try again later';
			}
			// echo 'success';


		}else{
			echo 'Sorry! Form data not posted';
		}
	
	} catch (Exception $e) {
		echo $e->getMessage(); //error generated;
	}
?>