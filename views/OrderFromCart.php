<?php 
include_once('Header.php');
if(!isset($_COOKIE['user_id'])){
    header("location: Signin.php");
}
?>
<div class="container pt-5">
    <form action="../controllers/order/OrderFromCart.php" method="POST">
        
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total_price">Total Price</label>
            <?php include_once('../models/Order.php');
            $db = new Order();
            $totalPrice = $db->getTotalPriceOfCart($_COOKIE['user_id'])->fetch(PDO::FETCH_ASSOC);
            ?>
            <input type="number" name="tatal_price" class="form-control" disabled id="total_price" value="<?php echo $totalPrice['totalPrice']?>">
        </div>
        <button type="submit" class="btn btn-success ">Order</button>
    </form>
</div>

<script>


// $(document).ready(function(){
//   $('#product_quantity').blur(function(){

//     $currentValue = $('#total_price').val();
//     $quantity = $("#product_quantity").val();
//     $newValue = $currentValue * $quantity;
//     $('#total_price').val($newValue);
//   })
// });
</script>

