<?php
session_start();
require("DB/connection.php");
if((isset($_GET['orderid']))&&(isset($_GET['status']))){
    echo "Set";
}
?>