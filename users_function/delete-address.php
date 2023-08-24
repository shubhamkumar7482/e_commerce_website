<?php
session_start();
include('../DB/connection.php');
$users_id = $_SESSION['users_id'];
$address_id = $_POST['address_id'];
$sql = "DELETE  FROM address_book WHERE users_id = '$users_id' AND address_id = $address_id";
$stmt = $conn->prepare($sql);
$result = $stmt->execute();
if ($result) {
    # code...
    echo 1;
} else {
    echo 0;
}

?>