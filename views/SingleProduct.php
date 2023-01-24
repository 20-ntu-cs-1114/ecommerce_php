<?php 
include_once('Header.php');
include_once('../models/Product.php');
$db = new Product();
// if(isset($_GET['id'])){
    $product = $db->searchProductById($_GET['id'])->fetchAll(PDO::FETCH_ASSOC);

// }
?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7 ">
                <img class="single-product-image" src="../images/<?php echo $product[0]['image'] ?>" alt="Failed to Load Image">
            </div>
            <div class="col-md-5 single-product-detail-container">
                <div class="single-product-detail">
                    <h1><?php echo  $product[0]['name'] ?></h1>
                    <p><?php echo  $product[0]['description'] ?></p>
                </div>
                <div class="row ">
                    <div class="single-product-buttons">
                        <a href="Order.php?id=<?php echo $product[0]['id']?>" class="btn btn-success m-2">Buy</a>
                        <a href="../controllers/cart/AddToCart.php?id=<?php echo $product[0]['id']?>" class="btn btn-outline-secondary m-2">Add to Cart</a>
                        <h6 class="ml-2">In Stock: <?php echo $product[0]['quantity']?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2>Description</h2>
      <p><?php echo $product[0]['description']?></p>
    </div>
