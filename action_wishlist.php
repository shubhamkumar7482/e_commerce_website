<?php

//action.php

session_start();

if(isset($_POST["action"]))
{
	if($_POST["action"] == "add")
	{
		if(isset($_SESSION["wishlist"]))
		{
			$is_available = 0;
			foreach($_SESSION["wishlist"] as $keys => $values)
			{
				if($_SESSION["wishlist"][$keys]['product_id'] == $_POST["product_id"])
				{
					$is_available++;
					$_SESSION["wishlist"][$keys]['product_quantity'] = $_SESSION["wishlist"][$keys]['product_quantity'] + $_POST["product_quantity"];
				}
			}
			if($is_available == 0)
			{
				$item_array = array(
					'product_id'               =>     $_POST["product_id"],
					'product_image'             =>    $_POST["product_image"],  
					'product_name'             =>     $_POST["product_name"],  
					'product_price'            =>     $_POST["product_price"],  
					'product_quantity'         =>     $_POST["product_quantity"]
				);
				$_SESSION["wishlist"][] = $item_array;
			}
		}
		else
		{
			$item_array = array(
				'product_id'               =>     $_POST["product_id"],
				'product_image'             =>     $_POST["product_image"],  
				'product_name'             =>     $_POST["product_name"],  
				'product_price'            =>     $_POST["product_price"],  
				'product_quantity'         =>     $_POST["product_quantity"]
			);
			$_SESSION["wishlist"][] = $item_array;
		}
	}

	if($_POST["action"] == 'remove')
	{
		foreach($_SESSION["wishlist"] as $keys => $values)
		{
			if($values["product_id"] == $_POST["product_id"])
			{
				unset($_SESSION["wishlist"][$keys]);
			}
		}
	}
	if($_POST["action"] == 'empty')
	{
		unset($_SESSION["wishlist"]);
	}
}

?>