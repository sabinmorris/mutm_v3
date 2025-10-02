<?php
	//function to validate data
	function inp($val){
		$realValue = htmlspecialchars($val);
		$realValue = trim($realValue); //remove spaces
		$realValue = stripcslashes($realValue);
		$realValue = strip_tags($realValue);
		$realValue = addslashes($realValue); //To escape single quotes in MySQL
		return $realValue;
	}
?>