<?php
	session_start();
	$id = $_POST["id"];

	// foreach($_SESSION["shopping_cart"] as $keys => $values){
	// 	if($values["item_id"] == $id)
	// 	{
	// 		unset($_SESSION["shopping_cart"][$keys]);
	// 		echo 'success';
	// 	}else{
	// 		echo 'not success';
	// 	}
	// }

	unset($_SESSION["shopping_cart"]);
	echo 'success';



?>