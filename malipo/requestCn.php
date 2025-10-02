<?php
	session_start();
	// include('../Controller/connect.php');
	include ("../Controller/configuration.php"); //configuration file
	include('billService.php');
	include('controlNumbers.php');

	// *** OLD INPUTS ***

	$fullName = $_POST['fullName'];
	$email = $_POST['email'];
	$payerIdentificationNumber = $_POST['payerIdentificationNumber'];
	$phoneNumber = '255'.$_POST['phoneNumber'];
	$arrcurrency = 'TZS';
	$arrpaymentType = 'EXACT';
	$arrrequestDate = date('Y-m-d H:m:s');
	$ltsidn = $_POST['ltsid'];
	// $ref1 = substr(sha1(time()), 0, 9);
	// $ref2 = substr(md5(time()), 0, 9);
	$ref1 = substr(sha1(time()), 0, 4);
	$ref2 = substr(md5(time()), 0, 4);

	//GENERATE RANDOM NUMBER FOR BILL GEN
	function mt_rand_str ($l, $c = 'abcdefghijklmnopqrstuvwxyz1234567890') {
	    for ($s = '', $cl = strlen($c)-1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i);
	    return $s;
	}

	$rand1 = mt_rand_str(8); // Something like mp2tmpsw
	$rand2 = mt_rand_str(6, '0123456789ABCDEFGHIGKLZ'); // Something like B9CD0F
	$rand3 = mt_rand_str(6, '0123456789MNOPQRSTVUWXY'); // Something like N9TM0Q
	$billGenRef = $rand1.$rand2.$rand3;

	$newRef = $_SESSION['userid'].'-MUTM-'.$ref1.'-'.$ltsidn.'-'.$rand3;
	$referenceNumber = $newRef;
	$institutionCode = $_SESSION['instcode'];
	$totalAmount = $_POST['sumT'];


	// *** OLD INPUTS END ***

	//*** new field BillHdr ***

	$arrBHdr = array();
	// $arrBHdr['spCode'] = 'SP20008';
	$arrBHdr['spCode'] = $_SESSION['SPcode'];
	$arrBHdr['rtrRespFlg'] = true;

	//*** new field end BillHdr***

	//*** new field BillTrxInf ***

	$arrBTrxInf = array();
	$arrBTrxInf['billId'] = $newRef;
	$arrBTrxInf['subSpCode'] = $_SESSION['subSPcode'];
	// $arrBTrxInf['subSpCode'] = '1002';
	// $arrBTrxInf['subSpCode'] = '1001'; //namba ya taasisi from session
	// $arrBTrxInf['spSysId'] = 'TAMISEMI'; //jina la taasisi from session
	$arrBTrxInf['spSysId'] = 'LMUTM001'; //jina la taasisi from session
	// $arrBTrxInf['spSysId'] = $_SESSION['instname']; //jina la taasisi from session
	$arrBTrxInf['billAmt'] = $_POST['sumT'];
	$arrBTrxInf['miscAmt'] = 0;

	//find expire date
	//set timezone to africa
	date_default_timezone_set('Africa/Nairobi');
	
	$curDate = date('Y-m-d H:i:s');//
    $exprDate = date("Y-m-d H:i:s", strtotime ('+1 month' , strtotime ($curDate)));
	$arrBTrxInf['billExprDt'] = gmdate("Y-m-d\TH:i:s", strtotime($exprDate));;

	$arrBTrxInf['pyrId'] = $_POST['payerIdentificationNumber'];
	$arrBTrxInf['pyrName'] = $_POST['fullName'];
	$arrBTrxInf['billDesc'] = $_SESSION['instname'];
	$arrBTrxInf['billGenDt'] = gmdate("Y-m-d\TH:i:s", strtotime($curDate));
	$arrBTrxInf['billGenBy'] = $_SESSION['userid'].'-'.$billGenRef;
	$arrBTrxInf['billApprBy'] = $_SESSION['userid'];
	$arrBTrxInf['pyrCellNum'] = '255'.$_POST['phoneNumber'];
	$arrBTrxInf['pyrEmail'] = $_POST['email'];
	$arrBTrxInf['ccy'] = 'TZS';
	$arrBTrxInf['billEqvAmt'] = $_POST['sumT'];
	$arrBTrxInf['remFlag'] = true;
	$arrBTrxInf['billPayOpt'] = 3;  //means exact bill

	//*** new field end BillTrxInf ***

	//*** new field end billItem ***

	// print_r($arr);
	if(!empty($_SESSION["shopping_cart"])){
		$total = 0;
		$newArray = array();
		foreach($_SESSION["shopping_cart"] as $keys => $values){
			$arr2 = array();

			//find ref no for each item
			$ref1 = substr(md5(time()), 0, 5);
			$ref2 = substr(sha1(time()), 0, 5);
			$billItemRef0 = $values["ltsIdChk"].'-'.$ref1.$ref2;
			$billItemRef1 = unique_code_generator();
			$billItemRef2 = randomGen(0,10,6);//not used
			$billItemRef3 = 420 .rand(25,50) .rand(100,1000) .rand(1000,10000) ;
			$billItemRef4 = $billItemRef0 . $billItemRef1 . $billItemRef3;

			$arr2['billItemRef'] = $billItemRef4;
			$arr2['useItemRefOnPay'] = "N";
			$arr2['billItemAmt'] = $values["kiasi"];
			$arr2['billItemEqvAmt'] = $values["kiasi"];
			$arr2['billItemMiscAmt'] = 0;
			$arr2['gfsCode'] = $values["huduma"];
			// $arr2['gfsCode'] = '300103'; //tuipate wakati wa kuchagua service

			$bs = new billService();
			$bs->billItemRef = $arr2['billItemRef'];
			$bs->useItemRefOnPay = $arr2['useItemRefOnPay'];
			$bs->billItemAmt = (integer)$arr2['billItemAmt'];
			$bs->billItemEqvAmt = (integer)$arr2['billItemEqvAmt'];
			$bs->billItemMiscAmt = (integer)$arr2['billItemMiscAmt'];
			$bs->gfsCode = $arr2['gfsCode'];
			$newArray[] = $bs;
		}

	}

	//*** new field end billItem ***

	//*** new field billItems ***
	$arrBItems = array();
	$arrBItems['billItem'] = $newArray;
	//*** new field end billItems***

	$arrBTrxInf['billItems'] = $arrBItems;

	$cn = new controlNumbers();
	$cn->billHdr = $arrBHdr;
	$cn->billTrxInf = $arrBTrxInf;

	$output = json_encode($cn);

	//......................................//
	$api ="receiveControlNumberRequest/"; //define API name
	$api_url = getServer().$api; //call get server func
	// $data = postData($api_url,$myJSON, $user_email, $password);
	$data = postData($api_url,$output);  //call postData func

	//check if success
	if($data->http_code == 200){
		$receivedJson = json_decode($data->data,true);
		// $receivedArray = $receivedJson['data'];

		// $fullname = $receivedArray["fullname"];
		// $employeeNumber = $receivedArray["employeeNumber"];
		// echo $data->data;   //display response
		unset($_SESSION["shopping_cart"]);// clear bills session
		// echo 'success';   //display response
		// echo $output;
		// echo $data->data; //show response
		// echo $data->http_code.' - '. $data->data_err;

		// $decode = json_decode($data->data);
		// $msg = $decode->ack;
		// print_r($output);//
		print_r($receivedJson['TrxStsCode']);

	}else{
	    // echo 'Error code: ' . $data->http_code.' - '. $data->data_err.'. Maombi ya namba ya ankara hayakufanikiwa!';

	    print_r($data->http_code . ' - Samahani! Ombi halijakamilika. Jaribu tena.');
	}
	//......................................//

	// echo $output;  //print jSon result		

	// //to send control number to zan malipo
	// $curl = curl_init();
	// curl_setopt_array($curl, array(
	//   // CURLOPT_URL => 'http://102.223.7.36:8900/message-api/zanmalipo/message/',
	//   CURLOPT_URL => 'http://102.223.7.177:8888/receiveControlNumberRequest/',
	//   CURLOPT_RETURNTRANSFER => true,
	//   CURLOPT_ENCODING => '',
	//   CURLOPT_MAXREDIRS => 10,
	//   CURLOPT_TIMEOUT => 0,
	//   CURLOPT_FOLLOWLOCATION => true,
	//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	//   CURLOPT_CUSTOMREQUEST => 'POST',
	//   CURLOPT_POSTFIELDS =>$output,
	//   CURLOPT_HTTPHEADER => array(
	// 	'content-type: application/json'
	// 	// ,
	// 	// 'x-zanmalipo-msg-name: CONTROL_NUMBER_REQUEST',
	// 	// 'x-zanmalipo-callback-url: http://102.223.7.135:8888/controlnumberResponse/',
	// 	// 'x-zanmalipo-integrating-code: '.$_SESSION['intergratingcode']
	//   ),
	// ));


	// $response = curl_exec($curl);
	// if($e = curl_error($curl)){
	// 	echo 'Error Occured: '.$e;
	// }else{
	// 	//echo "great";
	// 	$decode = json_decode($response);
	// 	$msg = $decode->statusMessage;
	// 	$code = $decode->statusCode;

	// 	// if ($msg == 'Success' AND $code == 5000) {

	// 	// 	unset($_SESSION["shopping_cart"]);// clear bills session
	// 	// 	// echo 'success';
	// 	// 	echo $response;
	// 	// 	// $test =  print_r($arr);
	// 	// 	// echo $test;
	// 	// }else{
	// 		// echo 'failed';
	// 		// echo $output;
	// 		echo 'MESSAGE STATUS: '.$msg;
	// 	// }
	// }
	// curl_close($curl);


	// *** Functions to generate references numbers **

	function unique_code_generator($prefix='',$post_fix=''){
        $t=time();
        return ( rand(000,111).$prefix.$t.$post_fix);
    }

    function randomGen($min, $max, $quantity) {
	    $numbers = range($min, $max);
	    shuffle($numbers);
	    return array_slice($numbers, 0, $quantity);
	}

	// *** Functions to generate references numbers End**

?>
