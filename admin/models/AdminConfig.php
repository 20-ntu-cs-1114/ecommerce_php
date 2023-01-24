<?php 
class AdminConfig
{
    public $database;
    public static function getConnection(){
        try{
            $database = new PDO("mysql:host=localhost; dbname=ecommerce","root","");
            return $database;
        }catch(PDOException $exception){
            echo $exception;
        }
    }
}
?>