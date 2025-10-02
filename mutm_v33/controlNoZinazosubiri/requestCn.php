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
	$phoneNumber = $_POST['phoneNumber'];
	$arrcurrency = 'TZS';
	$arrpaymentType = 'EXACT';
	$arrrequestDate = date('Y-m-d H:m:s');
	$ref1 = substr(sha1(time()), 0, 9);
	$ref2 = substr(md5(time()), 0, 9);
	$newRef = $_POST['referencenumber'];
	$referenceNumber = $newRef;
	$institutionCode = $_SESSION['instcode'];
	$totalAmount = $_POST['sumT'];

	//GENERATE RANDOM NUMBER FOR BILL GEN
	function mt_rand_str ($l, $c = 'abcdefghijklmnopqrstuvwxyz1234567890') {
	    for ($s = '', $cl = strlen($c)-1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i);
	    return $s;
	}

	$rand1 = mt_rand_str(8); // Something like mp2tmpsw
	$rand2 = mt_rand_str(6, '0123456789ABCDEFGHIGKLZ'); // Something like B9CD0F
	$rand3 = mt_rand_str(6, '0123456789MNOPQRSTVUWXY'); // Something like N9TM0Q
	$billGenRef = $rand1.$rand2.$rand3;

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
	// $arrBTrxInf['subSpCode'] = '1001';
	$arrBTrxInf['subSpCode'] = '1002'; //namba ya taasisi from session
	// $arrBTrxInf['spSysId'] = 'TAMISEMI'; //jina la taasisi from session
	$arrBTrxInf['spSysId'] = 'LMUTM001'; //jina la taasisi from session
	$arrBTrxInf['billAmt'] = $_POST['sumT'];
	$arrBTrxInf['miscAmt'] = 0;

	//find expire date
	$curDate = date('Y-m-d H:i:s');//
    $exprDate = date("Y-m-d H:i:s", strtotime ('+1 month' , strtotime ($curDate)));
	$arrBTrxInf['billExprDt'] = gmdate("Y-m-d\TH:i:s", strtotime($exprDate));;

	$arrBTrxInf['pyrId'] = $_POST['payerIdentificationNumber'];
	$arrBTrxInf['pyrName'] = $_POST['fullName'];
	$arrBTrxInf['billDesc'] = $_SESSION['instname'];
	$arrBTrxInf['billGenDt'] = gmdate("Y-m-d\TH:i:s", strtotime($curDate));
	$arrBTrxInf['billGenBy'] = $_SESSION['userid'].'-'.$billGenRef;
	$arrBTrxInf['billApprBy'] = $_SESSION['userid'];
	$arrBTrxInf['pyrCellNum'] = $_POST['phoneNumber'];
	$arrBTrxInf['pyrEmail'] = $_POST['email'];
	$arrBTrxInf['ccy'] = 'TZS';
	$arrBTrxInf['billEqvAmt'] = $_POST['sumT'];
	$arrBTrxInf['remFlag'] = true;
	$arrBTrxInf['billPayOpt'] = 3;

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
	$api ="receiveControlNumberRequestResend/"; //define API name
	$api_url = getServer().$api; //call get server func
	$data = postData($api_url,$output);  //call postData func

	//check if success
	if($data->http_code == 200){
		$receivedJson = json_decode($data->data,true);
		unset($_SESSION["shopping_cart"]);// clear bills session
		print_r($receivedJson['TrxStsCode']);

	}else{

	    // print_r($output);
	    print_r($data->http_code . ' - Samahani! Ombi halijakamilika. Jaribu tena.');
	}

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
