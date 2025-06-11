<?php 
$con = new mysqli(
    'localhost',
    'root',
    '',
    'ecommerce');
if(!$con){
    die(mysqli_error($con));
}

?>