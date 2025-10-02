<?php
	$ipConnect = 'http://10.0.200.78:8881/'; //server local IP FOR PHP CONNECTION

	// $pubIP2 = 'http://102.223.7.177:8888/'; //Test server PUBLIC IP FOR JAVASCRIPT CONNECTION

	$pubIP2 = 'http://10.0.200.78:8881/'; //server local IP FOR JAVASCRIPT CONNECTION

	$pubIP = 'http://10.0.200.78:8881/'; //server local IP FOR JAVASCRIPT CONNECTION

	$locIP = 'http://10.0.200.78:8881/'; //server local IP FOR JAVASCRIPT CONNECTION

	$jsIPConnect = 'http://102.223.7.135:8881/'; //server PUBLIC IP FOR JAVASCRIPT CONNECTION

	//used for bussiness and license controller
	//$pubIP1 = 'http://10.0.200.78:6060/'; //server local IP FOR JAVASCRIPT CONNECTION
	//$locIP1 = 'http://10.0.200.78:6060/'; //server local IP FOR JAVASCRIPT CONNECTION
	//$jsIPConnect1 = 'http://102.223.7.135:6060/'; //server PUBLIC IP FOR JAVASCRIPT CONNECTION
	$pubIP1 = 'https://zcrlb.zssf.or.tz/';
	$locIP1 = 'https://zcrlb.zssf.or.tz/';
	$jsIPConnect1 = 'https://zcrlb.zssf.or.tz/';



	
	$localIp = 'http://172.18.18.20:6060/'; //server local ip for javascript connect-test
	$publicIp = 'http://172.18.18.20:6060/'; //server local ip for javascript connect-test
	$publicIPConnent = 'http://102.214.45.147:6060/'; //server PUBLIC IP FOR JAVASCRIPT CONNECTION-test


	//get user location
	$userLocation = '';
	$query = @unserialize (file_get_contents('http://ip-api.com/php/'));
	if ($query && $query['status'] == 'success') {
	  foreach ($query as $dataL) {
	  // $data . ", ";
	    $userLocation = $userLocation . ' ' . $dataL . ', ';
	  }
	  // $_SESSION['userLocation'] = $userLocation;
	}else{
		$userLocation = "";
	}

	$device = gethostbyaddr($_SERVER['REMOTE_ADDR']); //get device;

	//set timezone to africa
	date_default_timezone_set('Africa/Nairobi');
?>