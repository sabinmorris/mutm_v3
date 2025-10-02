<?php
	session_start();
	include('../Controller/connect.php');
	include ("../Controller/configuration.php"); //configuration file
	$ltsId = $_POST["id"];
	$ltsQty = $_POST["ltsQty"];
	//echo "test";

	if (isset($_POST['noCondition'])) {
		// hakikisha kilichoingizwa ni idadi au kiasi
		$chkIdadiKiasi = $_POST["chkIdadiKiasi"];
		//find bills service start
		$json = file_get_contents($pubIP.'selectBillServiceById/'.$ltsId); //receive json from url
	    $arr = json_decode($json, true); //covert json data into array format

	    if ($chkIdadiKiasi == 'Idadi') {
	    	// if kwa idadi
	    	if(isset($_SESSION["shopping_cart"])){

				$item_array_id = array_column($_SESSION["shopping_cart"], "huduma");
	 
				if(!array_search($_POST["id"], $_SESSION["shopping_cart"])){
					$count = count($_SESSION["shopping_cart"]);

					foreach ($arr as $key => $value) {
						$item_array = array(
							// 'num' => 1,
							'huduma' =>	$value["gfscode"],
							'ainaHuduma' =>	$value["ltsname"],
							'kiasi'	=>	$value['ltsprice'] * $ltsQty,
							'benki'	=>	$value['bankcode'],
							'namMalipo'	=>	$value['accnum'],
							'ltsIdChk' =>	$_POST["id"]
						);
					}
					$_SESSION["shopping_cart"][$count] = $item_array;
				}
				else{
					echo '<script>alert("Samahani! Huduma imeshachaguliwa")</script>';
				}

			}else{
				// //if shopping_cart session not started
				// $json = file_get_contents($ipConnect.'/selectBillServiceById/'.$_POST["id"]); //receive json from url
		  //       $arr = json_decode($json, true); //covert json data into array format

				foreach ($arr as $key => $value) {
					$item_array = array(
						// 'num' => 1,
						'huduma' =>	$value["gfscode"],
						'ainaHuduma' =>	$value["ltsname"],
						'kiasi'	=>	$value['ltsprice'] * $ltsQty,
						'benki'	=>	$value['bankcode'],
						'namMalipo'	=>	$value['accnum'],
						'ltsIdChk' =>	$_POST["id"]
						// 'ainaMalipo' =>	'FULLY'
					);
				}
				$_SESSION["shopping_cart"][0] = $item_array;
			}
	    	//find bills end

	    }else{
	    	//if kwa kiasi
	    	if(isset($_SESSION["shopping_cart"])){

				$item_array_id = array_column($_SESSION["shopping_cart"], "huduma");
	 
				if(!array_search($_POST["id"], $_SESSION["shopping_cart"])){
					$count = count($_SESSION["shopping_cart"]);

					foreach ($arr as $key => $value) {
						$item_array = array(
							// 'num' => 1,
							'huduma' =>	$value["gfscode"],
							'ainaHuduma' =>	$value["ltsname"],
							'kiasi'	=>	$ltsQty,
							'benki'	=>	$value['bankcode'],
							'namMalipo'	=>	$value['accnum'],
							'ltsIdChk' =>	$_POST["id"]
						);
					}
					$_SESSION["shopping_cart"][$count] = $item_array;
				}
				else{
					echo '<script>alert("Samahani! Huduma imeshachaguliwa")</script>';
				}

			}else{
				// //if shopping_cart session not started
				// $json = file_get_contents($ipConnect.'/selectBillServiceById/'.$_POST["id"]); //receive json from url
		  //       $arr = json_decode($json, true); //covert json data into array format

				foreach ($arr as $key => $value) {
					$item_array = array(
						// 'num' => 1,
						'huduma' =>	$value["gfscode"],
						'ainaHuduma' =>	$value["ltsname"],
						'kiasi'	=>	$ltsQty,
						'benki'	=>	$value['bankcode'],
						'namMalipo'	=>	$value['accnum'],
						'ltsIdChk' =>	$_POST["id"]
						// 'ainaMalipo' =>	'FULLY'
					);
				}
				$_SESSION["shopping_cart"][0] = $item_array;
			}
	    	//find bills end

	    }

		
	}else{
		//find scondition in little source

		$api ='selectLittlesourceById/'.$ltsId; //define API name

      	$api_url = getServer().$api; //call get server func

      	$res = getData($api_url);  //call getData func

      	//check if success
      	if($res->http_code == 200){
        	$output = json_decode($res->data); //covert json data into array format

        	//get results
        	$scodition = $output->scondition;
	   		$ltsprice = $output->ltsprice;

      	}else{
      		echo 'No data';
      	}

	    if ($scodition == 'I') {
	    	echo 'isCondition';
	    }elseif($ltsprice == 0){
	    	echo 'setPrice';
	    }else{

	    	//find bills service start
			$json = file_get_contents($pubIP.'selectBillServiceById/'.$ltsId); //receive json from url
		    $arr = json_decode($json, true); //covert json data into array format

			if(isset($_SESSION["shopping_cart"])){

				$item_array_id = array_column($_SESSION["shopping_cart"], "huduma");

				if(!in_array($_POST["id"], $item_array_id)){
					$count = count($_SESSION["shopping_cart"]);

					foreach ($arr as $key => $value) {
						$item_array = array(
							// 'num' => 1,
							'huduma' =>	$value["gfscode"],
							'ainaHuduma' =>	$value["ltsname"],
							'kiasi'	=>	$value['ltsprice'] * $ltsQty,
							'benki'	=>	$value['bankcode'],
							'namMalipo'	=>	$value['accnum'],
							'ltsIdChk' =>	$_POST["id"]
							// 'ainaMalipo' =>	'FULLY'
						);
					}
					$_SESSION["shopping_cart"][$count] = $item_array;
				}
				else{
					echo '<script>alert("Samahani! Huduma imeshachaguliwa")</script>';
				}

			}else{
				// //if shopping_cart session not started
				// $json = file_get_contents($ipConnect.'/selectBillServiceById/'.$_POST["id"]); //receive json from url
		  //       $arr = json_decode($json, true); //covert json data into array format

				foreach ($arr as $key => $value) {
					$item_array = array(
						// 'num' => 1,
						'huduma' =>	$value["gfscode"],
						'ainaHuduma' =>	$value["ltsname"],
						'kiasi'	=>	$value['ltsprice'] * $ltsQty,
						'benki'	=>	$value['bankcode'],
						'namMalipo'	=>	$value['accnum'],
						'ltsIdChk' =>	$_POST["id"]
						// 'ainaMalipo' =>	'FULLY'
					);
				}
				$_SESSION["shopping_cart"][0] = $item_array;
			}
	    	//find bills end
	    }
	}
    
?>