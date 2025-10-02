<?php
	// session_destroy ();
	if (!isset($_POST['login'])) {

		echo 'AuthErr';
	}else {
		$data = array();

		$data['username'] = $_POST['username'];
		$data['password'] = $_POST['uPwd'

		$context = json_encode($data);
		$url = 'http://192.168.70.38:8860/login';

		$result = file_get_contents($url, false, $context);

	}
?>