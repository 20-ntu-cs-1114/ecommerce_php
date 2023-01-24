<?php
include_once("Header.php");
if(!isset($_COOKIE['user_id'])){
    header("location: Signin.php");
}
?>
<div class="container">
    <h2 class="mt-3 mb-3">Cart</h2>
    <div class="row">
        <?php include_once("../models/Cart.php");
        $db = new Cart();
        $products = $db->getCartProducts($_COOKIE['user_id'])->fetchAll(PDO::FETCH_ASSOC);
        foreach ($products as $product){?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card custom-card">
                    <img class="card-img-top" src="../images/<?php echo $product['image'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name'] ?></h5>
                        <a href="SingleProduct.php?id=<?php echo $product['product_id'] ?>" class="btn btn-primary">Detail</a>
                        <a href="../controllers/cart/RemoveFromCart.php?id=<?php echo $product['cart_id'] ?>" class="btn btn-danger">Delete</a>
                        
                        
                    </div>
                </div>
            </div>
            <?php } ?>
    </div>
   <?php
    if (sizeof($products)>0){?>
        <a href="OrderFromCart.php" class="btn btn-success mt-3">Order All</a>
        <?php } else{ ?>
            <div class="alert alert-warning">Cart is empty</div>
   <?php }?>
</div>
