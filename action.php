<?php



//action.php

require('DB/connection.php'); 

session_start();



if(isset($_POST["action"])){


	if($_POST["action"] == "getcolors"){ 
		$stmt = $conn->prepare("SELECT colors FROM `product_attribute`  where id = ".$_REQUEST['size_id']);
        $result_sql = $stmt->execute();
        $colors = $stmt->fetch(); 

		$sql = $conn->prepare("SELECT id, color FROM `color`  where id in (".$colors['colors'].")");
        $result_sql = $sql->execute();
        $colors = $sql->fetchAll(PDO::FETCH_ASSOC); 
        
        echo json_encode($colors);
	}

	if($_POST["action"] == "add"){

		if(isset($_SESSION["shopping_cart"]))

		{

			$is_available = 0;

			foreach($_SESSION["shopping_cart"] as $keys => $values)

			{

				if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"] && $_SESSION["shopping_cart"][$keys]['product_size'] == $_POST["product_size"])

				{

					$is_available++;

					$_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];

				}

			}

			if($is_available == 0)

			{

				$item_array = array(

					'product_id'               =>     $_POST["product_id"],

					'product_image'             =>    $_POST["product_image"],  

					'product_name'             =>     $_POST["product_name"],  

					'product_price'            =>     $_POST["product_price"],  

					'product_quantity'         =>     $_POST["product_quantity"],  

					'product_size'         =>     $_POST["product_size"],  

					'product_color'         =>     $_POST["product_color"]

				);

				$_SESSION["shopping_cart"][] = $item_array;

			}

		}

		else

		{

			$item_array = array(

				'product_id'               =>     $_POST["product_id"],

				'product_image'             =>     $_POST["product_image"],  

				'product_name'             =>     $_POST["product_name"],  

				'product_price'            =>     $_POST["product_price"],  

				'product_quantity'         =>     $_POST["product_quantity"],  

					'product_size'         =>     $_POST["product_size"],  

					'product_color'         =>     $_POST["product_color"]

			);

			$_SESSION["shopping_cart"][] = $item_array;

		}
		print_r($_SESSION["shopping_cart"]); die();

	}



	if($_POST["action"] == 'remove')

	{

		foreach($_SESSION["shopping_cart"] as $keys => $values)

		{

			if($values["product_id"] == $_POST["product_id"])

			{

				unset($_SESSION["shopping_cart"][$keys]);

			}

		}

	}

	if($_POST["action"] == 'empty')

	{

		unset($_SESSION["shopping_cart"]);

	}

}



?>