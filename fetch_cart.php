<?php



//fetch_cart.php



session_start();
require('DB/connection.php');
require('functions.php');



$total_price = 0;

$total_item = 0;



$output = '

<ul class="cart-list">

';

$output2 = '

<table class="table-list">

                                        <thead>

                                            <tr>

                                                <th scope="col">Serial</th>

                                                <th scope="col">Product</th>

                                                <th scope="col">Name</th>

                                                <th scope="col">Price</th>

                                                <th scope="col">Tax</th>

                                                <th scope="col">brand</th>

                                                <th scope="col">quantity</th>

                                                <th scope="col">action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

';

if(!empty($_SESSION["shopping_cart"]))

{

	$count = 1;  $totaltax = 0;
	foreach($_SESSION["shopping_cart"] as $keys => $values){
		$tax = gettaxprice($conn, $values['product_id']);

		$output .= '

		<li class="cart-item">

            <div class="cart-media"><a href="#"><img src="/product-images/'.$values['product_image'].'" alt="product"></a></div>

            <div class="cart-info-group">

                <div class="cart-info">

                    <h6>'.$values['product_name'].'</h6>

                    <p>Unit Price - ₹ '.$values['product_price'].'</p>

                    <p>Size -  '.$values['product_size'].'</p>

                    <p>Color -  '.$values['product_color'].'</p>

                    

                </div>

                <div class="cart-action-group">

                <button

                    class="cart-delete delete" id="'.$values['product_id'].'" style="color:red; font-size:30px;"><i class="far fa-trash-alt"></i></button>

                    <div class="product-action">QTY - '.$values['product_quantity'].'</div>

                    <h6>₹ '.number_format($values['product_price']*$values['product_quantity'],2).'</h6>

                </div>

            </div>

        </li>

		';

		$output2.= '<tr>

		<td class="table-serial">

			<h6>'.$count++.'</h6>

		</td>

		<td class="table-image"><img src="/product-images/'.$values['product_image'].'" alt="product"></td>

		<td class="table-name" style="text-align:left">

			<h6>'.$values['product_name'].'</h6>
			<p>Size: '.$values['product_size'].'</p>
			<p>Color: '.$values['product_color'].'</p>

		</td>

		<td class="table-price">

			<h6>₹ '.$values['product_price'].'</h6>

		</td>

		<td class="table-price">

			<h6>₹ '.$tax.'</h6>

		</td>

		<td class="table-brand">

			<h6>Shubhda Enterprises</h6>

		</td>

		<td class="table-quantity">

			<h6>'.$values['product_quantity'].'</h6>

		</td>

		<td class="table-action"><a class="trash delete" href="javascript:void(0)" id="'.$values['product_id'].'"  title="Remove Wishlist"><i class="icofont-trash"></i></a></td>

	</tr>';

		$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);

		$total_item = $total_item + 1;
		$totaltax = $totaltax+$tax;
	}

	$output .= '

	</ul>

    <div class="cart-footer">

        <button class="coupon-btn">Do you have a coupon code?</button>

        <form class="coupon-form">

            <input type="text" placeholder="Enter your coupon code">

            <button type="submit">

                <span>apply</span>

            </button></form>

            <a class="cart-checkout-btn" href="/checkout.php">

                <span class="checkout-label">Proceed to Checkout</span>

                <span class="checkout-price">₹ '.number_format($total_price,2).'</span>

            </a>

    </div>

	';

	

}

else

{

	$output .= '

    <tr>

    	<td colspan="5" align="center">

    		Your Cart is Empty!

    	</td>

    </tr>

    ';

	$output2.='

	</tbody>

                                    </table>

	';

}

$output .= '</table></div>';

$data = array(

	'cart_details'		=>	$output,

	'checkout_details'		=>	$output2,

	'total_price'		=>	'₹ ' . number_format($total_price, 2),

    'total_pay'		=>	$total_price + $totaltax,

	'total_item'		=>	$total_item,

	'total_tax'		=>	$totaltax


);	



echo json_encode($data);





?>