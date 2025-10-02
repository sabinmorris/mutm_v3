<?php
	session_start();

	$_SESSION['controlnumber'] = $_POST["controlnumber"];
	echo 'success';
?>