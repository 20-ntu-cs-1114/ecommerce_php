<?php 
include_once("Header.php");
?>
    <div class="container">
        <h2 class="mt-3 mb-3">Shop</h2>
        <div class="row">
            <?php 
            include_once('../models/Product.php');
            $db = new Product();
            $products = $db->getProducts()->fetchAll(PDO::FETCH_ASSOC);
            foreach ($products as $product){?>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="card custom-card">
                        <img class="card-img-top" src="../images/<?php echo  $product['image'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo  $product['name'] ?></h5>
                            <a href="SingleProduct.php?id=<?php echo  $product['id'] ?>" class="btn btn-primary">Detail</a>
                            <a href="../controllers/cart/AddToCart.php?id=<?php echo  $product['id'] ?>" class="btn btn-secondary">Add to
                                Cart</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

