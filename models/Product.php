<?php
include_once('Config.php');
class Product
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
        $this->productTable = Config::getConnection();
    }
    
    function getLimitedProductsWithCategory($category_name,$limit)
    {
        try {
            $query = "SELECT * , products.id AS pid FROM products JOIN categories ON category_id = categories.id WHERE category_name = ? LIMIT ".$limit;
            $sql = $this->productTable->prepare($query);
            $sql->execute([$category_name]);
            return $sql;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
    function getProductsWithCategory($id)
    {
        try {
            $query = "SELECT * , products.id AS pid FROM products JOIN categories ON category_id = categories.id WHERE categories.id = ?";
            $sql = $this->productTable->prepare($query);
            $sql->execute([$id]);
            return $sql;
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
        }catch (PDOException $exception) {
            echo $exception;
        }
    }
   
    function searchProduct($search)
    {
        try {
            $query = "SELECT * FROM products WHERE name LIKE '%" . $search . "%'";
            $sql = $this->productTable->prepare($query);
            $sql->execute();
            return $sql;
        }catch (PDOException $exception) {
            echo $exception;
        }
    }

    function searchProductById($id)
    {
        try {
            $query = "SELECT * FROM products WHERE id = ?";
            $sql = $this->productTable->prepare($query);
            $sql->execute([$id]);
            return $sql;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
}