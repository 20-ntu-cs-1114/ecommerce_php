<?php
include_once('AdminConfig.php');
class AdminCategory
{
    private $id;
    public $name;
    public $image;
    public $created_at;
    public $updated_at;
    private $categoryTable;
    function __construct()
    {
        $this->categoryTable = AdminConfig::getConnection();
    }

    function getCategories()
    {
        try {
            $query = "SELECT * FROM categories";
            $sql = $this->categoryTable->prepare($query);
            $sql->execute();
            return $sql;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
    function addCategory()
    {
        try {
            $query = "INSERT INTO categories(category_name,category_image) VALUE (?,?)";
            $sql = $this->categoryTable->prepare($query);
            $result = $sql->execute(array($this->name, $this->image));
            return $result;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
    function updateCategory($id)
    {
        try {
            $this->updated_at = date('Y-m-d H:i:s');
            $query = "UPDATE `categories` SET `category_name` = ?, `category_image` = ?,`updated_at` = ? WHERE `categories`.`id` = ?;";
            $sql = $this->categoryTable->prepare($query);
            $result = $sql->execute(array($this->name, $this->image, $this->updated_at, $id));
            return $result;
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
    function deleteCategory($id)
    {
        try {
            $query = "DELETE FROM categories WHERE id = ?";
            $sql = $this->categoryTable->prepare($query);
            $result = $sql->execute([$id]);
            return $result;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
}
// echo __DIR__.'..';
?>