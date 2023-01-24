<?php
include_once('Header.php');
include_once('../models/Product.php');
if (isset($_COOKIE['user_role']) && $_COOKIE['user_role'] == 'admin') {

    $db = new AdminProduct();
    if (isset($_GET['id'])) {
        $product = $db->searchProduct($_GET['id'])->fetch(PDO::FETCH_ASSOC);
    } else {
        header("location: Products.php");
    }
    if (isset($_GET['update']) && $_GET['update'] == 'success') { ?>
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Congratulation: </strong>product is updated successfully.
        </div>
    <?php } ?>
    <div class="container mt-5">

        <div class="row">
            <div class="add-product">
                <form action="../controllers/product/UpdateProduct.php" method="POST" enctype="multipart/form-data">
                    <h2 class="text-center">Update Product</h2>
                    <input type="text" name="pid" hidden value="<?php echo $product['id'] ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pname" placeholder="Product Name" name="pname"
                            value="<?php echo $product['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <textarea name="pdesc" id="pdesc" cols="30" rows="10" placeholder="Product Description"
                            class="form-control" required><?php echo $product['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="pprice" placeholder="Product Price" name="pprice"
                            value="<?php echo $product['price'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="pquantity" placeholder="Product Quantity"
                            name="pquantity" value="<?php echo $product['quantity'] ?>" required>
                    </div><br>
                    <select name="cid" id="cid" class="form-control" required>
                        <?php include_once('../models/Category.php');
                        $db = new AdminCategory();
                        $categories = $db->getCategories()->fetchAll(pdo::FETCH_ASSOC);
                        ?>
                        <?php $selected = "selected" ?>
                        <?php foreach ($categories as $category) { ?>
                            <option <?php echo $category['id'] === $product['category_id'] ? "selected" : "" ?>
                                value="<?php echo $category['id'] ?>">
                                <?php echo $category['category_name'] ?>
                            </option>
                        <?php } ?>
                    </select><br><br>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="pimage" name="pimage">
                        <label class="custom-file-label" for="pimage">Choose file</label>
                    </div><br><br>
                    <input type="hidden" name="oldImage" value="<?php echo $product['image'] ?>">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>

    </div>
<?php } else {
    header("location: ../../views/PageNotFound.php");
}