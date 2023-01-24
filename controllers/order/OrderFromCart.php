<?php
include_once('../../models/Order.php');
$order = new Order();
$order->address = $_POST['address'];

if($order->orderFromCart($_COOKIE['user_id'])){
    header('location: ../../views/Cart.php?order=success');
}else{
    header('location: ../../views/Cart.php?order=fail');
}
?>