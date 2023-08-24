<?php
//get data from form  

$title = $_POST['title'];
$name= $_POST['name'];
$mobile= $_POST['mobile'];
$email= $_POST['email'];
$state_name= $_POST['state_name'];
$city_name= $_POST['city_name'];
$pincode= $_POST['pincode'];
$address= $_POST['address'];




$to = "support@riverhill.in";
$subject = "Mail From RiverHill  ";
$txt ="\r\n Delivery Location : ". $title . "\r\n Customer Name : " . $name . "\r\n Customer Mobile Number : " . $mobile ." \r\n Custmer Email I'd : " . $email . 
"\r\n State Name : " .$state_name." \r\n City Name : " . $city_name. "\r\n Pin Code : " . $pincode. "\r\n Custmer Address : " .$address ;

$headers = "From:" .$email. "\r\n" .
"CC: support@riverhill.in";

if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:index.php");
?>