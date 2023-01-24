<?php
include_once('AdminConfig.php');
class AdminOrder
{
    private $id;
    public $product_id;
    public $user_id;
    public $quantity;
    public $address;
    public $status;
    protected $created_at;
    protected $updated_at;
    private $orderTable;
    function __construct()
    {
        $this->orderTable = AdminConfig::getConnection();
    }

    function getOrders()
    {
        try {
            $query = "SELECT *, orders.id as order_id, orders.quantity as order_quantity FROM orders JOIN products ON orders.product_id = products.id JOIN users ON users.id = user_id";
            $sql = $this->orderTable->prepare($query);
            $sql->execute();
            return $sql;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
    function approveOrder($id)
    {
        $orderQuery = "SELECT * FROM orders WHERE id = ?";
        $orderSql = $this->orderTable->prepare($orderQuery);
        $orderSql->execute([$id]);
        $order = $orderSql->fetch(PDO::FETCH_ASSOC);
        if ($order['status'] == "pending") {
            $productId = $order['product_id'];
            $orderQuantity = $order['quantity'];
            $productQuery = "SELECT * FROM products WHERE id = ?";
            $productSql = $this->orderTable->prepare($productQuery);
            $productSql->execute([$productId]);
            $product = $productSql->fetch(PDO::FETCH_ASSOC);

            $newQuantity = $product['quantity'] - $orderQuantity;
            $updateQuery = "UPDATE products SET quantity = ? WHERE id = ?";
            $updateSql = $this->orderTable->prepare($updateQuery);
            $updateSql->execute([$newQuantity, $productId]);
        }
        // $order->status = "approved";
        $updateOrderStatusQuery = "UPDATE orders SET `status` = 'approved' WHERE id = ?";
        $updateOrderStatusSql = $this->orderTable->prepare($updateOrderStatusQuery);
        $result = $updateOrderStatusSql->execute([$id]);
        return $result;
    }
    function disapproveOrder($id){
        try {
            $query = "DELETE FROM orders WHERE id = ?";
            $sql = $this->orderTable->prepare($query);
            $sql->execute([$id]);
            return $sql;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }



}

?>