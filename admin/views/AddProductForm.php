<?php
include_once('Header.php');
if (isset($_COOKIE['user_role']) && $_COOKIE['user_role'] == 'admin') {

    if (isset($_GET['upload']) && $_GET['upload'] == 'success') { ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Congratulation </strong> product is added successfully.
    </div>
<?php } ?>
<div class="container mt-5">

    <div class="row">
        <div class="add-product">
            <form action="../controllers/product/AddProduct.php" method="POST" enctype="multipart/form-data">
                <h2 class="text-center">Add Product</h2>
                <div class="form-group">
                    <input type="text" class="form-control" id="pname" placeholder="Product Name" name="pname" required>
                </div>
                <div class="form-group">
                    <textarea name="pdesc" id="pdesc" cols="30" rows="10" placeholder="Product Description"
                        class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="pprice" placeholder="Product Price" name="pprice"
                        required>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="pquantity" placeholder="Product Quantity"
                        name="pquantity" required>
                </div><br>
                <select name="cid" id="cid" class="form-control" required>
                    <?php
                    include_once('../models/Category.php');
                    $db = new AdminCategory();
                    $categories = $db->getCategories()->fetchAll(pdo::FETCH_ASSOC);
                    foreach ($categories as $category) { ?>
                    <option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
                    <?php } ?>
                </select><br><br>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="pimage" name="pimage">
                    <label class="custom-file-label" for="pimage">Choose file</label>
                </div><br><br>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>

</div>
<?php } else{
     header("location: ../../views/PageNotFound.php");
}