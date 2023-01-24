<?php
include_once('../../models/Category.php');
$category = new AdminCategory();
$category->name = $_POST['cname'];
if($_FILES['cimage']){
    $main_dir = $_SERVER['DOCUMENT_ROOT']."/ecommerce";
    $image_name = $_FILES['cimage']['name'];
    $category->image = $image_name;
    move_uploaded_file($_FILES['cimage']['tmp_name'], $main_dir . "/images/" . $image_name);
}
if($category->addCategory()){
    header("location: ../../views/AddCategoryForm.php?upload=success");
}

?>