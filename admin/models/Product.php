<?php
include_once('AdminConfig.php');
class AdminProduct
{
    private $id;
    public $name;
    public $description;
    public $price;
    public $quantity;
    public $category_id;
    public $image;
    protected $created_at;
    protected $updated_at;
    protected $productTable;
    function __construct()
    {
        $this->productTable = AdminConfig::getConnection();
    }
    function addProduct()
    {
        try {
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $query = "INSERT INTO `products` (`name`, `description`, `price`, `quantity`, `category_id`, `image`, `created_at`, `updated_at`) VALUES (?, ?, ?,?,?,?,?,?)";
            $sql = $this->productTable->prepare($query);
            $result = $sql->execute([$this->name, $this->description, $this->price, $this->quantity, $this->category_id, $this->image, $this->created_at, $this->updated_at]);
            return $result;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
    function getProducts()
    {
        try {
            $query = "SELECT * FROM products";
            $sql = $this->productTable->prepare($query);
            $sql->execute();
            return $sql;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
    function deleteProduct($id)
    {
        try {
            echo "ALLAH";
            $query = "DELETE FROM products WHERE id = ?";
            $sql = $this->productTable->prepare($query);
            $result = $sql->execute([$id]);
            return $result;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
    function searchProduct($id)
    {
        try {
            $query = "SELECT * FROM products WHERE id = ?";
            $sql = $this->productTable->prepare($query);
            $sql->execute([$id]);
            return $sql;
        }catch (PDOException $exception) {
            echo $exception;
        }
    }
    function updateProduct($id){
        try {
            $this->updated_at = date('Y-m-d H:i:s');
            $update_at = date('Y-m-d H:i:s');
            $query = "UPDATE `products` SET `name` = ?, `description` = ?, `price` = ?, `quantity` = ?, `category_id` = ?, `image` = ?,`updated_at` = ? WHERE `products`.`id` = ?";
            $sql = $this->productTable->prepare($query);
            $result = $sql->execute([$this->name, $this->description, $this->price, $this->quantity, $this->category_id, $this->image, $this->created_at, $id]);
            return $result;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
}