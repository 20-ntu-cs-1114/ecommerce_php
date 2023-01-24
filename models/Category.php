<?php
include_once('Config.php');
class Category
{
    private $id;
    public $name;
    public $image;
    public $created_at;
    public $updated_at;
    private $categoryTable;
    function __construct()
    {
        $this->categoryTable = Config::getConnection();
    }

    function getLimitedCategories($limit)
    {
        try {
            
            $query = "SELECT * FROM `categories` LIMIT ".$limit;
            $sql = $this->categoryTable->prepare($query);
            $sql->execute();
            return $sql;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
    
    function searchCategory($id)
    {
        try {
            $query = "SELECT * FROM categories WHERE id = ?";
            $sql = $this->categoryTable->prepare($query);
            $sql->execute([$id]);
            return $sql;
        }catch (PDOException $exception) {
            echo $exception;
        }
    }
   
}
// echo __DIR__.'..';
?>