<?php
include_once('Config.php');
class Order
{
    private $id;
    public $product_id;
    public $user_id;
    public $quantity;
    public $address;
    protected $status;
    protected $created_at;
    protected $updated_at;
    private $orderTable;
    function __construct()
    {
        $this->orderTable = Config::getConnection();
    }

    function getOrders($id)
    {
        try {
            $query = "SELECT *, orders.id as order_id, orders.quantity as order_quantity FROM orders JOIN products ON orders.product_id = products.id JOIN users ON users.id = user_id WHERE user_id = ".$id;
            $sql = $this->orderTable->prepare($query);
            $sql->execute();
            return $sql;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
    function addSingleOrder(){
        try{

            $this->updated_at = date('Y-m-d H:i:s');
            $this->created_at = date('Y-m-d H:i:s');
            $query = "INSERT INTO `orders` ( `user_id`, `product_id`, `quantity`, `address`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?);";
            $sql = $this->orderTable->prepare($query);
            $result = $sql->execute([$this->user_id, $this->product_id, $this->quantity, $this->address, $this->created_at, $this->updated_at]);
            return $result;
        }catch(PDOException $e){
            return false;
        }

    }
    function addCartProducts(){
        
    }
    function getTotalPriceOfCart($user_id){
        try{

            $query = "SELECT sum(price) As totalPrice FROM `carts` JOIN products on product_id = products.id WHERE user_id = ".$user_id;
            $sql = $this->orderTable->prepare($query);
            $sql->execute();
            return $sql;
        }catch(PDOException $e){
            return false;
        }

    }
    function orderFromCart($id){
        $this->updated_at = date('Y-m-d H:i:s');
        $this->created_at = date('Y-m-d H:i:s');
        $cartQuery = "SELECT * FROM carts WHERE user_id = ".$id;
        $cartsSql = $this->orderTable->query($cartQuery);
        $carts = $cartsSql->fetchAll(PDO::FETCH_ASSOC);
        foreach($carts as $cart){
            $query = "INSERT INTO `orders` ( `user_id`, `product_id`, `quantity`, `address`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?);";
            $sql = $this->orderTable->prepare($query);
            $result = $sql->execute([$cart['user_id'], $cart['product_id'], 1, $this->address, $this->created_at, $this->updated_at]);
            $deleteQuery = "DELETE FROM carts WHERE id = " . $cart['id'];
            $deleteSql = $this->orderTable->prepare($deleteQuery);
            $deleteSql->execute();
        }
    }



}

?>