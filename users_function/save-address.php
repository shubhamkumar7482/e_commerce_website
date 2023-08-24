<?php
session_start();
include('../DB/connection.php');
$users_id = $_POST['users_id'];
$address_type = $_POST['address_type'];
$fname = $_POST['fname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$state = $_POST['state'];
$address = $_POST['address'];
$sql = "INSERT INTO address_book (users_id,address_type,full_name,phone,email,city,pincode,state,address) VALUES ($users_id, '$address_type','$fname','$phone','$email','$city',$pincode,'$state', '$address')";
$stmt = $conn->prepare($sql);
$res = $stmt->execute();

if ($res) {
    echo 1;
} else {
    echo 0;
}
?>