<?php
session_start();
include('../DB/connection.php');
$users_id = $_SESSION['users_id'];
$sql = "SELECT * FROM address_book WHERE users_id = '$users_id'";
$stmt = $conn->prepare($sql);
$result = $stmt->execute();
$count = $stmt->rowCount();
$row = $stmt->fetchAll();
$address = '<div class="row">';
foreach($row as $rows){
    $address.= '<div class="col-md-6 col-lg-4 alert fade show" >
    <div class="profile-card address active address-click">
        <h6>'.$rows['address_type'].'</h6>
        <p>'.$rows['full_name'].'</p>
        <p>'.$rows['phone'].'|'.$rows['email'].'</p>
        <p>'.$rows['address'].' '.$rows['city'].' '.$rows['pincode'].' '.$rows['state'].'.'.'</p>
        <ul class="user-action">
        <li><input type="radio" name="address_id" id="address_id" value="'.$rows['address_id'].'"></li>
            <li><button class="trash icofont-ui-delete remove-address" data-address_id="'.$rows['address_id'].'" title="Remove This" data-bs-dismiss="alert"></button></li>
        </ul>
    </div>
</div>';
}
$address.='</div>';
$data = array(
	'address'		=>	$address,
);	
echo json_encode($data);
?>