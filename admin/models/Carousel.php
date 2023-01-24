<?php
include_once('AdminConfig.php');
class AdminCarousel
{
    private $id;
    public $image;
    public $created_at;
    public $updated_at;
    private $carouselTable;
    function __construct()
    {
        $this->carouselTable = AdminConfig::getConnection();
    }

    function getCarousels()
    {
        try {
            $query = "SELECT * FROM carousels";
            $sql = $this->carouselTable->prepare($query);
            $sql->execute();
            return $sql;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
    function addCarousel()
    {
        try {
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            $query = "INSERT INTO carousels(`image`,`created_at`,`updated_at`) VALUE (?,?,?)";
            $sql = $this->carouselTable->prepare($query);
            $result = $sql->execute(array($this->image, $this->created_at,$this->updated_at));
            return $result;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
    function deleteCarousel($id){
        try {
            $query = "DELETE FROM carousels WHERE id = ?";
            $sql = $this->carouselTable->prepare($query);
            $result = $sql->execute([$id]);
            return $result;
        } catch (PDOException $exception) {
            echo $exception;
        }
    }
    
}

?>