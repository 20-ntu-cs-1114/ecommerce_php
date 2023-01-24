<?php include_once('Header.php');
?>

    <div class="container-fluid">
        <!-- {{-- Carousel --}} -->
        <div class="carousels-container">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php include_once('../models/Carousel.php');
                    $db = new Carousel();
                    $carousels = $db->getCarousels()->fetchAll(PDO::FETCH_ASSOC);
                    for ($i = 0; $i < sizeof($carousels); $i++){?>
                        <li data-target="#carousel" data-slide-to="<?php echo $i ?>" class="<?php echo $i == 0 ? 'active' : '' ?>">
                        </li>
                    <?php } ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($carousels as $index => $carousel){?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : '' ?>">
                            <img class=" carousel-image" src="../images/<?php echo $carousel['image'] ?>" alt="First slide">
                        </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- {{-- Carousel End --}} -->
        <div class="container">
            <div class="wrapper">
                <h2 class="text-center">Discover Trending Categories</h2>
                <div class="row">
                    <?php include_once('../models/Category.php');
                    $db = new Category();
                    $categories = $db->getLimitedCategories(4)->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($categories as $category){?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card custom-card">
                                <img class="card-img-top" src="../images/<?php echo $category['category_image'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $category['category_name'] ?></h5>
                                    <a href="Category.php?id=<?php echo $category['id'] ?>" class="btn btn-primary">Explore</a>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="wrapper">
                <h2 class="text-center">Discover Trending Shoes</h2>
                <div class="row">
                    <?php include_once('../models/Product.php');
                    $db = new Product();
                    $shoes = $db->getLimitedProductsWithCategory("shoe",4)->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($shoes as $shoe){?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card custom-card">
                                <img class="card-img-top" src="../images/<?php echo $shoe['image'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo  $shoe['name'] ?></h5>
                                    <a href="SingleProduct.php?id=<?php echo  $shoe['pid'] ?>" class="btn btn-primary">Detail</a>
                                    <a href="../controllers/cart/AddToCart.php?id=<?php echo  $shoe['pid'] ?>" class="btn btn-secondary">Add to
                                        Cart</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="wrapper">
                <h2 class="text-center">Top Clothes</h2>
                <div class="row">
                    <?php 
                    $clothes = $db->getLimitedProductsWithCategory("cloth",4)->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($clothes as $cloth){?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card custom-card">
                                <img class="card-img-top" src="../images/<?php echo  $cloth['image'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo  $cloth['name'] ?></h5>
                                    <a href="SingleProduct.php?id=<?php echo  $cloth['pid'] ?>" class="btn btn-primary">Detail</a>
                                    <a href="../controllers/cart/AddToCart.php?id=<?php echo  $cloth['pid'] ?>" class="btn btn-secondary">Add to
                                        Cart</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            </div>
        