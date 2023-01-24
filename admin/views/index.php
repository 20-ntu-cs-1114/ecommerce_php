<?php 
include_once('Header.php');
if(isset($_COOKIE['user_role']) && $_COOKIE['user_role'] =='admin'){?>
       <div class="container-fluid">
           <div class="row pt-2">
               <a href="AddProductForm.php" class="btn btn-success offset-10">Add Product</a>
            </div>
            <div class="table-responsive pt-2">
                
                <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once('../models/Product.php');
                    $db = new AdminProduct();
                    $products = $db->getProducts()->fetchAll(pdo::FETCH_ASSOC);
                    foreach ($products as $product){?>
                    <tr>
                        <th scope="row"><?php echo $product['id']?></th>
                        <td><img src="../../images/<?php echo $product['image']?>" alt="" style="width:75px"></td>
                        <td><?php echo $product['name']?></td>
                        <td><?php echo $product['price']?></td>
                        <td><?php echo $product['quantity']?></td>
                        <td><a href="UpdateProductForm.php?id=<?php echo $product['id']?>" class="btn btn-primary">Update</a></td>
                        <td><a href="../controllers/product/DeleteProduct.php?id=<?php echo $product['id']?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
<?php }else{
    header("location: ../../views/PageNotFound.php");
}