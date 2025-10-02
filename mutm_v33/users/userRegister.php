<?php
// echo 'hhhhh';
	session_start();//start session

  	//set time zone to africa
  	date_default_timezone_set('Africa/Nairobi');

  	try {

	  	if (isset($_POST['uReg'])) {

	  		include ("../Controller/configuration.php"); //configuration file

			include('../Controller/validateInput.php'); //function to validate input data from the user

			$firstName = inp($_POST['firstName']);
			$middleName = inp($_POST['middleName']);
			$lastName = inp($_POST['lastName']);
			$userName = inp($_POST['userName']);
			$userPhone = inp($_POST['userPhone']);
			$userRole = inp($_POST['userRole']);
			$zoneid = inp($_POST['zoneid']);
			$instituteid = inp($_POST['instituteid']);

			$eventts = "Amesajili mtumiaji mpya kwa jina la ".$userName; //get event
			$userid = $_SESSION['userid']; //get userid

			include ("UserClass.php"); //call class

			// CONVERTING USER INPUT TO OBJECT - JSON OBJECT 
			$myObj = new UserRegisterClass();
			$myObj->firstName = $firstName;
			$myObj->middleName = $middleName;
			$myObj->lastName = $lastName;
			$myObj->userName = $userName;
			$myObj->userPhone = $userPhone;
			$myObj->email = $userName;
			$myObj->userRole = $userRole;
			$myObj->zoneid = $zoneid;
			$myObj->instituteid = $instituteid;
			// $myObj->userStatus = 'active';

			$myJSON = json_encode($myObj);

			$api ='insertUsers?email='. $_SESSION['username'].'&token='.$_SESSION['logintoken']; //define API name
			$api_url = getServer().$api; //call get server func
			// // $data = postData($api_url,$myJSON, $user_email, $password);
			$data = postData($api_url,$myJSON);  //call postData func
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