<?php
	$myObjL->device = $device; //get device
	$myObjL->eventts = $eventts; //get event
	$myObjL->location = $userLocation; //get location
	$myObjL->userid = $userid; //get userid
	// $myObj->userStatus = 'active';

	$myJSONL = json_encode($myObjL);

	$apiL ='insertLog?email='. $_SESSION['username'].'&token='.$_SESSION['logintoken']; //define API name

	$api_urlL = getServer().$apiL; //call get server func

	$dataL = postData($api_urlL,$myJSONL);  //call postData func
?>