<?php 
include_once('../../models/Order.php');
$order = new Order();
$order->user_id = $_COOKIE['user_id'];
$order->product_id = $_POST['product_id'];
$order->quantity = $_POST['quantity'];
$order->address = $_POST['address'];
if($order->addSingleOrder()){
    header('location: ../../views/Order.php?order=success');
}else{
    header('location: ../../views/Order.php?order=fail');
}