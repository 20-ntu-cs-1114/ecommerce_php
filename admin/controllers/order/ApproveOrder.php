<?php
include_once('../../models/Order.php');
$order = new AdminOrder();
$order->approveOrder($_GET['id']);
header("location: ../../views/Orders.php");

?>