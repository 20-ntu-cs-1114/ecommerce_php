<?php 
if(isset($_COOKIE['user_id'])){

    include_once('../../models/Cart.php');
    $cart = new Cart();
    $cart->removeFromCart($_GET['id']);
    header("location: ../../views/Cart.php");
    
}else{
    header("location: ../../views/Signin.php");
}
?>