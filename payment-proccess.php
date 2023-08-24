<?php

session_start();

require('DB/connection.php');
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

$payment_id = md5(time());

$amount =  $_POST['totalAmount'];
$total_tax =  $_POST['total_tax'];

$invoice_id = $_POST['invoice_id'];

$users_id = $_POST['users_id'];

$total_item = $_POST['total_item'];

$address_id = $_POST['address_id'];

$order = "INSERT INTO  orders (invoice_id ,users_id,address_id,total_item,total_pay,payment_id, total_tax) 

VALUES ('$invoice_id',$users_id,$address_id,$total_item,$amount,'$payment_id', $total_tax)";

$stmtorder = $conn->prepare($order);

$res1 = $stmtorder->execute();
$ordid = $conn->lastInsertId();
if ($res1) {

    
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {

        $product_image = $values['product_image'];

        $product_name = $values['product_name'];

        $product_quantity = intval($values['product_quantity']);

        $product_price = intval($values['product_price']);

        $product_price_total = intval($values['product_price'] * $values['product_quantity']);
        $product_id = $values['product_id'];
        $invoice_items = "INSERT INTO order_products (invoice_id,users_id,p_image,p_name,p_size,p_color,p_qty,p_price,total_price,pdid) 

        VALUES ('$invoice_id',$users_id,'$product_image','".addslashes($product_name)."', '".$values['product_size']."', '".$values['product_color']."',$product_quantity,$product_price,$product_price_total,$product_id)";

        $invoice_stmt = $conn->prepare($invoice_items);

        $invoice_stmt->execute(); 
    }
    //unset($_SESSION["shopping_cart"]);
    $_SESSION['ordid'][$payment_id] = $ordid;  

    $response['msg'] = 'Success';
    $response['token'] = base64_encode($payment_id);  
    echo json_encode($response);
}

?>