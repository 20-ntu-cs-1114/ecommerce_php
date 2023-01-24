<?php
include_once('../../models/Category.php');
$db = new AdminCategory();
if(isset($_GET['id'])){
    if ($db->deleteCategory($_GET['id'])) {
        header("location: ../../views/Categories.php");
    }
}

?>