<?php 
include_once('Header.php');
if (isset($_COOKIE['user_role']) && $_COOKIE['user_role'] == 'admin') {

    ?>
<div class="container-fluid">
    <div class="table-responsive pt-2">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Username</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once('../models/Order.php');
                $db = new AdminOrder();
                $orders = $db->getOrders()->fetchAll(PDO::FETCH_ASSOC);
                // print_r($orders[0]['id']);
                // die();
            

                foreach ($orders as $order) { ?>
                <tr>

                    <th scope="row"><?php echo $order['order_id'] ?></th>
                    <td><img src="../../images/<?php echo $order['image'] ?>" alt="" style="width:75px"></td>
                    <td><?php echo $order['username'] ?></td>
                    <td><?php echo $order['name'] ?></td>
                    <td><?php echo $order['address'] ?></td>
                    <td><?php echo $order['order_quantity'] ?></td>
                    <td><?php echo $order['status'] ?></td>
                    <td><a href="../controllers/order/ApproveOrder.php?id=<?php echo $order['order_id'] ?>" class="btn btn-success">Approve</a></td>
                    <td><a href="../controllers/order/DisapproveOrder.php?id=<?php echo $order['order_id'] ?>" class="btn btn-danger">Disapprove</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php } else{
     header("location: ../../views/PageNotFound.php");
}