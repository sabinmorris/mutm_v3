<?php
	// session_destroy();
	session_start();
	include('../Controller/connect.php');
	if (!isset($_POST['login'])) {
		echo 'authErr';
	}else{
		//receive variable
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$instcode = $_POST['instcode'];
		$instituteid = $_POST['instituteid'];
		$instname = $_POST['instname'];
		$urole = $_POST['urole'];
		$username = $_POST['username'];
		$zoneid = $_POST['zoneid'];
		$userid = $_POST['userid'];
		$insttype = $_POST['insttype'];
		$intergratingcode = $_POST['intergratingcode'];
		$logintoken = $_POST['logintoken'];

		//create sessions var
		$_SESSION['userid'] = $userid;
		$_SESSION['fullname'] = $firstname . ' ' . $lastname;
		$_SESSION['instcode'] = $instcode;
		$_SESSION['instituteid'] = $instituteid;
		$_SESSION['instname'] = $instname;
		$_SESSION['urole'] = $urole;
		$_SESSION['username'] = $username;
		$_SESSION['zoneid'] = $zoneid;
		$_SESSION['insttype'] = $insttype;
		$_SESSION['intergratingcode'] = $intergratingcode;
		$_SESSION['logintoken'] = $logintoken;

		//set session to check if user login or not
		$_SESSION['log'] = 'in';

		//INSERT INTO LOG
		$insertLog = array();

		$insertLog['device'] = gethostbyaddr($_SERVER['REMOTE_ADDR']); //get device
		$insertLog['eventts'] = "ameingia katika mfumo"; //get event
		$insertLog['userid'] = $userid; //get userid

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

		$json5 = json_encode($insertLog); //convert arry into json

		$curl5 = curl_init();
		curl_setopt_array($curl5, array(
		  CURLOPT_URL => $ipConnect.'/insertLog?email='. $_SESSION['username'].'&token='.$_SESSION['logintoken'],
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>$json5,
		  CURLOPT_HTTPHEADER => array(
			'content-type: application/json'
		  ),
		));

		$response5 = curl_exec($curl5);
		curl_close($curl5);

		echo 'success';
	}
?>
