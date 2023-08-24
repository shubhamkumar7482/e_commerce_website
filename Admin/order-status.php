<?php
require("connection_inc.php");
if((isset($_GET['orderid']))&&(isset($_GET['status']))){
    $orderid = intval($_GET['orderid']);
    $status = intval($_GET['status']);
    $sql="update orders set order_status = $status WHERE order_id  = $orderid";
    $result = mysqli_query($con,$sql);
    if ($result) {
        echo "<script>
        alert('Order Status Changes!')
        window.location = 'order.php';
    </script>";
    } else {
        echo "<script>
        alert('Something Went Wrong!')
        window.location = 'order.php';
    </script>";
    }
    
}
?>
