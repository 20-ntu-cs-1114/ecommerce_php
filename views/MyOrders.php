<?php
include_once('Header.php');
if(!isset($_COOKIE['user_id'])){
    header("location: Signin.php");
}
?>
<div class="container">
    <h2 class="mt-3 mb-3">My Orders</h2>
    <div class="row ">
        <?php
        include_once('../models/Order.php');
        $db = new Order();
        $orders = $db->getOrders($_COOKIE['user_id'])->fetchAll(PDO::FETCH_ASSOC);
        foreach ($orders as $order) { ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                <div class="card custom-card">
                    <img class="card-img-top" src="../images/<?php echo  $order['image'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo  $order['name'] ?></h5>
                        <b>Status: </b><?php echo  $order['status'] ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>