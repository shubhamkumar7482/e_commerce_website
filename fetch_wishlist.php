<?php

//fetch_cart.php

session_start();

$total_price = 0;
$total_item = 0;
$output2 = '
<table class="table-list">
                                        <thead>
                                            <tr>
                                                <th scope="col">Serial</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">brand</th>
                                                <th scope="col">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
';
if(!empty($_SESSION["wishlist"]))
{
	$count = 1;
	foreach($_SESSION["wishlist"] as $keys => $values)
	{
		$output2.= '<tr>
		<td class="table-serial">
			<h6>'.$count++.'</h6>
		</td>
		<td class="table-image"><img src="product-images/'.$values['product_image'].'" alt="product"></td>
		<td class="table-name">
			<h6>'.$values['product_name'].'</h6>
		</td>
		<td class="table-price">
			<h6>₹ '.$values['product_price'].'</h6>
		</td>
		<td class="table-brand">
			<h6>Shubhda Enterprises</h6>
		</td>
		<td class="table-action">
        <a class="trash delete" href="javascript:void(0)" id="'.$values['product_id'].'"  title="Remove Wishlist"><i class="icofont-trash"></i></a>
        </td>
	</tr>';
		$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
		$total_item = $total_item + 1;
	}
	
}
else
{
	$output2.='
	</tbody>
                                    </table>
	';
}
$data = array(
	'wishlist_details'		=>	$output2,
	'total_price'		=>	'₹ ' . number_format($total_price, 2),
    'total_pay'		=>	$total_price,
	'total_item'		=>	$total_item
);	

echo json_encode($data);


?>