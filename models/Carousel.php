<?php
include_once('Config.php');
class Carousel
{
    private $id;
    public $image;
    public $created_at;
    public $updated_at;
    private $carouselTable;
    function __construct()
    {
        $this->carouselTable = Config::getConnection();
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
    
    
}

?>