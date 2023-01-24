<?php 
include_once('../../models/Product.php');
$db = new AdminProduct();
if(isset($_GET['id'])){
    if($db->deleteProduct($_GET['id'])){
        header("location: ../../views/Products.php");
    }
}

?>