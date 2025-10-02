<?php
	session_start();
	$id = $_POST["id"];
/*$message="";

	foreach($_SESSION["shopping_cart"] as $keys => $values){
		$message="";
		if($values["ltsIdChk"] == $id)
		{
			unset($_SESSION["shopping_cart"][$keys]);
			$message = 'success';
			
		}else{
			$message = 'not success';
		}
	}

echo $message;
	//unset($_SESSION["shopping_cart"]);
	//echo 'success';

*/


    $id=intval($id);
    $max=count($_SESSION['shopping_cart']);
    for($i=0;$i<$max;$i++){
      if($id==$_SESSION['shopping_cart'][$i]['ltsIdChk']){
        unset($_SESSION['shopping_cart'][$i]);
        break;
      }
    }
    $_SESSION['shopping_cart']=array_values($_SESSION['shopping_cart']);
 
echo "success";
?>