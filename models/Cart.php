<?php
include_once('Config.php');
class Cart
{
    private $id;
    public $product_id;
    public $user_id;
    protected $created_at;
    protected $updated_at;
    private $cartTable;
    function __construct()
    {
        $this->cartTable = Config::getConnection();
    }
    function addToCart()
    {
        try {
            $this->updated_at = date('Y-m-d H:i:s');
            $this->created_at = date('Y-m-d H:i:s');
            $query = "INSERT INTO `carts` (`user_id`, `product_id`, `created_at`, `updated_at`) VALUES (?,?,?,?);";
            $sql = $this->cartTable->prepare($query);
            $result = $sql->execute([$this->user_id, $this->product_id, $this->created_at, $this->updated_at]);
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }
    function getCartProducts($user_id){
        try {
            
            $query = "SELECT *, carts.id AS cart_id FROM carts join products on products.id = product_id JOIN users on user_id = users.id WHERE users.id = ".$user_id;
            $sql = $this->cartTable->prepare($query);
            $result = $sql->execute();
            // print_r($sql->fetchAll(PDO::FETCH_ASSOC));
            return $sql;
        } catch (PDOException $e) {
            return false;
        }
    }
    function removeFromCart($id){
        try {
            
            $query = "DELETE FROM carts WHERE id = ".$id;
            $sql = $this->cartTable->prepare($query);
            $result = $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            return false;
        }
    }




}

?>