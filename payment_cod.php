<?php

session_start();

require('DB/connection.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$amount =  $_POST['totalAmount'];
$total_tax =  $_POST['total_tax'];

$invoice_id = $_POST['invoice_id'];

$users_id = $_POST['users_id'];

$total_item = $_POST['total_item'];

$address_id = $_POST['address_id'];

$usersessid = $_SESSION['users_id'];

$fetchuss = "SELECT * FROM address_book WHERE users_id='$usersessid'";

$stmtuser = $conn->prepare($fetchuss);

$resuser = $stmtuser->execute();

$rowuser = $stmtuser->fetch();
$useremail = $rowuser['email'] ;

$order = "INSERT INTO  orders (invoice_id ,users_id,address_id,total_item,total_pay,total_tax,payment_mode) 

VALUES ('$invoice_id',$users_id,$address_id,$total_item,$amount,$total_tax,1)";
$stmtorder = $conn->prepare($order);

$res1 = $stmtorder->execute();

if ($res1) {

    foreach ($_SESSION["shopping_cart"] as $keys => $values) {

        $product_image = $values['product_image'];

        $product_name = $values['product_name'];

        $product_quantity = intval($values['product_quantity']);

        $product_price = intval($values['product_price']);

        $product_price_total = intval($values['product_price'] * $values['product_quantity']);

        $invoice_items = "INSERT INTO order_products (invoice_id,users_id,p_image,p_name, p_size,p_color,p_qty,p_price,total_price,pdid)VALUES ('$invoice_id',$users_id,'$product_image','".addslashes($product_name)."', '".$values['product_size']."', '".$values['product_color']."',$product_quantity,$product_price,$product_price_total,'".$values['product_id']."')";

        
        $invoice_stmt = $conn->prepare($invoice_items);

        $invoice_stmt->execute();

        if($invoice_stmt){

            

            ini_set( 'display_errors', 1 );

            error_reporting( E_ALL );

            $from = "support@riverhill.in";///Mail created from your site

            $to = "support@riverhill.in";//Reciver Address

            

            $from2 = "support@riverhill.in";///Mail created from your site

            $to2 = $useremail;//Reciver Address

            

            $subject = "Order Details From RiverHill ";//Subject

            $message = "

            product_name: ".$product_name."

            product quantity: ".$product_quantity."

            product price: ".$product_price."

            product price total : ".$product_price_total."

            ";     //Message-Body

            

            $headers = "From:".$from; 

            $headers2 = "From:".$from2;

            mail($to,$subject,$message, $headers);

             mail($to2,$subject,$message, $headers2);

            

            

        }

        

    }

    

    unset($_SESSION["shopping_cart"]);

    echo 1;

    

}

?>