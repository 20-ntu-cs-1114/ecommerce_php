<?php
include_once('Header.php');
if(!isset($_COOKIE['user_id'])){
    header("location: Signin.php");
}
if (isset($_GET['order']) && $_GET['order'] == "success") { ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Congratulation: </strong>Order is placed successfully.
    </div>
    <?php }else if(isset($_GET['order']) && $_GET['order'] == "fail"){?>
        <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Sorry: </strong>Somethings went wrong.
    </div>
    <?php }
    if (isset($_GET['id'])) {
    include_once('../models/Product.php');
    $db = new Product();
    $product = $db->searchProductById($_GET['id'])->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="container pt-5">
        <form action="../controllers/order/MakeSingleOrder.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>}">
            <div class="form-group">
                <label for="product_name" class="form-control-label">Product Name</label>
                <input type="text" name="product_name" id="product_name" disabled class="form-control"
                    value="<?php echo $product['name'] ?>">
            </div>
            <div class="form-group">
                <label for="product_price" class="form-control-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" disabled class="form-control"
                    value="<?php echo $product['price'] ?>">
            </div>
            <div class="form-group">
                <label for="product_quantity" class="form-control-label">Product Quantity</label>
                <input type="text" name="product_quantity" id="product_quantity" class="form-control" value="1">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="number" name="tatal_price" class="form-control" disabled id="total_price"
                    value="<?php echo $product['price'] ?>">
            </div>
            <button type="submit" class="btn btn-success ">Order</button>
        </form>
    </div>
<?php } ?>
<script>
    $(document).ready(function () {
        $('#product_quantity').blur(function () {

            $currentValue = $('#total_price').val();
            $quantity = $("#product_quantity").val();
            $newValue = $currentValue * $quantity;
            $('#total_price').val($newValue);
        })
    });
</script>