<?php 
if(isset($_COOKIE['user_id'])){

    include_once('../../models/Cart.php');
    $cart = new Cart();
    $cart->user_id = $_COOKIE['user_id'];
    $cart->product_id = $_GET['id'];
    $cart->addToCart();
    header("location: ../../views/Cart.php");
    
}else{
    header("location: ../../views/Signin.php");
}
?>