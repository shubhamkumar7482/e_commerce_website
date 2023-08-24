<?php


$host = "localhost";
$username = "root";
$password = "";
$database = "soumita_project";



// connection 
$con = mysqli_connect("$host","$username","$password","$database");


if(!$con){
  die("sorry we failed to connect : ". mysqli_connect_error() );
  }
  else{
  echo "connection was successfull";
  }
  
?>

